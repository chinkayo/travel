<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\event;
use App\MtbEventType;
use App\MtbArea;
use App\MtbEventStatus;
use Illuminate\Support\Facades\Input;
use App\MtbLocation;
use App\MtbApplicationStatus;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $events = Event::query()
                        ->where('user_id','2')
                        ->orderBy('start_apply_date','ASC')
                        ->take(4)
                        ->get();
        $eventTypes = MtbEventType::all();
        return view('index',['events'=>$events,'eventTypes'=>$eventTypes]);
    }

    public function lists(Request $request)
    {
        
        // 検索条件のためのデータ準備
        $areas = MtbArea::all();
        $eventTypes = MtbEventType::all();
        $eventStatuses = MtbEventStatus::get_public_statuses();

        // 対象イベントを選択
        $events = Event::search_events($request)->paginate(2);

        return view('lists',
            [
                'areas'=>$areas,
                'eventTypes'=>$eventTypes,
                'eventStatuses'=>$eventStatuses,
                'events'=>$events,
                "request" => $request
            ]
        );
    }

}
