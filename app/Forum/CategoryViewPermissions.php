<?php

namespace App\Forum;

use Illuminate\Database\Eloquent\Model;

class CategoryViewPermissions extends Model
{
    public $table = 'forum_category_view_permissions';
    public $timestamps = false;
    public $fillable = ['category_id', 'role'];
}