<?php

namespace App\Models\ARTCC;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class UserNotifications extends Model
{
    public $table = 'user_notifications';

    public function notification() {
        return $this->hasOne(Notifications::class, 'id', 'notification_id');
    }

    public function user() {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}