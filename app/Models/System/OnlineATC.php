<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;

class OnlineATC extends Model
{
    public $table = 'online_atc';
    public $fillable = ['user_id', 'position', 'frequency', 'controller_name', 'rating', 'atis', 'start_time'];
    public $primaryKey = 'user_id';
}