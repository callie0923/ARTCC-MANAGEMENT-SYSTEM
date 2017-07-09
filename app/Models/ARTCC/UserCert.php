<?php

namespace App\Models\ARTCC;

use Illuminate\Database\Eloquent\Model;

class UserCert extends Model
{
    public $table = 'users_certs';
    public $primaryKey = 'id';
    public $fillable = ['user_id','min_del','min_gnd','min_twr','min_app','maj_del','maj_gnd','maj_twr','maj_app','enroute'];

    //0 = uncertified
    //1 = training
    //2 = solo
    //3 = certified

    public function rosterClass($cert) {
        switch ($cert) {
            case 0:
                return 'danger';
                break;
            case 1:
                return 'warning';
                break;
            case 2:
                return 'info';
                break;
            case 3:
                return 'success';
                break;
        }
    }
}