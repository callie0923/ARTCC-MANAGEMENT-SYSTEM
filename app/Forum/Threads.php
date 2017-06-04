<?php

namespace App\Forum;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Threads extends Model
{
    public $table = 'forum_threads';
    public $fillable = [];

    public function replies() {
        return $this->hasMany(Replies::class, 'thread_id', 'id');
    }

    public function owner() {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function lastReplyTime() {
        $timestamp = '';
        foreach($this->replies as $reply) {
            $timestamp = $reply->created_at;
        }
        return $timestamp;
    }

    public function lastReplyUser() {
        $user = '';
        foreach($this->replies as $reply) {
            $user = $reply->owner->full_name;
        }
        return $user;
    }

    public function isUnread() {
        $read = ForumReadThreads::where('user_id', Auth::id())->where('thread_id', $this->id)->first();
        if(!$read) {
            return true;
        }
        return false;
    }
}