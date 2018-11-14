<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\EventMtbApplication;

class Event extends Model
{

    protected $table = "events";
    public function location()
   {
       return $this->belongsTo("App\MtbLocation", "location_id");
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

}
