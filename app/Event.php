<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\EventMtbApplication;
use Illuminate\Http\Request;

class Event extends Model
{

    protected $table = "events";
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function location()
    {
       return $this->belongsTo("App\MtbLocation", "location_id");
    }
    public function company()
    {
        return $this->belongsTo(TravelCompany::class,'company_id');
    }
    public function eventtype()
    {
        return $this->belongsTo(MtbEventType::class,'event_type_id');
    }
    public function eventstatus()
    {
        return $this->belongsTo(MtbEventStatus::class,'event_status_id');
    }
    public function applicationstatus()
    {
        return $this->belongsTo(MtbApplicationStatus::class,'application_status_id');
    }

    public function application_number()
    {
       $num = EventMtbApplication::query()->where("event_id",$this->id)->count();
       return $num;
    }

    public function statuses()
    {
       $start_apply_date = Event::query()->whereDate('start_apply_date','<','2018-03-1')->get();


       return $start_apply_date;
    }

    public static function search_events(Request $request) 
    {

        $events = self::query();

        if($request->get("keyword")) {
            $events->where("title", "LIKE", "%" . $request->get("keyword") . "%");
        }

        if($request->get("areas") && is_array($request->get("areas")) && count($request->get("areas")) > 0 ) {
            $events->whereHas("location", function($query) use($request) {
                $query->whereIn("mtb_locations.area_id", $request->get("areas"));
            });
        }

        if($request->get("types") && is_array($request->get("types")) && count($request->get("types")) > 0 ) {
            $events->whereIn("event_type_id", $request->get("types"));
        }
        
        if($request->get("statuses") && is_array($request->get("statuses")) && count($request->get("statuses")) > 0 ) {
            $events->whereIn("event_status_id", $request->get("statuses"));
        } else {
            $events->whereIn("event_status_id", [MtbEventStatus::BEFORE_APPLICATION, MtbEventStatus::APPLICATING]);
        }

        return $events;

    }

}
