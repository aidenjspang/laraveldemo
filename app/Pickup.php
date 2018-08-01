<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pickup extends Model
{
    protected $table = 'pickup';

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
