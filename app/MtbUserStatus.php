<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MtbUserStatus extends Model
{
    protected $table = "mtb_user_statuses";

    public function users()
    {
        $this->hasMany(User::class,'user_status_id');
    }

}
