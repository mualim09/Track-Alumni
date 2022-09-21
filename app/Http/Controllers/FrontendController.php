<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Jobpost;
use App\Models\Alumni;
use App\Models\Gallery;
use App\Models\Training;
use App\Models\Staff;
use App\Models\Department;
use Illuminate\Support\Facades\Hash;
use Validator;


use Illuminate\Support\Facades\File;

class FrontendController extends Controller
{
    public function home(){
        return view('frontend.home');
    }

    public function about(){
        return view('frontend.about');
    }

    public function contact(){
        return view('frontend.contact');
    }

    public function events(){
        $events = Event::where('status', '=', 'Active')->orderBy('id', 'DESC')->get();
        return view('frontend.events', compact('events'));
    }

    public function eventshow($id){
        $event = Event::findOrFail($id);
        return view('frontend.eventshow', compact('event'));
    }

    public function galleries(){
        $galleries = Gallery::orderBy('id', 'DESC')->get();
        return view('frontend.galleries', compact('galleries'));
    }

    // public function galleryshow($id){
    //     $gallery = Gallery::findOrFail($id);
    //     return view('frontend.galleryshow', compact('gallery'));
    // }


    public function trainings(){
        $trainings = Training::where('status', '=', 'Active')->orderBy('id', 'DESC')->get();
        return view('frontend.trainings', compact('trainings'));
    }

    public function trainingshow($id){
        $training = Training::findOrFail($id);
        return view('frontend.trainingshow', compact('training'));
    }

    public function jobs(){
        $jobs = Jobpost::orderBy('id', 'DESC')->where('status', '=', 'Active')->get();
        return view('frontend.opportunities', compact('jobs'));
    }

    public function jobshow($id){
        $job = Jobpost::findOrFail($id);
        return view('frontend.opportunitieshow', compact('job'));
    }

    public function alumni_list(){
        $alumnies = Alumni::where('status', '=', 'Active')->get();
        return view('frontend.alumni_list', compact('alumnies'));
    }

    public function front_single_alumni($id){
        $alumni = Alumni::findOrFail($id);
        return view('frontend.single_alumni', compact('alumni'));
    }

    public function create_alumni(){
        $departments = Department::all();
        return view('admin.alumnies.create', compact('departments'));
    }

    public function store_alumni(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required | max:50| min:1',
            'email' => 'required | unique:alumnis',
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
            'password' => 'required',
            'image' => 'nullable | mimes:jpg,jpeg,png,gif | max:5120',
            
        ]);

        if(!$validator->passes()){
            return response()->json(['status'=>0, 'error'=> $validator->errors()->toArray()]);
        }else{

            $alumni = new Alumni();

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
            $alumni->password = Hash::make($request->input('password'));

            $alumni->save();
            return response()->json(['status'=>1, 'msg'=>'done']);
            //return redirect('/alumnies');
        }

    }

    public function staff_list(){
        $staffs = Staff::all();
        return view('frontend.staff_list', compact('staffs'));
    }

    public function front_single_staff($id){
        $staff = Staff::findOrFail($id);
        return view('frontend.single_staff', compact('staff'));
    }

    public function create_staff(){
        $departments = Department::all();
        return view('admin.staffs.create', compact('departments'));
    }

    public function store_staff(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required | max:50| min:1',
            'email' => 'required | unique:staff',
            'qualification' => 'required',
            'gender' => 'required',
            'designation' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'date_of_join' => 'required',
            'password' => 'required',
            'image' => 'nullable | mimes:jpg,jpeg,png,gif | max:5120',
            
        ]);

        if(!$validator->passes()){
            return response()->json(['status'=>0, 'error'=> $validator->errors()->toArray()]);
        }else{

            $staff = new Staff();

            if($request->hasFile('image')){
                $destination = 'public/uploads/images/staffs';
                $file = $request->file('image');
                $file_name = $file->getClientOriginalName();
                $file_name_store = time().$file_name;
                $path = $request->file('image')->storeAs($destination, $file_name_store );
                $staff->image = $file_name_store;
            }

            // staff data inserting
            $staff->name = $request->input('name');
            $staff->email = $request->input('email');
            $staff->gender = $request->input('gender');
            $staff->designation = $request->input('designation');
            $staff->address = $request->input('address');
            $staff->designation = $request->input('designation');
            $staff->phone = $request->input('phone');
            $staff->qualification = $request->input('qualification');
            $staff->date_of_join = $request->input('date_of_join');
            $staff->password = Hash::make($request->input('password'));

            $staff->save();
            return response()->json(['status'=>1, 'msg'=>'done']);
            //return redirect('/alumnies');
        }

    }

    
}
