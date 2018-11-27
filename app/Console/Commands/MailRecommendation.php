<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Facade;
use App\Event;
use App\User;
use Illuminate\Support\Carbon;
use App\MtbArea;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\SendRecommendation;

class MailRecommendation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:sendrecommendation';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send recommendation event to users';

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
        $areas = MtbArea::all();
        foreach ($areas as $area) {
            $users = User::wherehas('location',function($q) use($area){
                $q->where('Mtb_locations.area_id',$area->id);
            })->get();
            $events = Event::wherehas('location',function($q) use($area){
                $q->where('Mtb_locations.area_id',$area->id);
            })->take(4)->get();
            foreach ($users as $user) {
                Mail::to($user->email)->send(new SendRecommendation($user,$events));
                Log::info('###sent recommendation Email to '.$user->email.' at '.Carbon::now());
            }
        }
    }
}
