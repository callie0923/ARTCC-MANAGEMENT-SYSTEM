<?php

namespace App\Forum;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Replies extends Model
{
    public $table = 'forum_thread_replies';
    public $fillable = ['thread_id','user_id','message'];

    public function owner() {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}