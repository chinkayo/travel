<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Event;
use Illuminate\Support\Facades\Mail;
use App\Mail\StartApplication;
use App\User;

class StartApplicationCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'batch:start_application';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '募集開始日になったら、「申し込み前」のイベントを「申し込み受付中」に変更する';

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
        // １．以下の条件に基づいて、対象イベントを選択する。
        // 今のステータスが「申し込み前」
        // 募集開始日付と本日の日付がイコールする。
        $events = Event::query()->where("event_status_id", "1")->where("start_apply_date", date("Y-m-d"))->get();

        // 2. 上記のイベントを全部「申し込み受付中」に変更する。
        foreach($events as $event) {

            $event->event_status_id = 2;
            $event->save();

            // find the user
            $user_id = $event->user_id;
            $user = User::find($user_id);
            Mail::to($user->email)->send(new StartApplication($user));
        }
    }
}
