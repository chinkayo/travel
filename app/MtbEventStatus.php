<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Event;

class MtbEventStatus extends Model
{
    protected $table = "mtb_event_statuses";
    public function events()
    {
        return $this->hasMany(Event::class,'event_status_id');
    }
    
}
