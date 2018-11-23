<?php

namespace App\Console\Commands;
use App\Event;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\GatherApplication;
use App\EventMtbApplication;
use App\User;
use Carbon\Carbon;

class GatherCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'batch:gather_application';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'イベント期間が開始する1日であれば、主催者と応募者にそれぞれメールを送信する。';

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
        $events = Event::query()->where("event_status_id", "3")->get();
        foreach($events as $event){
            $event_deadline=$event->deadline;
            $event_id = $event->id;
            $applicant_ids = EventMtbApplication::query()->where("event_id", "$event_id")->select("user_id")->get();
            $tomorrow = Carbon::tomorrow()->toDateString();

            if($event_deadline=$tomorrow){
                // find the 主催者
                $user_id = $event->user_id;
                $user = User::find($user_id);
                Mail::to($user->email)->send(new GatherApplication($user));
                // find the 応募者
                foreach($applicant_ids as $applicant_id){
                    $user_id_applicant = $applicant_id->user_id;
                    $user = User::find($user_id_applicant);
                    Mail::to($user->email)->send(new GatherApplication($user));
                }

            }

        }



    }
}
