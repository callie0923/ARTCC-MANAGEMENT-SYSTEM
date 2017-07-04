<?php

namespace App\Forum;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Forum\BoardViewPermissions
 *
 * @mixin \Eloquent
 */
class BoardViewPermissions extends Model
{
    public $table = 'forum_board_view_permissions';
    public $timestamps = false;
    public $fillable = ['board_id','role'];
}