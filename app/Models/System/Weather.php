<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;

class Weather extends Model
{
    public $table = 'airport_weather';
    public $fillable = ['airport_id','metar','altim_in_hg','flight_cat','wind'];

    public function airport()
    {
        return $this->hasOne(Airport::class, 'id', 'airport_id');
    }

    public function tableclass()
    {
        switch($this->flight_cat) {
            case 'VFR':
                return 'success';
                break;
            case 'MVFR':
                return 'warning';
                break;
            case 'IFR':
                return 'danger';
                break;
            case 'LIFR':
                return 'info';
                break;
            default:
                return '';
                break;
        }
    }
}