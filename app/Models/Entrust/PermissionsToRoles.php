<?php

namespace App\Models\Entrust;

use Illuminate\Database\Eloquent\Model;

class PermissionsToRoles extends Model
{
    public $timestamps = false;
    protected $table = 'entrust_permissions_to_role';
}