<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\event;
use App\MtbEventType;
use App\MtbArea;
use App\MtbEventStatus;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $events = Event::query()
                        ->where('user_id','1')
                        ->where('application_status_id','2')
                        ->orderBy('start_apply_date','ASC')
                        ->take(4)
                        ->get();
        $eventTypes = MtbEventType::all();
        return view('index',['events'=>$events,'eventTypes'=>$eventTypes]);
    }
    public function lists(Request $request)
    {
        $events = Event::query()
                        ->where('application_status_id','2')
                        ->paginate(2);
        $areas = MtbArea::all();
        $eventTypes = MtbEventType::all();
        $eventStatuses = MtbEventStatus::query()
                                        ->take(2)
                                        ->get();
        return view('lists',['areas'=>$areas,'eventTypes'=>$eventTypes,'eventStatuses'=>$eventStatuses,'events'=>$events]);
    }
}
