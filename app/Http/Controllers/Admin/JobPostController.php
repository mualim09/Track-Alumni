<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jobpost;
use Illuminate\Support\Facades\File;
use Validator;
use Auth;
use App\Models\Alumni;
use App\Jobs\AlumniJob;

class JobPostController extends Controller
{
    public function index(){
        $jobs = Jobpost::all();
        return view('admin.jobs.index', compact('jobs'));
    }

    public function create(){
        return view('admin.jobs.create');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'title' => 'required | max:50| min:1',
            'designation' => 'required',
            'experience_required' => 'required',
            'salary' => 'required',
            'status' => 'required',
            'description' => 'nullable | max:1000| min:1'
            
        ]);

        if(!$validator->passes()){
            return response()->json(['status'=>0, 'error'=> $validator->errors()->toArray()]);
        }else{

            $job = new Jobpost();

            // job data inserting
            $job->title = $request->input('title');
            $job->designation = $request->input('designation');
            $job->experience_required = $request->input('experience_required');
            $job->salary = $request->input('salary');
            $job->status = $request->input('status');
            $job->description = $request->input('description');

            $job->save();

            $job_title = $job->title;
            $job_designation = $job->designation;

            $alumnies = Alumni::all();
            foreach($alumnies as $alumni){
                $alumni_name = $alumni->name;
                $single_email = $alumni->email;
                
                AlumniJob::dispatch($single_email, $alumni_name, $job_title, $job_designation);

            }
            return response()->json(['status'=>1, 'msg'=>'done']);
            
        }

    }

    public function edit($id){
        $job = Jobpost::find($id);
        return view('admin.jobs.edit', compact('job'));
    }

    public function update(Request $request, $id){
        
        $validator = Validator::make($request->all(),[
            'title' => 'required | max:50| min:1',
            'designation' => 'required',
            'experience_required' => 'required',
            'salary' => 'required',
            'status' => 'required',
            'description' => 'nullable | max:1000| min:1'
        ]);

        if(!$validator->passes()){
            return response()->json(['status'=>0, 'error'=> $validator->errors()->toArray()]);
        }else{

            $job = Jobpost::find($id);
            

            // job data inserting
            $job->title = $request->input('title');
            $job->designation = $request->input('designation');
            $job->experience_required = $request->input('experience_required');
            $job->salary = $request->input('salary');
            $job->status = $request->input('status');
            $job->description = $request->input('description');
            
            $job->update();
            return response()->json(['status'=>1, 'msg'=>'done']);
            //return redirect('/jobs');
        }
    }

    public function destroy($id){
        $job = Jobpost::find($id);
        $directory = 'assets/uploads/images/jobs/'.$job->image;

        if(File::exists($directory)){
            File::delete($directory);
        }
        $job->delete();
        
        
        if(Auth::guard('staff')->user()){
            return redirect('staff/jobs');
        }

        if(Auth::guard('alumni')->user()){
            return redirect('alumnies/jobs');
        }

        if(Auth::user()){
            return redirect('admin/jobs');
        }
    }
}
