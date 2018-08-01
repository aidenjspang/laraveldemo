<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $table = 'vehicle';

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
