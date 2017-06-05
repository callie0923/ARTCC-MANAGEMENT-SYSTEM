<?php

namespace App\Forum;

use Illuminate\Database\Eloquent\Model;
use DateTime;

class Boards extends Model
{
    public $table = 'forum_boards';
    public $fillable = [];

    public function allthreads() {
        return $this->hasMany(Threads::class, 'board_id', 'id');
    }

    public function threads() {
        return $this->hasMany(Threads::class, 'board_id', 'id')->where('sticky', 0);
    }

    public function stickyThreads() {
        return $this->hasMany(Threads::class, 'board_id', 'id')->where('sticky', 1);
    }

    public function category() {
        return $this->hasOne(Categories::class, 'id', 'category_id');
    }

    public function getReplyCountAttribute() {
        $count = 0;
        foreach($this->allthreads as $thread) {
            foreach($thread->replies as $reply) {
                $count++;
            }
        }
        return $count;
    }

    public function getLastUpdateAttribute() {
        $time = '1970-01-01 00:00:00';
        foreach($this->allthreads as $thread) {
            $date1 = new DateTime($thread->created_at);
            $date2 = new DateTime($time);
            if ($date1 > $date2) {
                $time = $thread->created_at;
            }
            foreach($thread->replies as $reply) {
                $date1 = new DateTime($reply->created_at);
                $date2 = new DateTime($time);
                if ($date1 > $date2) {
                    $time = $reply->created_at;
                }
            }
        }
        return $time;
    }

    public function viewPermissions() {
        return $this->hasMany(BoardViewPermissions::class, 'board_id', 'id');
    }

    public function permissions() {
        $roles = [];
        foreach($this->viewPermissions as $viewPermission) {
            $roles[] = $viewPermission->role;
        }
        return $roles;
    }

    public function hasUnreadPosts() {
        foreach($this->threads as $thread) {
            if($thread->isUnread()) {
                return true;
            }
        }
        return false;
    }
}