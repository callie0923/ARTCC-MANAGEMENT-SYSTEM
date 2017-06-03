<?php

namespace App\Forum;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    public $table = 'forum_categories';
    public $fillable = [];

    public function boards() {
        return $this->hasMany(Boards::class, 'category_id', 'id');
    }

    public function viewPermissions() {
        return $this->hasMany(CategoryViewPermissions::class, 'category_id', 'id');
    }

    public function permissions() {
        $roles = [];
        foreach($this->viewPermissions as $viewPermission) {
            $roles[] = $viewPermission->role;
        }
        return $roles;
    }
}