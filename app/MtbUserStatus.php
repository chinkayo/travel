<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MtbUserStatus extends Model
{
    protected $table = "mtb_user_statuses";
<<<<<<< HEAD
=======
    public function users()
    {
        $this->hasMany(User::class,'user_status_id');
    }
>>>>>>> 97d4fdf1118c1d19c038f95711dfe413d9788e03
}
