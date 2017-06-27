<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;

class ControllerLog extends Model
{
    public $table = 'controller_atc_log';
    public $fillable = ['user_id', 'date', 'start_time', 'duration', 'stream_update'];
}