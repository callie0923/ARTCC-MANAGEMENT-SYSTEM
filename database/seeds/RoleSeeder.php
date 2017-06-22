<?php

use App\Models\Entrust\Permission;
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
        $ata->role_desc = 'The Assistant Training Administrator is appointed by the Training Administrator and approved by the ATM/DATM. The Assistant Training Administrator assists the Training Administrator in development and execution of training programmes, selection of Instructors and Mentors and other tasks as directed.';
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
        $awm->role_desc = 'The Assistant Webmaster is appointed by the Webmaster and approved by the ATM/DATM. The Assistant Webmaster assists the Webmaster in development and management of IT services.';
        $awm->training_role = 0;
        $awm->active = 1;
        $awm->save();

        $ins = new Role;
        $ins->name = 'ins';
        $ins->display_name = 'Instructor';
        $ins->description = 'ARTCC Instructor';
        $ins->role_desc = 'Appointed by the TA, Instructors administer and assess position certification practical exams, rating-promotion practical exams. Assigns written tests to students.';
        $ins->training_role = 1;
        $ins->active = 1;
        $ins->save();

        $mtr = new Role;
        $mtr->name = 'mtr';
        $mtr->display_name = 'Mentor';
        $mtr->description = 'ARTCC Mentor';
        $mtr->role_desc = 'Appointed by the TA, Mentors monitor, assist, and educate student controllers in air traffic control procedures and ARTCC standard operating procedures.';
        $mtr->training_role = 1;
        $mtr->active = 1;
        $mtr->save();


        // snr_staff_perm
        $snr_staff_perm = new Permission;
        $snr_staff_perm->name = 'snr_staff';
        $snr_staff_perm->display_name = 'Senior Staff';
        $snr_staff_perm->description = 'Senior Staff Permission';
        $snr_staff_perm->save();
        $atm->attachPermission($snr_staff_perm);
        $datm->attachPermission($snr_staff_perm);
        $ta->attachPermission($snr_staff_perm);

        // staff_perm
        $staff_perm = new Permission;
        $staff_perm->name = 'staff';
        $staff_perm->display_name = 'Staff';
        $staff_perm->description = 'Staff Permission';
        $staff_perm->save();
        $atm->attachPermission($staff_perm);
        $datm->attachPermission($staff_perm);
        $ta->attachPermission($staff_perm);
        $ec->attachPermission($staff_perm);
        $fe->attachPermission($staff_perm);
        $wm->attachPermission($staff_perm);
        $awm->attachPermission($staff_perm);
        $ata->attachPermission($staff_perm);
        $aec->attachPermission($staff_perm);

        // roster_perm
        $roster_perm = new Permission;
        $roster_perm->name = 'roster';
        $roster_perm->display_name = 'Roster Management';
        $roster_perm->description = 'Roster Management Permission';
        $roster_perm->save();
        $atm->attachPermission($roster_perm);
        $datm->attachPermission($roster_perm);
        $ta->attachPermission($roster_perm);
        $ata->attachPermission($roster_perm);
        $ins->attachPermission($roster_perm);
        $mtr->attachPermission($roster_perm);


        // events_perm
        $events_perm = new Permission;
        $events_perm->name = 'events';
        $events_perm->display_name = 'Events Management';
        $events_perm->description = 'Events Management Permission';
        $events_perm->save();
        $atm->attachPermission($events_perm);
        $datm->attachPermission($events_perm);
        $ec->attachPermission($events_perm);
        $aec->attachPermission($events_perm);

        // documents_perm
        $documents_perm = new Permission;
        $documents_perm->name = 'documents';
        $documents_perm->display_name = 'Documents Management';
        $documents_perm->description = 'Documents Management Permission';
        $documents_perm->save();
        $atm->attachPermission($documents_perm);
        $datm->attachPermission($documents_perm);
        $ta->attachPermission($documents_perm);
        $fe->attachPermission($documents_perm);

        // ins_perm
        $ins_perm = new Permission;
        $ins_perm->name = 'instruct';
        $ins_perm->display_name = 'Instruct';
        $ins_perm->description = 'Instructor Permission';
        $ins_perm->save();
        $ins->attachPermission($ins_perm);
        $ata->attachPermission($ins_perm);
        $ta->attachPermission($ins_perm);
        $datm->attachPermission($ins_perm);
        $atm->attachPermission($ins_perm);

        // mtr_perm
        $mtr_perm = new Permission;
        $mtr_perm->name = 'mentor';
        $mtr_perm->display_name = 'Mentor';
        $mtr_perm->description = 'Mentor Permission';
        $mtr_perm->save();
        $ins->attachPermission($mtr_perm);
        $mtr->attachPermission($mtr_perm);
        $ata->attachPermission($mtr_perm);
        $ta->attachPermission($mtr_perm);
        $datm->attachPermission($mtr_perm);
        $atm->attachPermission($mtr_perm);
    }
}
