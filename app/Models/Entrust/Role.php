<?php

namespace App\Models\Entrust;

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
    public $fillable = ['name','display_name','description','role_desc','email','training_role','active'];

    public static function getActive()
    {
        return self::where('active', 1)->where('training_role', 0)->get();
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