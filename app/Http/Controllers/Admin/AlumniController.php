<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\Alumni;

class AlumniController extends Controller
{
    public function index(){
        $alumnies = Alumni::all();
        return view('admin.alumnies.index', compact('alumnies'));
    }

    public function create(){
        return view('admin.alumnies.create');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required | max:50| min:1',
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
            $alumni->address = $request->input('address');
            $alumni->phone = $request->input('phone');
            $alumni->email = $request->input('email');
            $alumni->password = $request->input('password');
            $alumni->department = $request->input('department');
            $alumni->cgpa = $request->input('cgpa');
            $alumni->passing_year = $request->input('passing_year');
            $alumni->company_name = $request->input('company_name');
            $alumni->designation = $request->input('designation');

            $alumni->save();
            return response()->json(['status'=>1, 'msg'=>'done']);
            //return redirect('/alumnies');
        }

    }
}
