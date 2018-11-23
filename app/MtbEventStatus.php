<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Event;

class MtbEventStatus extends Model
{

    const BEFORE_APPLICATION = 1;
    const APPLICATING =2;
    const APPLICATION_SUCCESS = 3;
    const APPLICATION_CANCEL = 4;
    const APPLICATION_BY_OWNER = 5;


    protected $table = "mtb_event_statuses";
    public function events()
    {
        return $this->hasMany(Event::class,'event_status_id');
    }

    public static function get_public_statuses()
    {

        $statuses = self::query()->where("id", self::BEFORE_APPLICATION)->orWhere("id", self::APPLICATING)->get();

        return $statuses;

    }
    
}
