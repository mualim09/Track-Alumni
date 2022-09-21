<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\File;
use Validator;
use Auth; 

use App\Models\Alumni;
use App\Jobs\EventJob;

class EventController extends Controller
{
    public function index(){
        $events = Event::all();
        return view('admin.events.index', compact('events'));
    }

    public function create(){
        return view('admin.events.create');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required | max:50| min:1',
            'description' => 'nullable | max:1000| min:1',
            'start_date' => 'required',
            'start_time' => 'required',
            'location' => 'required',
            'status' => 'required',
            'image' => 'nullable | mimes:jpg,jpeg,png,gif | max:5120',
            
        ]);

        if(!$validator->passes()){
            return response()->json(['status'=>0, 'error'=> $validator->errors()->toArray()]);
        }else{

            $event = new Event();

            if($request->hasFile('image')){
                $destination = 'public/uploads/images/events';
                $file = $request->file('image');
                $file_name = $file->getClientOriginalName();
                $file_name_store = time().$file_name;
                $path = $request->file('image')->storeAs($destination, $file_name_store );
                $event->image = $file_name_store;
            }

            // event data inserting
            $event->name = $request->input('name');
            $event->description = $request->input('description');
            $event->start_date = $request->input('start_date');
            $event->start_time = $request->input('start_time');
            $event->status = $request->input('status');
            $event->location = $request->input('location');
            $event->description = $request->input('description');


            $event->save();

            $event_name = $event->name;

            $alumnies = Alumni::all();
            foreach($alumnies as $alumni){
                $alumni_name = $alumni->name;
                $single_email = $alumni->email;
                
                EventJob::dispatch($single_email, $alumni_name, $event_name);

            }
            return response()->json(['status'=>1, 'msg'=>'done']);
            //return redirect('/events');
        }

    }

    public function edit($id){
        $event = Event::find($id);
        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, $id){
        
        $validator = Validator::make($request->all(),[
            'name' => 'required | max:50| min:1',
            'description' => 'nullable | max:1000| min:1',
            'start_date' => 'required',
            'start_time' => 'required',
            'location' => 'required',
            'status' => 'required',
        ]);

        if(!$validator->passes()){
            return response()->json(['status'=>0, 'error'=> $validator->errors()->toArray()]);
        }else{

            $event = Event::find($id);
            $directory = 'public/uploads/images/events/'.$event->image;
            //dd($directory);
            if(File::exists($directory)){
                File::delete($directory);
            }
            
            if($request->hasFile('image')){
                $destination = 'public/uploads/images/events';
                $file = $request->file('image');
                $file_name = $file->getClientOriginalName();
                $file_name_store = time().$file_name;
                $path = $request->file('image')->storeAs($destination, $file_name_store );
                $event->image = $file_name_store;
            }

            
            // event data inserting
            $event->name = $request->input('name');
            $event->description = $request->input('description');
            $event->start_date = $request->input('start_date');
            $event->start_time = $request->input('start_time');
            $event->status = $request->input('status');
            $event->location = $request->input('location');
            $event->description = $request->input('description');

            $event->update();
            return response()->json(['status'=>1, 'msg'=>'done']);
            //return redirect('/events');
        }
    }

    public function destroy($id){
        $event = Event::find($id);
        $directory = 'public/uploads/images/events/'.$event->image;

        if(File::exists($directory)){
            File::delete($directory);
        }
        $event->delete();

        if(Auth::guard('staff')->user()){
            return redirect('staff/events');
        }

        if(Auth::guard('alumni')->user()){
            return redirect('alumni/events');
        }

        if(Auth::user()){
            return redirect('admin/events');
        }

        
    }
    
}
