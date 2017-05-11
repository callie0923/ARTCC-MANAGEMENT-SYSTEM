<?php

namespace App\Http\Models;

use App\BaseModel;

class Airport extends BaseModel
{
    public $table = 'airports';
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $fillable = ['name','iata','icao','lat','lon','elev','country','municipality'];
}