<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Staff;

class StaffController extends Controller
{
    public function index(){
        $staffs = Staff::where('status', '=', 'Active')->get();
        return view('admin.staffs.index', compact('staffs'));
    }
}
