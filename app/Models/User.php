<?php

namespace App\Models;

use Zizaco\Entrust\Traits\EntrustUserTrait;
use App\Models\ZJX\UserCert;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use EntrustUserTrait;

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
        return $this->hasOne(UserCert::class, 'user_id', 'id');
    }
}
