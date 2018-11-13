<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\event;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $events = Event::query()
                        ->where('user_id','1')
                        ->orderBy('start_apply_date','ASC')
                        ->take(4)
                        ->get();
        return view('index',['events'=>$events]);
    }
}
