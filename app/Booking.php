<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'booking_id',
        'status_code',
        'request_datetime',
        'customer_name',
        'customer_email',
        'customer_contact_no',
        'number_of_guest',
        'city',
        'service_id',
        'arr_dep',
        'vehicle_code',
        'flight_number',
        'content',
        'note_supplier',
        'supplier_id',
        'price_fm_supplier',
        'hotel_bed_price',
        'currency',
        'surcharge',
        'paid_to_supplier',
        'hotelbeds_paid',
        'hotelbeds_invoice'
    ];

    protected $with = ['user'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function comments() {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function Supplier() {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }
}
