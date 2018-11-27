<?php

namespace App\Console\Commands;
use App\Event;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\FinishApplication;
use App\Mail\FinishApplicationCancel;
use App\EventMtbApplication;
use App\MtbApplicationStatus;
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
        // 対象のイベントを取得する。
        // 取得基準は以下となる。
        // 1.今の状態は「募集中」
        // 2.募集期間が過ぎた。
        $events = Event::query()
            ->where("event_status_id", "2")
            ->where("deadline", date("Y-m-d"))
            ->get();


        foreach($events as $event){

            // 該当イベント対象の申し込みを全部取得する。
            // 取得基準は以下となる。
            // 1. 申込のイベントは該当イベント
            // 2. 申込の状態は「審査通過」
            $applicantions = EventMtbApplication::query()
                ->where("event_id", $event->id)
                ->where("application_status_id", MtbApplicationStatus::CHECK_PASS)
                ->get();

            if($event->minimum <= $applicantions->count()) {
                // 人数達成した場合

                // 1.イベントの状態を「申込受付中」から「人数達成」に変更する。
                $event->event_status_id = 3;
                $event->save();

                // 2. 主催者に人数達成の通知メールを出す。
                Mail::to($event->user->email)->send(new FinishApplication($event->user));

                // 3. 審査通過の会員にメールを通知
                foreach($applicantions as $application) {
                    // 申し込む元の状態は「審査通過」の場合」
                    // 通知メールを出すだけ
                    Mail::to($application->user->email)->send(new ApplicationSuccess($application->user));
                }

            } else {

                // 人数不足キャンセル

                // 1. イベント状態を「申込受付中」から「人数不足キャンセル」に変更する。
                $event->event_status_id = 4;
                $event->save();
                // 2. イベント主催者に人数不足キャンセルのメール通知
                Mail::to($event->user->email)->send(new FinishApplicationCancel($event->user));
                // 3. すべての「審査通過」の申請を「審査落ち」に変更する。
                foreach($applicantions as $application) {
                    $application->application_status_id = 3;
                    $application->save();
                    Mail::to($application->user->email)->send(new ApplicationFail($application->user));
                }
                // 4. 「審査落ち」に変更された申請の会員に対してメール送信

            }

            // すべての「審査待ち」の申請を取得する。
            $applicantions = EventMtbApplication::query()
                ->where("event_id", $event->id)
                ->where("application_status_id", MtbApplicationStatus::CHECK_WAIT)
                ->get();

            foreach($applicantions as $application) {
                // 上記の審査を全部「審査落ち」に変更して
                $application->application_status_id = 3;
                $application->save();
                // 上記の審査の会員に「審査落ち」メールを送信する。
                Mail::to($application->user->email)->send(new ApplicationFail($application->user));
            }
        }

    }
}
