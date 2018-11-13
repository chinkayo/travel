<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\event;
use App\MtbEventType;

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
        return view('lists');
    }
}
