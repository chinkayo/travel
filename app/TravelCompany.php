<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TravelCompany extends Model
{
    protected $table = "travel_companies";
    public function events()
    {
<<<<<<< HEAD
        return $this->hasMany(Event::class,'company_id');
=======
        $this->hasMany(Event::class,'company_id');
>>>>>>> 97d4fdf1118c1d19c038f95711dfe413d9788e03
    }
}
