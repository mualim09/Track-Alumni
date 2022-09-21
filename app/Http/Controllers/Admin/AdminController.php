<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Alumni;
use App\Models\Staff;
use App\Models\Department;
use Validator;

class AdminController extends Controller
{
    public function index(){
        return view('layouts.admin');
    }

    // pending alumnies
    public function pending_alumnies(){
        $alumnies = Alumni::where('status', '=', 'Inactive')->get();
        $departments = Department::all();
        return view('admin.pending_users.alumnies_inactive', compact('alumnies', 'departments'));
    }

    public function pending_alumni_edit($id){
        $alumni = Alumni::findOrFail($id);
        $departments = Department::all();
        return view('admin.pending_users.pending_alumni_edit', compact('alumni', 'departments'));
    }

    public function pending_alumni_update(Request $request, $id){
        
        $validator = Validator::make($request->all(),[
            'status' => 'required',
        ]);

        if(!$validator->passes()){
            return response()->json(['status'=>0, 'error'=> $validator->errors()->toArray()]);
        }else{
            $alumni = Alumni::find($id);
           
            $alumni->status = $request->input('status');

            $alumni->update();
            return response()->json(['status'=>1, 'msg'=>'done']);
            //return redirect('admin.pending_users.alumnies_inactive');
            
        }
    }


    // pending staffs
    public function pending_staffs(){
        $staffs = Staff::where('status', '=', 'Inactive')->get();
        return view('admin.pending_users.staff_inactive', compact('staffs'));
    }

    public function pending_staff_edit($id){
        $staff = Staff::findOrFail($id);
        $departments = Department::all();
        return view('admin.pending_users.pending_staff_edit', compact('staff', 'departments'));
    }

    public function pending_staff_update(Request $request, $id){
        
        $validator = Validator::make($request->all(),[
            'status' => 'required',
        ]);

        if(!$validator->passes()){
            return response()->json(['status'=>0, 'error'=> $validator->errors()->toArray()]);
        }else{
            $staff = Staff::find($id);
           
            $staff->status = $request->input('status');

            $staff->update();
            return response()->json(['status'=>1, 'msg'=>'done']);
            //return redirect('admin.pending_users.staffs_inactive');
            
        }
    }

    
}
