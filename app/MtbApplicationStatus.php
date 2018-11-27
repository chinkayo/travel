<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MtbApplicationStatus extends Model
{
    const CHECK_WAIT = 1;
    const CHECK_PASS = 2;
    const CHECK_FAIL = 3;

    protected $table ="mtb_application_statuses";

    public function event_mtb_applications()
    {
        return $this->hasMany("App\EventMtbApplication", "application_status_id");
    }
}
