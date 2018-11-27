<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class User extends Model implements Authenticatable
{
    use AuthenticableTrait;
    protected $table = "users";
    public function events()
    {
        return $this->hasMany(Event::class,'user_id');
    }

    public function event_mtb_applications()
    {
        return $this->hasMany("App\EventMtbApplication", "user_id");
    }

    public function mailList()
    {
        return $this->hasOne(MailList::class,'user_id');
    }
    public function location()
    {
        return $this->belongsTo(MtbLocation::class,'location_id');
    }

}
