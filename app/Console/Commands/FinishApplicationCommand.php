<?php

namespace App\Console\Commands;
use App\Event;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\FinishApplication;
use App\Mail\FinishApplicationCancel;
use App\EventMtbApplication;
use App\User;

class FinishApplicationCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'batch:finish_application';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '募集終了日付になったら、「申し込み受付中」のイベントを「人数達成」あるいは「人数不足キャンセル」に変更する';

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
        $events = Event::query()->where("event_status_id", "2")->where("deadline", date("Y-m-d"))->get();
        foreach($events as $event){
            $event_id = $event->id;
            $count_id=EventMtbApplication::query()->where("event_id", "$event_id")->count("user_id");
            $applicant_ids = EventMtbApplication::query()->where("event_id", "$event_id")->select("user_id")->get();

            if($event->minimum <= $count_id){
                $event->event_status_id = 3;
                $event->save();

                // find the 主催者
                $user_id_owner = $event->user_id;
                $user_owner = User::find($user_id_owner);
                Mail::to($user_owner->email)->send(new FinishApplication($user_owner));
                // find the 応募者
                foreach($applicant_ids as $applicant_id){
                    $user_id_applicant = $applicant_id->user_id;
                    $user = User::find($user_id_applicant);
                    Mail::to($user->email)->send(new FinishApplication($user));

                }
            }
            else{
                $event->event_status_id = 4;
                $event->save();
                // find the 主催者
                $user_id_owner = $event->user_id;
                $user_owner = User::find($user_id_owner);
                Mail::to($user_owner->email)->send(new FinishApplicationCancel($user_owner));
                // find the 応募者
                foreach($applicant_ids as $applicant_id){
                    $user_id_applicant = $applicant_id->user_id;
                    $user = User::find($user_id_applicant);
                    Mail::to($user->email)->send(new FinishApplicationCancel($user));
                }
            }

        }



    }
}
