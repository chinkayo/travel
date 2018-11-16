<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MtbApplicationStatus extends Model
{
    protected $table ="mtb_application_statuses";

    public function events()
    {
        return $this->hasMany(Event::class,'application_status_id');
    }

}
