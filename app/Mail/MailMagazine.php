<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\MailList;
use App\MailMagazineHistory;

class MailMagazine extends Mailable
{
    use Queueable, SerializesModels;
    public $mailmagazinehistroy;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(MailMagazineHistory $mailmagazinehistroy)
    {
        $this->mailmagazinehistroy = $mailmagazinehistroy;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.mailmagazine');
    }
}
