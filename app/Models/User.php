<?php

namespace App\Models;

use App\Models\ZJX\UserCerts;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', //cid unique
        'first_name',
        'last_name',
        'email', // email unique
        'rating_id', // links to rating
        'can_train', // 1 or 0
        'visitor', // 1 or 0
        'visitor_from', // string
        'status' // 0 (active) or 1 (inactive) or 2 (loa)
    ];

    public function rating() {
        return $this->hasOne(Rating::class, 'id', 'rating_id');
    }

    public function certs() {
        return $this->hasOne(UserCerts::class, 'user_id', 'id');
    }
}
