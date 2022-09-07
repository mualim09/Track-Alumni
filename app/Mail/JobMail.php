<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class JobMail extends Mailable implements ShouldQueue 
{
    use Queueable, SerializesModels;
    public $alumni_name, $job_title, $job_designation;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($alumni_name, $job_title, $job_designation)
    {
        $this->alumni_name = $alumni_name;
        $this->job_title = $job_title;
        $this->job_designation = $job_designation;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('admin.mail.job_mail');
    }
}
