<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MtbArea extends Model
{
    protected $table = "mtb_areas";
    public function locations()
    {
<<<<<<< HEAD
        return $this->hasMany(MtbLocation::class, "area_id");
    }
=======
        return $this->hasMany("App\MtbLocation", "area_id");
    }

>>>>>>> 97d4fdf1118c1d19c038f95711dfe413d9788e03
}
