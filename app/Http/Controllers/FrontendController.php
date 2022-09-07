<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Jobpost;
use App\Models\Alumni;

class FrontendController extends Controller
{
    public function home(){
        return view('frontend.home');
    }

    public function about(){
        return view('frontend.about');
    }

    public function gallery(){
        return view('frontend.gallery');
    }

    public function contact(){
        return view('frontend.contact');
    }

    public function events(){
        $events = Event::all();
        return view('frontend.events', compact('events'));
    }

    public function eventshow($id){
        $event = Event::findOrFail($id);
        return view('frontend.eventshow', compact('event'));
    }

    public function jobs(){
        $jobs = Jobpost::all();
        return view('frontend.opportunities', compact('jobs'));
    }

    public function jobshow($id){
        $job = Jobpost::findOrFail($id);
        return view('frontend.opportunitieshow', compact('job'));
    }

    public function alumni_list(){
        $alumnies = Alumni::all();
        return view('frontend.alumni_list', compact('alumnies'));
    }

    public function front_single_alumni($id){
        $alumni = Alumni::findOrFail($id);
        return view('frontend.single_alumni', compact('alumni'));
    }

    
}
