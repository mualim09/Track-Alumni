<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\Alumni;
use App\Models\Department;
use Auth;


use Illuminate\Support\Facades\File;

class AlumniController extends Controller
{
    public function index(){
        $alumnies = Alumni::where('status','=', 'Active')->get();
        return view('admin.alumnies.index', compact('alumnies'));
    }

    public function show($id){
        $alumni = Alumni::findOrFail($id);
        return view('admin.alumnies.show', compact('alumni'));
    }

    public function department_alumnies(){
        $dept_id = Auth::guard('alumni')->user()->department_id;

        $alumnies = Alumni::where('department_id', '=', $dept_id)->where('status','=', 'Active')->get();

        return view('admin.alumnies.index', compact('alumnies')); 
    }

    public function batch_alumnies(){
        $dept_id = Auth::guard('alumni')->user()->department_id;
        $batch = Auth::guard('alumni')->user()->batch;

        $alumnies = Alumni::where('batch', '=', $batch)->where('department_id', '=', $dept_id)->where('status','=', 'Active')->get();

        return view('admin.alumnies.index', compact('alumnies')); 
    }

    public function donate_blood(){

        $alumnies = Alumni::where('donate_blood', '=', true)->get();

        return view('admin.alumnies.donate_blood', compact('alumnies')); 
    }

    public function profile(){
        $id = Auth::guard('alumni')->user()->id;

        $alumni = Alumni::findOrFail($id);

        return view('admin.alumnies.alumni_profile', compact('alumni'));
    }

    public function profile_edit(){
        $id = Auth::guard('alumni')->user()->id;

        $alumni = Alumni::findOrFail($id);
        $departments = Department::all();

        return view('admin.alumnies.edit', compact('alumni', 'departments'));
    }

    public function update(Request $request, $id){

        $validator = Validator::make($request->all(),[
            'name' => 'required | max:50| min:1',
            'email' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required',
            'blood_group' => 'required',
            'present_address' => 'required',
            'permanent_address' => 'required',
            'phone' => 'required',
            'department_id' => 'required',
            'student_id' => 'required',
            'batch' => 'required',
            'cgpa' => 'required',
            'passing_year' => 'required',
            'maritial_status' => 'required',
            'status' => 'nullable',
            
        ]);

        if(!$validator->passes()){
            return response()->json(['status'=>0, 'error'=> $validator->errors()->toArray()]);
        }else{

            $alumni = Alumni::find($id);
            $directory = 'public/uploads/images/alumnies/'.$alumni->image;
            //dd($directory);
            if(File::exists($directory)){
                File::delete($directory);
            }
            
            if($request->hasFile('image')){
                $destination = 'public/uploads/images/alumnies';
                $file = $request->file('image');
                $file_name = $file->getClientOriginalName();
                $file_name_store = time().$file_name;
                $path = $request->file('image')->storeAs($destination, $file_name_store );
                $alumni->image = $file_name_store;
            }

            
             // alumnie data inserting
             $alumni->name = $request->input('name');
             $alumni->gender = $request->input('gender');
             $alumni->date_of_birth = $request->input('date_of_birth');
             $alumni->maritial_status = $request->input('maritial_status');
             $alumni->blood_group = $request->input('blood_group');
             $alumni->donate_blood = $request->has('donate_blood');
             $alumni->present_address = $request->input('present_address');
             $alumni->permanent_address = $request->input('permanent_address');
             $alumni->phone = $request->input('phone');
             $alumni->email = $request->input('email');
             $alumni->profession = $request->input('profession');
             $alumni->field = $request->input('field');
             $alumni->designation = $request->input('designation');
             $alumni->organization = $request->input('organization');
             $alumni->office_email = $request->input('office_email');
             $alumni->office_address = $request->input('office_address');
             $alumni->department_id = $request->input('department_id');
             $alumni->student_id = $request->input('student_id');
             $alumni->cgpa = $request->input('cgpa');
             $alumni->batch = $request->input('batch');
             $alumni->passing_year = $request->input('passing_year');
             $alumni->status = $request->input('status');

            $alumni->update();
            return response()->json(['status'=>1, 'msg'=>'done']);
            //return redirect('/events');
        }

    }

    
}
