<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels; 

class EventMail extends Mailable implements ShouldQueue 
{
    use Queueable, SerializesModels;
    public $alumni_name, $event_name;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($alumni_name, $event_name)
    {
        $this->alumni_name = $alumni_name;
        $this->event_name = $event_name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('admin.mail.event_mail');
    }
}
