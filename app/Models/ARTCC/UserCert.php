<?php

namespace App\Models\ARTCC;

use Illuminate\Database\Eloquent\Model;

class UserCert extends Model
{
    public $table = 'users_certs';
    public $primaryKey = 'id';
    public $fillable = ['user_id','min_del','min_gnd','min_twr','min_app','f11_del','f11_gnd','f11_twr','f11_app','zjx'];

    //0 = uncertified
    //1 = training
    //2 = solo
    //3 = certified
}