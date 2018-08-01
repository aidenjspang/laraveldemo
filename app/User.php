<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'confirm_code', 'activated'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['confirm_code', 'password', 'remember_token'];

    protected $dates = ['last_login'];

    protected $casts = ['activated' => 'boolean'];

    public function articles()
    {
            return $this->hasMany(Article::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function suppliers()
    {
        return $this->hasMany(Supplier::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function isAdmin()
    {
        $ret = false;

        if ($this->id == 52)
            $ret = true;

        return $ret;
    }
}
