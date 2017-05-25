<?php

namespace App\Models;

use App\Models\ARTCC\UserNotifications;
use App\Models\System\Rating;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use App\Models\ARTCC\UserCert;
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

    public function getFullNameAttribute() {
        return $this->first_name.' '.$this->last_name;
    }

    public function getBackwardsNameAttribute() {
        return $this->last_name.' '.$this->first_name;
    }

    public function rating() {
        return $this->hasOne(Rating::class, 'id', 'rating_id');
    }

    public function certs() {
        return $this->hasOne(UserCert::class, 'user_id', 'id');
    }

    public function notifications() {
        return $this->hasMany(UserNotifications::class, 'user_id', 'id');
    }

    public function unreadNotifications() {
        return $this->hasMany(UserNotifications::class, 'user_id', 'id')->where('read_status', 0)->orderBy('id', 'desc');
    }
}
