<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    public $table = 'ratings';
    public $timestamps = false;
    public $fillable = ['rating_id','rating_short','rating_long'];
}