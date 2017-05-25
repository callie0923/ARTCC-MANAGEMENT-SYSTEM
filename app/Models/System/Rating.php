<?php

namespace App\Models\System;

use App\BaseModel;

class Rating extends BaseModel
{
    public $table = 'ratings';
    public $timestamps = false;
    public $fillable = ['rating_id','rating_short','rating_long'];
}