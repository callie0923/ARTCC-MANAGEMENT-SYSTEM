<?php

namespace App\Forum;

use Illuminate\Database\Eloquent\Model;

class ForumReadThreads extends Model
{
    public $table = 'forum_read_threads';
    public $timestamps = false;
    public $fillable = ['thread_id', 'user_id'];
}