<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = ['supplier_name', 'country', 'city', 'contact_name', 'email', 'telephone', 'address', 'memo'];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function booking()
    {
        return $this->hasMany(Booking::class, 'supplier_id');
    }
}
