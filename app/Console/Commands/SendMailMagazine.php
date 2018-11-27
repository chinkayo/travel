<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\MailList;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailMagazine;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use App\MailMagazineContent;
use App\MailMagazineHistory;

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
        $maillists = MailList::where('confirmed_at','!=',null)->get();
        $mailmagazinecontent = MailMagazineContent::where('sent_at',null)->first();
        $id = $mailmagazinecontent->id;
        foreach ($maillists as $maillist) {
            if ($maillist->email!=null) {
                Mail::to($maillist->email)->send(new MailMagazine($mailmagazinecontent));
                $mailmagazinehistory = new MailMagazineHistory;
                $mailmagazinehistory->mail_magazine_content_id = $id;
                $mailmagazinehistory->mail_list_id = $maillist->id;
                $mailmagazinehistory->sent_at = Carbon::now();
                $mailmagazinehistory->save();
                Log::info('###sent email '.$mailmagazinecontent->subject.' to '.$maillist->email.' at '.Carbon::now());
            }else {
                Mail::to($maillist->user->email)->send(new MailMagazine($mailmagazinecontent));
                $mailmagazinehistory = new MailMagazineHistory;
                $mailmagazinehistory->mail_magazine_content_id = $id;
                $mailmagazinehistory->mail_list_id = $maillist->id;
                $mailmagazinehistory->sent_at = Carbon::now();
                $mailmagazinehistory->save();
                Log::info('###sent email '.$mailmagazinecontent->subject.' to '.$maillist->user->email.' at '.Carbon::now());
            }
        }
        $mailmagazinecontent=MailMagazineContent::find($id);
        $mailmagazinecontent->sent_at = Carbon::now();
        $mailmagazinecontent->save();
    }
}
