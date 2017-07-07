<?php

namespace App\Models\Entrust;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Entrust\PermissionsToRoles
 *
 * @mixin \Eloquent
 */
class PermissionsToRoles extends Model
{
    public $timestamps = false;
    protected $table = 'entrust_permissions_to_role';
}