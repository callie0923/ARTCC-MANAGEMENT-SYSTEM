<?php

use App\Forum\BoardPostPermissions;
use App\Forum\Boards;
use App\Forum\BoardViewPermissions;
use App\Forum\Categories;
use App\Forum\CategoryViewPermissions;
use Illuminate\Database\Seeder;

class ForumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $water_cooler_cat = new Categories;
        $water_cooler_cat->name = 'Water Cooler';
        $water_cooler_cat->order_index = 1;
        $water_cooler_cat->icon = 'flask';
        $water_cooler_cat->need_auth = 0;
        $water_cooler_cat->save();

        $controllers_cat = new Categories;
        $controllers_cat->name = 'ARTCC Controllers';
        $controllers_cat->order_index = 2;
        $controllers_cat->icon = 'users';
        $controllers_cat->need_auth = 1;
        $controllers_cat->save();

        $staff_cat = new Categories;
        $staff_cat->name = 'Staff';
        $staff_cat->order_index = 3;
        $staff_cat->icon = 'lock';
        $staff_cat->need_auth = 1;
        $staff_cat->save();

        foreach(['atm','datm','ta','ec','fe','wm','awm','ata','aec','ins','mtr'] as $role) {
            CategoryViewPermissions::create([
                'category_id' => $staff_cat->id,
                'role' => $role
            ]);
        }

        $announcements_board = new Boards;
        $announcements_board->category_id = $water_cooler_cat->id;
        $announcements_board->name = 'Announcements';
        $announcements_board->description = 'Senior Staff Announcements';
        $announcements_board->order_index = 1;
        $announcements_board->save();

        foreach(['atm','datm','ta'] as $role) {
            BoardPostPermissions::create([
                'board_id' => $announcements_board->id,
                'role' => $role
            ]);
        }

        $public_events_board = new Boards;
        $public_events_board->category_id = $water_cooler_cat->id;
        $public_events_board->name = 'Events';
        $public_events_board->description = 'Events Coordinator Announcements';
        $public_events_board->order_index = 2;
        $public_events_board->save();

        foreach(['atm','datm','ec','aec'] as $role) {
            BoardPostPermissions::create([
                'board_id' => $public_events_board->id,
                'role' => $role
            ]);
        }

        $artcc_discussion_board = new Boards;
        $artcc_discussion_board->category_id = $controllers_cat->id;
        $artcc_discussion_board->name = 'ARTCC Discussion';
        $artcc_discussion_board->description = 'Any Discussion about the ARTCC';
        $artcc_discussion_board->order_index = 1;
        $artcc_discussion_board->save();

        $training_board = new Boards;
        $training_board->category_id = $controllers_cat->id;
        $training_board->name = 'Training Discussion';
        $training_board->description = 'Any Discussion about Training';
        $training_board->order_index = 2;
        $training_board->save();

        $artcc_discussion_board = new Boards;
        $artcc_discussion_board->category_id = $controllers_cat->id;
        $artcc_discussion_board->name = 'Facility Department';
        $artcc_discussion_board->description = 'News and Discussions Related to Facility Files';
        $artcc_discussion_board->order_index = 3;
        $artcc_discussion_board->save();

        $web_services_board = new Boards;
        $web_services_board->category_id = $controllers_cat->id;
        $web_services_board->name = 'Web Services Department';
        $web_services_board->description = 'Announcements, Support and Services Discussion';
        $web_services_board->order_index = 4;
        $web_services_board->save();

        $artcc_event_discussion_board = new Boards;
        $artcc_event_discussion_board->category_id = $controllers_cat->id;
        $artcc_event_discussion_board->name = 'ARTCC Event Discussion';
        $artcc_event_discussion_board->description = 'Controller Event Discussions';
        $artcc_event_discussion_board->order_index = 5;
        $artcc_event_discussion_board->save();

        $general_discussion_board = new Boards;
        $general_discussion_board->category_id = $controllers_cat->id;
        $general_discussion_board->name = 'General Discussion';
        $general_discussion_board->description = 'Anything and Everything Goes';
        $general_discussion_board->order_index = 6;
        $general_discussion_board->save();

        $senior_staff_board = new Boards;
        $senior_staff_board->category_id = $staff_cat->id;
        $senior_staff_board->name = 'Senior Staff';
        $senior_staff_board->description = 'Senior Staff Discussion';
        $senior_staff_board->order_index = 1;
        $senior_staff_board->save();

        foreach(['atm','datm','ta'] as $role) {
            BoardViewPermissions::create([
                'board_id' => $senior_staff_board->id,
                'role' => $role
            ]);
        }

        foreach(['atm','datm','ta'] as $role) {
            BoardPostPermissions::create([
                'board_id' => $senior_staff_board->id,
                'role' => $role
            ]);
        }

        $all_staff_board = new Boards;
        $all_staff_board->category_id = $staff_cat->id;
        $all_staff_board->name = 'All Staff';
        $all_staff_board->description = 'Staff Discussion';
        $all_staff_board->order_index = 2;
        $all_staff_board->save();

        foreach(['atm','datm','ta','ec','fe','wm','awm','ata','aec'] as $role) {
            BoardViewPermissions::create([
                'board_id' => $all_staff_board->id,
                'role' => $role
            ]);
        }

        foreach(['atm','datm','ta','ec','fe','wm','awm','ata','aec'] as $role) {
            BoardPostPermissions::create([
                'board_id' => $all_staff_board->id,
                'role' => $role
            ]);
        }

        $training_staff_board = new Boards;
        $training_staff_board->category_id = $staff_cat->id;
        $training_staff_board->name = 'Training Staff';
        $training_staff_board->description = 'Training Staff Discussion';
        $training_staff_board->order_index = 3;
        $training_staff_board->save();

        foreach(['atm','datm','ta','ata','ins','mtr'] as $role) {
            BoardViewPermissions::create([
                'board_id' => $training_staff_board->id,
                'role' => $role
            ]);
        }

        foreach(['atm','datm','ta','ata','ins','mtr'] as $role) {
            BoardPostPermissions::create([
                'board_id' => $training_staff_board->id,
                'role' => $role
            ]);
        }

        $events_staff_board = new Boards;
        $events_staff_board->category_id = $staff_cat->id;
        $events_staff_board->name = 'Events Staff';
        $events_staff_board->description = 'Events Staff Discussion';
        $events_staff_board->order_index = 4;
        $events_staff_board->save();

        foreach(['atm','datm','ec','aec'] as $role) {
            BoardViewPermissions::create([
                'board_id' => $events_staff_board->id,
                'role' => $role
            ]);
        }

        foreach(['atm','datm','ec','aec'] as $role) {
            BoardPostPermissions::create([
                'board_id' => $events_staff_board->id,
                'role' => $role
            ]);
        }
    }
}
