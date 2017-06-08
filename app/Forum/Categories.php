<?php

namespace App\Forum;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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
        foreach($this->viewPermissions() as $viewPermission) {
            $roles[] = $viewPermission->role;
        }
        return $roles;
    }

    public function UserCanView() {
        if($this->need_auth == 1 && Auth::check()) {
            if(count($this->permissions()) > 0) {
                foreach($this->permissions() as $permission) {
                    if(Auth::user()->hasRole($permission)) return true;
                }
                return false;
            }
            return true;
        } else if($this->need_auth == 1 && !Auth::check()) {
            return false;
        } else {
            return true;
        }
    }
}