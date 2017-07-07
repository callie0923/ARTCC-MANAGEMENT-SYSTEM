<?php

namespace App\Forum;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Forum\BoardPostPermissions
 *
 * @mixin \Eloquent
 */
class BoardPostPermissions extends Model
{
    public $table = 'forum_board_post_permissions';
    public $timestamps = false;
    public $fillable = ['role','board_id'];
}