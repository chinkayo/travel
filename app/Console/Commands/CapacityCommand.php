<?php

namespace App\Console\Commands;
use App\Event;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\FinshCapacity;
use App\EventMtbApplication;
use App\User;
class CapacityCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'batch:finish_capacity';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '定員に達成したら、「申し込み受付中」のイベントを「人数達成」に変更する';

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
        $events = Event::query()->where("event_status_id", "2")->get();
        foreach($events as $event){
            $event_id = $event->id;
            $count_id=EventMtbApplication::query()->where("event_id", "$event_id")->count("user_id");
            if($event->capacity = $count_id){
                $event->event_status_id = 3;
                $event->save();
                // find the 主催者
                $user_id = $event->user_id;
                $user = User::find($user_id);
                Mail::to($user->email)->send(new FinshCapacity($user));
            }
        }
    }
}
