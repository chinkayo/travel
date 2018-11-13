<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TravelCompany extends Model
{
    protected $table = "travel_companies";
    public function events()
    {
        $this->hasMany(Event::class,'company_id');
    }
}
