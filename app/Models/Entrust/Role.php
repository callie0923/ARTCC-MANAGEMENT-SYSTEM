<?php

namespace App\Models\Entrust;

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
    public static function getActive()
    {
        return self::where('active', 1)->get();
    }

    public function staff()
    {
        if($this->training_role == 1) {
            return $this->hasMany(RolesToUsers::class, 'role_id', 'id');
        } else {
            return $this->hasOne(RolesToUsers::class, 'role_id', 'id');
        }
    }
}