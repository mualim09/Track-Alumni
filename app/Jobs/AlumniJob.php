<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\JobMail;
use Mail;

class AlumniJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $single_email, $alumni_name, $job_title, $job_designation;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($single_email, $alumni_name, $job_title, $job_designation)
    {
        $this->single_email = $single_email;
        $this->alumni_name = $alumni_name;
        $this->job_title = $job_title;
        $this->job_designation = $job_designation;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email = new JobMail($this->alumni_name, $this->job_title, $this->job_designation);
        Mail::to($this->single_email)->send($email);
    }
}
