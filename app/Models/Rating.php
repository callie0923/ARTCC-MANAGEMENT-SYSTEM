<?php

namespace App\Models;

use App\BaseModel;

class Rating extends BaseModel
{
    public $table = 'ratings';
    public $timestamps = false;
    public $fillable = ['rating_id','rating_short','rating_long'];
}