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
   public function eventstatus()
  {
      return $this->belongsTo("App\MtbEventStatus", "event_status_id");
  }
  public function eventtype()
 {
     return $this->belongsTo("App\MtbEventType", "event_type_id");
 }


   public function application_number()
   {
       $num = EventMtbApplication::query()->where("event_id",$this->id)->count();
       return $num;
   }



}
