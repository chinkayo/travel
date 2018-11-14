<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MtbLocation extends Model
{
    protected $table = "mtb_locations";
    public function events()
<<<<<<< HEAD
    {
       return $this->hasMany(Event::class, "location_id");
    }
    public function area()
    {
        return $this->belongsTo(MtbArea::class, "area_id");
=======
   {
       return $this->hasMany("App\Event", "location_id");
   }
   public function area()
    {
        return $this->belongsTo("App\MtbArea", "area_id");
>>>>>>> 97d4fdf1118c1d19c038f95711dfe413d9788e03
    }
}
