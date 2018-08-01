<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class emaillog extends Model
{
    protected $fillable = [
        'booking_id',
        'sender',
        'receiver',
        'subject',
        'message'
    ];
}
