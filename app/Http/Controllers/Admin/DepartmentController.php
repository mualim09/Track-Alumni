<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Validator;
use App\Models\Department;

class DepartmentController extends Controller
{
    public function index(){
        $departments = Department::all();
        return view('admin.departments.index', compact('departments'));
    }

    public function create(){
        return view('admin.departments.create');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required | max:50| min:1',
            
        ]);

        if(!$validator->passes()){
            return response()->json(['status'=>0, 'error'=> $validator->errors()->toArray()]);
        }else{

            $department = new Department();


            // department data inserting
            $department->name = $request->input('name');

            $department->save();

            return response()->json(['status'=>1, 'msg'=>'done']);
            //return redirect('/departments');
        }

    }

    public function edit($id){
        $department = Department::find($id);
        return view('admin.departments.edit', compact('department'));
    }

    public function update(Request $request, $id){
        
        $validator = Validator::make($request->all(),[
            'name' => 'required | max:50| min:1',
        ]);

        if(!$validator->passes()){
            return response()->json(['status'=>0, 'error'=> $validator->errors()->toArray()]);
        }else{

            $department = Department::find($id);
            

            // department data inserting
            $department->name = $request->input('name');

            $department->update();
            return response()->json(['status'=>1, 'msg'=>'done']);
            //return redirect('/departments');
        }
    }

    public function destroy($id){
        $department = Department::find($id);
       
        $department->delete();
        
        return redirect('admin/departments');
    }
}
