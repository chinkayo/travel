<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\MailList;
use App\MailMagazineHistory;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailMagazine;

class SendMailMagazine extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:sendmailmagazine';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send mail magazine on the mail lists';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $maillists = MailList::where('confirmed_at','!=','null')->get();
        $mailmagazinehistory = MailMagazineHistory::where('sent_at','null')->get();
        foreach ($maillists as $maillist) {
            Mail::to($maillist->email)->send(new MailMagazine($mailmagazinehistory));
        }
    }
}
