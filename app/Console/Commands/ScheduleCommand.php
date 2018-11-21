<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ScheduleCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:run_schedule';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';
        protected $start_apply_date;
        protected $deadline;
        protected $capacity;
        protected $shortagecancel;
        protected $cancel;

    /**
     * Create a new command instance.
     *
     * @return void
     */

     public function change_status(){
         /**
          *各イベントの申し込み時間が開始する時点～終了する時点の間に、
          *マイページー＞発表済みー＞イベント募集状態は自動的に申し込み受付中に変更する。
          * ＋途中キャンセルボタンを表示させる。
          */
     }

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
        //
    }
}
