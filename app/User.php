<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class User extends Model implements Authenticatable
{
    use AuthenticableTrait;
    protected $table = "users";
<<<<<<< HEAD
    public function events()
    {
        return $this->hasMany(Event::class,'user_id');
    }
=======

>>>>>>> 97d4fdf1118c1d19c038f95711dfe413d9788e03
}
