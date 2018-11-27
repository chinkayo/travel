<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\MailList;
use App\MailMagazineHistory;
use App\MailMagazineContent;

class MailMagazine extends Mailable
{
    use Queueable, SerializesModels;
    public $mailmagazinecontent;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(MailMagazineContent $mailmagazinecontent)
    {
        $this->mailmagazinecontent = $mailmagazinecontent;
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
