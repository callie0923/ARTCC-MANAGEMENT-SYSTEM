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
        $atm->name = 'atm';
        $atm->display_name = 'Air Traffic Manager';
        $atm->description  = 'ARTCC Air Traffic Manager';
        $atm->role_desc = 'The Air Traffic Manager is responsible to the VATUSA Southern Region Director for the overall administration of the ARTCC. The ATM is responsible for appointing ARTCC staff members and delegation of authorities.';
        $atm->training_role  = 0;
        $atm->active = 1;
        $atm->save();

        $datm = new Role;
        $datm->name = 'datm';
        $datm->display_name = 'Deputy Air Traffic Manager';
        $datm->description  = 'ARTCC Deputy Air Traffic Manager';
        $datm->role_desc = 'The Deputy Air Traffic Manager reports to the Air Traffic Manager and acts as Air Traffic Manager in their absence. The Deputy Air Traffic Manager is jointly responsible for administration and accuracy of the roster including visiting controllers.';
        $datm->training_role  = 0;
        $datm->active = 1;
        $datm->save();

        $ta = new Role;
        $ta->name = 'ta';
        $ta->display_name = 'Training Administrator';
        $ta->description = 'ARTCC Training Administrator';
        $ta->role_desc = 'The Training Administrator works with the Air Traffic Manager and Deputy Air Traffic Manager to build training programmes, establish training procedures and recommend instructors and mentors. The Training Administrator works with Instructors and Mentors to develop knowledge and mentors to help develop teaching ability.';
        $ta->training_role = 0;
        $ta->active = 1;
        $ta->save();

        $ec = new Role;
        $ec->name = 'ec';
        $ec->display_name = 'Events Coordinator';
        $ec->description = 'ARTCC Events Coordinator';
        $ec->role_desc = 'The Events Coordinator is responsible to the Deputy Air Traffic Manager for the coordination, planning, dissemination and creation of events to neighboring facilities, virtual airlines, VATUSA and VATSIM.';
        $ec->training_role = 0;
        $ec->active = 1;
        $ec->save();

        $fe = new Role;
        $fe->name = 'fe';
        $fe->display_name = 'Facility Engineer';
        $fe->description = 'ARTCC Facility Engineer';
        $fe->role_desc = 'The Facility Engineer is responsible to the Senior Staff for creation of sector files, radar client files, training scenarios, Letters of Agreement, Memorandums of Understanding, Standard Operating Procedures and other requests as directed and submission to the Air Traffic Manager for approval prior to dissemination.';
        $fe->training_role = 0;
        $fe->active = 1;
        $fe->save();

        $wm = new Role;
        $wm->name = 'wm';
        $wm->display_name = 'Webmaster';
        $wm->description = 'ARTCC Webmaster';
        $wm->role_desc = 'Responsible to the Deputy Air Traffic Manager for the operation and maintenance of all IT services including, but not limited to, the Website, Teamspeak and Email services and any other tasking as directed.';
        $wm->training_role = 0;
        $wm->active = 1;
        $wm->save();

        $ata = new Role;
        $ata->name = 'ata';
        $ata->display_name = 'Assistant Training Administrator';
        $ata->description = 'ARTCC Assistant Training Administrator';
        $ata->role_desc = 'The Assistant Training Administrator is appointed by the Training Administrator and approved by the Air Traffic Manager. The Assistant Training Administrator assists the Training Administrator in development and execution of training programmes, selection of Instructors and Mentors and other tasks as directed.';
        $ata->training_role = 0;
        $ata->active = 1;
        $ata->save();

        $aec = new Role;
        $aec->name = 'aec';
        $aec->display_name = 'Assistant Events Coordinator';
        $aec->description = 'ARTCC Assistant Events Coordinator';
        $aec->role_desc = 'The Assistant Events Coordinator is responsible to the Events Coordination for assistance in coordination, planning, dissemination and creation of events to neighboring facilities, virtual airlines, VATUSA and VATSIM and other tasking as directed.';
        $aec->training_role = 0;
        $aec->active = 1;
        $aec->save();

        $awm = new Role;
        $awm->name = 'awm';
        $awm->display_name = 'Assistant Webmaster';
        $awm->description = 'ARTCC Assistant Webmaster';
        $awm->role_desc = 'The Assistant Webmaster is appointed by the Webmaster and approved by the Air Traffic Manager. The Assistant Webmaster assists the Webmaster in development and management of IT services.';
        $awm->training_role = 0;
        $awm->active = 1;
        $awm->save();

        $ins = new Role;
        $ins->name = 'ins';
        $ins->display_name = 'Instructor';
        $ins->description = 'ARTCC Instructor';
        $ins->role_desc = 'Administers and assesses position certification practical exams, rating-promotion practical exams. Assigns written tests to students.';
        $ins->training_role = 1;
        $ins->active = 1;
        $ins->save();

        $mtr = new Role;
        $mtr->name = 'mtr';
        $mtr->display_name = 'Mentor';
        $mtr->description = 'ARTCC Mentor';
        $mtr->role_desc = 'Monitors, assists, and educates student controllers in air traffic control procedures and ARTCC standard operating procedures.';
        $mtr->training_role = 1;
        $mtr->active = 1;
        $mtr->save();
    }
}
