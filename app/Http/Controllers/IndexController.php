<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\event;
use App\MtbEventType;
use App\MtbArea;
use App\MtbEventStatus;
use Illuminate\Support\Facades\Input;
use App\MtbLocation;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $events = Event::query()
                        ->where('user_id','1')
                        ->orderBy('start_apply_date','ASC')
                        ->take(4)
                        ->get();
        $eventTypes = MtbEventType::all();
        return view('index',['events'=>$events,'eventTypes'=>$eventTypes]);
    }

    public function lists()
    {
        $events = Event::query()->paginate(2);
        $areas = MtbArea::all();
        $eventTypes = MtbEventType::all();
        $eventStatuses = MtbEventStatus::query()
                                        ->take(2)
                                        ->get();
        return view('lists',['areas'=>$areas,'eventTypes'=>$eventTypes,'eventStatuses'=>$eventStatuses,'events'=>$events]);
    }

    public function search(Request $request)
    {
        if (Input::has('areas')) {
            $area_ids=[];
            $area_ids=$request->input('areas');
            $locations = MtbLocation::query()->wherein('area_id',$area_ids)->get();
            foreach ($locations as $location) {
                echo $location->id;
            }
        }
        if (Input::has('types')) {
            $type_ids=[];
            $type_ids=$request->input('types');
        }
        if (Input::has('statuses')) {
            $status_ids=[];
            $status_ids=$request->input('statuses');
        }
        
    }
}
