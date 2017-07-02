<?php

namespace App\Models\System\Index;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class NewMembers extends Model
{
    public $table = 'index_members';
    public $fillable = ['cid'];

    public function user() {
        return $this->hasOne(User::class, 'id', 'cid');
    }
}