<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Console\Scheduling\Event;

class EventMtbApplication extends Model
{
    protected $table = "events_mtb_applications";

    public function application_status()
    {
        return $this->belongsTo("App\MtbApplicationStatus", "application_status_id");
    }

    public function user()
    {
        return $this->belongsTo("App\User", "user_id");
    }
}
