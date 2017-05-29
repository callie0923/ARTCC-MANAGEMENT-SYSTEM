<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    public $table = 'system_settings';
    public $fillable = ['artcc_code','vatusa_uls_key','vatusa_api_key','wx_nex_gen_radar','wx_vis_radar','wx_infrared_radar','wx_wind_surface_data'];
    public $timestamps = false;

    public $artccs = [
        'ZAN' => 'Anchorage',
        'ZAB' => 'Albuquerque',
        'ZTL' => 'Atlanta',
        'ZBW' => 'Boston',
        'ZAU' => 'Chicago',
        'ZOB' => 'Cleveland',
        'ZDV' => 'Denver',
        'ZFW' => 'Fort Worth',
        'HCF' => 'Honolulu',
        'ZHU' => 'Houston',
        'ZID' => 'Indianapolis',
        'ZJX' => 'Jacksonville',
        'ZKC' => 'Kansas City',
        'ZLA' => 'Los Angeles',
        'ZME' => 'Chicago',
        'ZMA' => 'Miami',
        'ZMP' => 'Minneapolis',
        'ZNY' => 'New York',
        'ZOA' => 'Oaklank',
        'ZLC' => 'Salt Lake',
        'ZSE' => 'Seattle',
        'ZDC' => 'Washington',
    ];

    public function getArtccLongAttribute()
    {
        foreach($this->artccs as $key => $value) {
            if($this->artcc_code == $key) {
                return $value;
            }
        }
        return '';
    }
}