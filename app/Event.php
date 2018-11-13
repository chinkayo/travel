<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = "events";
    public function location()
    {
       return $this->belongsTo(MtbLocation::class, "location_id");
    }
}
