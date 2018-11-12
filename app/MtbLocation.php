<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MtbLocation extends Model
{
    protected $table = "mtb_locations";
    public function events()
   {
       return $this->hasMany("App\Event", "location_id");
   }
   public function area()
    {
        return $this->belongsTo("App\MtbArea", "area_id");
    }
}
