<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\MailList;

class MailMagazineVerification extends Mailable
{
    use Queueable, SerializesModels;
    public $maillist;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(MailList $maillist)
    {
        $this->maillist = $maillist;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.mailmagazineverification');
    }
}
