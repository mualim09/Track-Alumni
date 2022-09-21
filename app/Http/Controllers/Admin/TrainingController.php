<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Training;
use Illuminate\Support\Facades\File;
use Validator;
use Auth; 

use App\Models\Alumni;
use App\Models\Department;


class TrainingController extends Controller
{
    public function index(){
        $trainings = Training::all();
        return view('admin.trainings.index', compact('trainings'));
    }

    public function create(){
        $departments = Department::all();
        return view('admin.trainings.create', compact('departments'));
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'topic' => 'required | max:50| min:1',
            'reference_contact_name' => 'required | max:50| min:1',
            'reference_contact_number' => 'required | max:50| min:1',
            'location' => 'required | max:50| min:1',
            'duration' => 'required | max:50| min:1',
            'description' => 'nullable | max:1000| min:1',
            'department_id' => 'required',
            'status' => 'required',
            'image' => 'nullable | mimes:jpg,jpeg,png,gif | max:5120',
            
        ]);

        if(!$validator->passes()){
            return response()->json(['status'=>0, 'error'=> $validator->errors()->toArray()]);
        }else{

            $training = new Training();

            if($request->hasFile('image')){
                $destination = 'public/uploads/images/trainings';
                $file = $request->file('image');
                $file_name = $file->getClientOriginalName();
                $file_name_store = time().$file_name;
                $path = $request->file('image')->storeAs($destination, $file_name_store );
                $training->image = $file_name_store;
            }

            // training data inserting
            $training->topic = $request->input('topic');
            $training->reference_contact_name = $request->input('reference_contact_name');
            $training->reference_contact_number = $request->input('reference_contact_number');
            $training->start_date = $request->input('start_date');
            $training->start_time = $request->input('start_time');
            $training->last_date = $request->input('last_date');
            $training->location = $request->input('location');
            $training->duration = $request->input('duration');
            $training->status = $request->input('status');
            $training->department_id = $request->input('department_id');
            $training->description = $request->input('description');
    


            $training->save();

            return response()->json(['status'=>1, 'msg'=>'done']);
            //return redirect('/trainings');
        }

    }

    public function edit($id){
        $training = Training::find($id);
        $departments = Department::all();
        return view('admin.trainings.edit', compact('training', 'departments'));
    }

    public function update(Request $request, $id){
        
        $validator = Validator::make($request->all(),[
            'topic' => 'required | max:50| min:1',
            'reference_contact_name' => 'required',
            'reference_contact_number' => 'required',
            'location' => 'required',
            'duration' => 'required',
            'description' => 'nullable | max:1000| min:1',
            'department_id' => 'required',
            'status' => 'required',
        ]);

        if(!$validator->passes()){
            return response()->json(['status'=>0, 'error'=> $validator->errors()->toArray()]);
        }else{

            $training = Training::find($id);
            $directory = 'public/uploads/images/trainings/'.$training->image;
            //dd($directory);
            if(File::exists($directory)){
                File::delete($directory);
            }
            
            if($request->hasFile('image')){
                $destination = 'public/uploads/images/trainings';
                $file = $request->file('image');
                $file_name = $file->getClientOriginalName();
                $file_name_store = time().$file_name;
                $path = $request->file('image')->storeAs($destination, $file_name_store );
                $training->image = $file_name_store;
            }

            // training data inserting
            $training->topic = $request->input('topic');
            $training->reference_contact_name = $request->input('reference_contact_name');
            $training->reference_contact_number = $request->input('reference_contact_number');
            $training->start_date = $request->input('start_date');
            $training->start_time = $request->input('start_time');
            $training->last_date = $request->input('last_date');
            $training->location = $request->input('location');
            $training->duration = $request->input('duration');
            $training->status = $request->input('status');
            $training->department_id = $request->input('department_id');
            $training->description = $request->input('description');

            $training->update();
            return response()->json(['status'=>1, 'msg'=>'done']);
            //return redirect('/trainings');
        }
    }

    public function destroy($id){
        $training = Training::find($id);
        $directory = 'public/uploads/images/trainings/'.$training->image;

        if(File::exists($directory)){
            File::delete($directory);
        }
        $training->delete();
        
        if(Auth::guard('staff')->user()){
            return redirect('staff/trainings');
        }

        if(Auth::guard('alumni')->user()){
            return redirect('alumni/trainings');
        }

        if(Auth::user()){
            return redirect('admin/trainings');
        }
    }
}
