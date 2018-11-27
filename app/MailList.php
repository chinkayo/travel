<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MailList extends Model
{
    protected $table = 'mail_lists';
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}

