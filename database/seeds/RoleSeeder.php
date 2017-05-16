<?php

use App\Models\Entrust\Role;
use App\Models\Rating;
use App\Models\User;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $atm = new Role;
        $atm->name         = 'atm';
        $atm->display_name = 'Air Traffic Manager';
        $atm->description  = 'ARTCC Air Traffic Manager';
        $atm->training_role  = 0;
        $atm->active = 1;
        $atm->save();

        $datm = new Role;
        $datm->name         = 'datm';
        $datm->display_name = 'Deputy Air Traffic Manager';
        $datm->description  = 'ARTCC Deputy Air Traffic Manager';
        $datm->training_role  = 0;
        $datm->active = 1;
        $atm->save();

        $ta = new Role;
        $ta->name         = 'ta';
        $ta->display_name = 'Training Administrator';
        $ta->description  = 'ARTCC Training Administrator';
        $ta->training_role  = 0;
        $ta->active = 1;
        $ta->save();

        $ec = new Role;
        $ec->name         = 'ec';
        $ec->display_name = 'Events Coordinator';
        $ec->description  = 'ARTCC Events Coordinator';
        $ec->training_role  = 0;
        $ec->active = 1;
        $ec->save();

        $fe = new Role;
        $fe->name         = 'fe';
        $fe->display_name = 'Facility Engineer';
        $fe->description  = 'ARTCC Facility Engineer';
        $fe->training_role  = 0;
        $fe->active = 1;
        $fe->save();

        $wm = new Role;
        $wm->name         = 'wm';
        $wm->display_name = 'Webmaster';
        $wm->description  = 'ARTCC Webmaster';
        $wm->training_role  = 0;
        $wm->active = 1;
        $wm->save();

        $ata = new Role;
        $ata->name         = 'ata';
        $ata->display_name = 'Assistant Training Administrator';
        $ata->description  = 'ARTCC Assistant Training Administrator';
        $ata->training_role  = 0;
        $ata->active = 1;
        $ata->save();

        $aec = new Role;
        $aec->name         = 'aec';
        $aec->display_name = 'Assistant Events Coordinator';
        $aec->description  = 'ARTCC Assistant Events Coordinator';
        $aec->training_role  = 0;
        $aec->active = 1;
        $aec->save();

        $awm = new Role;
        $awm->name         = 'awm';
        $awm->display_name = 'Assistant Webmaster';
        $awm->description  = 'ARTCC Assistant Webmaster';
        $awm->training_role  = 0;
        $awm->active = 1;
        $awm->save();

        $mtr = new Role;
        $mtr->name         = 'mtr';
        $mtr->display_name = 'Mentor';
        $mtr->description  = 'ARTCC Mentor';
        $mtr->training_role  = 1;
        $mtr->active = 1;
        $mtr->save();

        $ins = new Role;
        $ins->name         = 'ins';
        $ins->display_name = 'Instructor';
        $ins->description  = 'ARTCC Instructor';
        $ins->training_role  = 1;
        $ins->active = 1;
        $ins->save();
    }
}
