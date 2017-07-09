<?php

namespace App\Forum;

use Illuminate\Database\Eloquent\Model;

class BoardPostPermissions extends Model
{
    public $table = 'forum_board_post_permissions';
    public $timestamps = false;
    public $fillable = ['role','board_id'];
}