<?php


namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use App\Event;
use App\TravelCompany;
use Validator;
use Illuminate\Http\Request;
use App\Http\Requests;
use Storage;
use App\Http\Controllers\Controller;
use App\MtbArea;
use App\MtbLocation;
use App\MtbEventType;
use App\EventMtbApplication;
use App\User;


class TravelController extends Controller
{
    public function index()
    {
        return view('travel.userdetail');
    }

    public function showform()
    {
        $mtb_areas = MtbArea::all();
        $mtb_locations = MtbLocation::all();
        $mtb_event_types = MtbEventType::all();


        return view('travel.eventform',[
            "mtb_areas" => $mtb_areas,
            "mtb_locations" => $mtb_locations,
            "mtb_event_types" => $mtb_event_types,
        ]);
    }

    public function insertform(Request $request){
        $rules=[
            'title'=>'required|max:30',
            "detail" => "required",
            'area'=>'required|integer',
            'location'=>'required|integer',
            'eventtype'=>'required',
            'quantity'=>'required|numeric|between:1,100',
            'minquantity'=>'required|numeric|between:1,100',
            'start_date'=>'required',
            'finish_date'=>'required',
            'start_apply_date'=>'required',
            'deadline'=>'required',
        ];
        $messages=[
            'title.required'=>'タイトルを必ず入力してください。',
            "detail.required" => "イベント詳細を入力してください。",
            'area.integer'=>'選択してください。',
            'location.integer'=>'選択してください。',
            'eventtype.required'=>'選択してください。',
            'quantity.required'=>'入力してください。',
            'quantity.numeric'=>'数字を入力してください。',
            'quantity.between'=>'1-100の数字を入力してください。',
            'minquantity.required'=>'入力してください。',
            'minquantity.numeric'=>'数字を入力してください。',
            'minquantity.between'=>'1-100の数字を入力してください。',
            'start_date.required'=>'時間を選択してください。',
            'finish_date.required'=>'時間を選択してください',
            'start_apply_date.required'=>'時間を選択してください',
            'deadline.required'=>'時間を選択してください',
        ];


        $validator=Validator::make($request->all(),$rules,$messages);

        if($validator->fails()){
            return redirect('/travel/eventform')
                    ->withErrors($validator)
                    ->withInput();
        }

        else {
            $event = new Event;
            $event->user_id = Auth::id();
            $event->title = $request->title;
            $event->location_id = $request->location;
            $event->event_type_id = $request->eventtype;
            $event->start_date = $request->start_date;
            $event->finish_date = $request->finish_date;
            $event->start_apply_date = $request->start_apply_date;
            $event->deadline = $request->deadline;
            $event->capacity = $request->quantity;
            $event->minimum = $request->minquantity;
            $event->price = $request->price;
            $event->price_comment = $request->priceremark;
            $event->travel_company_flg = $request->company;
            $event->event_detail = $request->detail;

            $filename = $request->file('picture')->getClientOriginalName();
            $path = $request->file('picture')->storeAs('public/travelimg', $filename);
            $domain = strstr($path, 't');
            $event->image = $domain;
            $event->event_status_id = 1;
            $event->save();

            return view('travel.insertsuccess');

        }
    }


    public function show_detail(Request $request, $application_status_id)
    {

        $eventsmtbapplications = EventMtbApplication::query()->where("user_id",Auth::id())->where('application_status_id',$application_status_id)->get();
        $event_ids=array();
        foreach ($eventsmtbapplications as $eventmtbapplication) {
            $event_id = $eventmtbapplication->event_id;
            $event_ids[] = $event_id;
        }
        $events = Event::query()->wherein('id',$event_ids)->paginate(5);
        return view('travel.detail',[
            'events'=>$events,
        ]);
    }


    public function showevent_statuses(Request $request)
    {

        $events = Event::where('user_id',Auth::id())->paginate(3);
        return view('travel.event_statuses',[
            'events'=>$events
        ]);
    }


    public function show_event_detail(Request $request, $event_id)
    {

        $events=Event::query()->where("id",$event_id)->get();

        $event_mtb_application = EventMtbApplication::query()
            ->where("event_id" , $event_id)
            ->where("user_id", Auth::id())
            ->first();


        return view('travel.eventdetail',[
            'events'=>$events,
            "event_mtb_application" => $event_mtb_application
        ]);
    }

    public function apply_event(Request $request)
    {
        $eventmtbapplication = new EventMtbApplication;

        $event = Event::find($request->event_id);
        if($event->event_status_id == 2) {
            $eventmtbapplication->user_id = Auth::id();
            $eventmtbapplication->event_id = $request->event_id;
            $eventmtbapplication->application_status_id = 1;
            $eventmtbapplication->save();

            if($event->capacity = $eventmtbapplication->count()){
                $event->event_status_id = 3;
                $event->save();
            }
        }
        return redirect(route("get_event_detail", ["event_id" => $request->event_id]));
    }

    public function showe_people_status(Request $request,$event_id)
    {
        $events=Event::query()->where("id",$event_id)->get();
        $eventmtbapplications= EventMtbApplication::query()->where("event_id" , $event_id)->get();
        $users=array();
        foreach($eventmtbapplications as $eventmtbapplication){
            $user= User::query()->where("id" , $eventmtbapplication->user_id)->get();
            $users[]=$user;
        }

        return view('travel.peoplestatus',[
            'eventmtbapplications'=>$eventmtbapplications,
            'users'=>$users,
            'events'=>$events,
        ]);
    }


    

}
