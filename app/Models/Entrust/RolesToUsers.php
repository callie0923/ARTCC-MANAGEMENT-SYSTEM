<?php

namespace App\Models\Entrust;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class RolesToUsers extends Model
{
    public $timestamps = false;
    protected $table = 'entrust_roles_to_user';

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}