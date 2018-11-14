<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MtbEventType extends Model
{
    protected $table = "mtb_event_types";
    public function events()
    {
<<<<<<< HEAD
        return $this->hasMany(Event::class,'event_type_id');
=======
        $this->hasMany(Event::class,'event_type_id');
>>>>>>> 97d4fdf1118c1d19c038f95711dfe413d9788e03
    }
}
