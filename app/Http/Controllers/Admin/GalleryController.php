<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\Event;
use Illuminate\Support\Facades\File;
use Validator;
use Auth; 


class GalleryController extends Controller
{
    public function index(){
        $galleries = Gallery::all();
        return view('admin.galleries.index', compact('galleries'));
    }

    public function create(){
        $events = Event::all();
        return view('admin.galleries.create', compact('events'));
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'title' => 'required | max:50| min:1',
            'image' => 'nullable | mimes:jpg,jpeg,png,gif | max:5120',
            
        ]);

        if(!$validator->passes()){
            return response()->json(['status'=>0, 'error'=> $validator->errors()->toArray()]);
        }else{

            $gallery = new Gallery();

            if($request->hasFile('image')){
                $destination = 'public/uploads/images/galleries';
                $file = $request->file('image');
                $file_name = $file->getClientOriginalName();
                $file_name_store = time().$file_name;
                $path = $request->file('image')->storeAs($destination, $file_name_store );
                $gallery->image = $file_name_store;
            }

            // gallery data inserting
            $gallery->title = $request->input('title');
            $gallery->event_id = $request->input('event_id');

            $gallery->save();

            
            return response()->json(['status'=>1, 'msg'=>'done']);
            //return redirect('/galleries');
        }

    }

    public function edit($id){
        $gallery = Gallery::find($id);
        $events = Event::all();
        return view('admin.galleries.edit', compact('gallery', 'events'));
    }

    public function update(Request $request, $id){
        
        $validator = Validator::make($request->all(),[
            'title' => 'required | max:50| min:1',
            'event_id' => 'required', 
           
        ]);

        if(!$validator->passes()){
            return response()->json(['status'=>0, 'error'=> $validator->errors()->toArray()]);
        }else{

            $gallery = Gallery::find($id);
            $directory = 'public/uploads/images/galleries/'.$gallery->image;
            //dd($directory);
            if(File::exists($directory)){
                File::delete($directory);
            }
            
            if($request->hasFile('image')){
                $destination = 'public/uploads/images/galleries';
                $file = $request->file('image');
                $file_name = $file->getClientOriginalName();
                $file_name_store = time().$file_name;
                $path = $request->file('image')->storeAs($destination, $file_name_store );
                $gallery->image = $file_name_store;
            }

            // gallery data inserting
            $gallery->title = $request->input('title');
            $gallery->event_id = $request->input('event_id');

            $gallery->update();
            return response()->json(['status'=>1, 'msg'=>'done']);
            //return redirect('/galleries');
        }
    }

    public function destroy($id){
        $gallery = Gallery::find($id);
        $directory = 'public/uploads/images/galleries/'.$gallery->image;

        if(File::exists($directory)){
            File::delete($directory);
        }
        $gallery->delete();
        
        if(Auth::guard('staff')->user()){
            return redirect('staff/galleries');
        }

        if(Auth::guard('alumni')->user()){
            return redirect('alumni/galleries');
        }

        if(Auth::user()){
            return redirect('admin/galleries');
        }
    }
}
