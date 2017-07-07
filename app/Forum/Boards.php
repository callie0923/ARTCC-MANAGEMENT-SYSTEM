<?php

namespace App\Forum;

use Illuminate\Database\Eloquent\Model;
use DateTime;
use Illuminate\Support\Facades\Auth;

/**
 * App\Forum\Boards
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Forum\Threads[]              $allthreads
 * @property-read \App\Forum\Categories                                                      $category
 * @property-read mixed                                                                      $last_update
 * @property-read mixed                                                                      $reply_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Forum\BoardPostPermissions[] $postPermissions
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Forum\Threads[]              $stickyThreads
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Forum\Threads[]              $threads
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Forum\BoardViewPermissions[] $viewPermissions
 * @mixin \Eloquent
 */
class Boards extends Model
{
    public $table = 'forum_boards';
    public $fillable = ['category_id','name','description','ordee_index'];

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

    public function postPermissions() {
        return $this->hasMany(BoardPostPermissions::class, 'board_id', 'id');
    }

    public function writePermissions() {
        $roles = [];
        foreach($this->postPermissions as $postPermission) {
            $roles[] = $postPermission->role;
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

    public function UserCanPost()
    {
        if(Auth::check()) {
            if(count($this->writePermissions()) > 0) {
                foreach($this->writePermissions() as $permission) {
                    if(Auth::user()->hasRole($permission)) return true;
                }
                return false;
            }
            return true;
        }
        return false;
    }

    public function UserCanView() {
        if(count($this->permissions()) > 0) {
            foreach($this->permissions() as $permission) {
                if(Auth::user()->hasRole($permission)) return true;
            }
            return false;
        } else {
            return true;
        }
    }
}