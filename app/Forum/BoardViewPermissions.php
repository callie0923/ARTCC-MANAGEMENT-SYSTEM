<?php

namespace App\Forum;

use Illuminate\Database\Eloquent\Model;

class BoardViewPermissions extends Model
{
    public $table = 'forum_board_view_permissions';
    public $timestamps = false;
    public $fillable = ['board_id','role'];
}