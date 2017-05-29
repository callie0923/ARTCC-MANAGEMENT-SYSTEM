<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;

class Weather extends Model
{
    public $table = 'airport_weather';
    public $fillable = ['airport_id','metar','altim_in_hg','flight_cat'];

    public function airport()
    {
        return $this->hasOne(Airport::class, 'id', 'airport_id');
    }
}