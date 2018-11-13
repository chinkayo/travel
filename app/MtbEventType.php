<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MtbEventType extends Model
{
    protected $table = "mtb_event_types";
    public function events()
    {
        return $this->hasMany(Event::class,'event_type_id');
    }
}
