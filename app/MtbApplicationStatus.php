<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MtbApplicationStatus extends Model
{
    protected $table ="mtb_application_statuses";
<<<<<<< HEAD
    public function events()
    {
        return $this->hasMany(Event::class,'application_status_id');
    }
=======
>>>>>>> 97d4fdf1118c1d19c038f95711dfe413d9788e03
}
