<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MtbEventStatus extends Model
{
    protected $table = "mtb_event_statuses";
    public function events()
     {
         return $this->hasMany("App\Event", "event_status_id");
     }
}
