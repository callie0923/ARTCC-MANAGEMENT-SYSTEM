<?php

namespace App\Models\ARTCC;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ARTCC\SoloCert
 *
 * @mixin \Eloquent
 */
class SoloCert extends Model
{
    public $table = 'user_solos';
    public $primaryKey = 'id';
    public $fillable = ['user_id','local_position','expiry','position'];

    // local_position = min_twr etc
    // expiry = yyyy-mm-dd
    // position = CHS_APP etc
}