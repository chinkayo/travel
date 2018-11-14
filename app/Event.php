<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = "events";
<<<<<<< HEAD
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function location()
    {
       return $this->belongsTo(MtbLocation::class, "location_id");
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
=======
    public function location()
   {
       return $this->belongsTo("App\MtbLocation", "location_id");
   }


>>>>>>> 97d4fdf1118c1d19c038f95711dfe413d9788e03
}
