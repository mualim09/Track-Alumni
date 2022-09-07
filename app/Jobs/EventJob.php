<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use App\Mail\EventMail;
use Mail;

class EventJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $single_email, $alumni_name, $event_name;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($single_email, $alumni_name, $event_name)
    {
        $this->single_email = $single_email;
        $this->alumni_name = $alumni_name;
        $this->event_name = $event_name;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email = new EventMail($this->alumni_name, $this->event_name);
        Mail::to($this->single_email)->send($email);
    }
}
