<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\EventMtbApplication;

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
    public function eventType()
    {
        return $this->belongsTo(MtbEventType::class,'event_type_id');
    }
    public function eventStatus()
    {
        return $this->belongsTo(MtbEventStatus::class,'event_status_id');
    }
    public function applicationStatus()
    {
        return $this->belongsTo(MtbApplicationStatus::class,'application_status_id');
    }

    public function application_number()
    {
       $num = EventMtbApplication::query()->where("event_id",$this->id)->count();
       return $num;
    }




}
