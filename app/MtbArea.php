<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MtbArea extends Model
{
    protected $table = "mtb_areas";
    public function locations()
    {

        return $this->hasMany(MtbLocation::class, "area_id");
    }

        
}
