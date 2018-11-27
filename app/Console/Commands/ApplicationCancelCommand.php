<?php

namespace App\Console\Commands;
use App\Event;
use App\EventMtbApplication;
use Illuminate\Console\Command;
class ApplicationCancelCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'batch:application_cancel';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $events = Event::query()->where("event_status_id", "4")->get();
        foreach($events as $event) {
            $event_id = $event->id;
            $event_mtb_application=EventMtbApplication::query()->where("event_id", "$event_id")->get();
            foreach($event_mtb_applications as $event_mtb_application){
                $event_mtb_application->application_status_id=2;
                $event_mtb_application->save();
            }
        }
    }
}
