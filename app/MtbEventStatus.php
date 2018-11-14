<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
use Illuminate\Support\Facades\Event;
=======
>>>>>>> 97d4fdf1118c1d19c038f95711dfe413d9788e03

class MtbEventStatus extends Model
{
    protected $table = "mtb_event_statuses";
<<<<<<< HEAD
    public function events()
    {
        return $this->hasMany(Event::class,'event_status_id');
    }
=======
    
>>>>>>> 97d4fdf1118c1d19c038f95711dfe413d9788e03
}
