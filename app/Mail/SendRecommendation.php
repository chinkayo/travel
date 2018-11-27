<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;
use App\Event;

class SendRecommendation extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $events;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user,$events)
    {
        $this->user = $user;
        $this->events = $events;
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.recommendation');
    }
}
