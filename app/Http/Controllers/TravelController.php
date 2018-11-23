<?php


namespace App\Http\Controllers;

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
            'area'=>'required',
            'location'=>'required',
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
            'area.required'=>'選択してください。',
            'location.required'=>'選択してください。',
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

            // TODO 現在登録機能が使えないので、仮のデータを使う。
            // 本番運用の時に、該当ロジックを変更してください。
            $event->user_id = 1;
            $event->application_status_id = 1;
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

        $events = Event::query()->where("application_status_id",$application_status_id)->paginate(3);;
        return view('travel.detail',[
            'events'=>$events,
        ]);
    }



    public function showevent_statuses(Request $request)
    {

        $events = Event::paginate(1);
        return view('travel.event_statuses',[
            'events'=>$events,
        ]);
    }

}
