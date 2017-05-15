<?php

namespace App\Http\Models;

use App\BaseModel;

class Airport extends BaseModel
{
    public $table = 'airports';
    protected $primaryKey = 'icao';
    public $timestamps = false;
    public $fillable = ['name','iata','icao','lat','lon','elev','country','municipality','is_zjx'];
}