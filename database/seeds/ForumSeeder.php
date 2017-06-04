<?php

use App\Forum\Boards;
use App\Forum\Categories;
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

        $announcements_board = new Boards;
        $announcements_board->category_id = $water_cooler_cat->id;
        $announcements_board->name = 'Announcements';
        $announcements_board->description = 'Senior Staff Announcements';
        $announcements_board->order_index = 1;
        $announcements_board->save();

        $public_events_board = new Boards;
        $public_events_board->category_id = $water_cooler_cat->id;
        $public_events_board->name = 'Events';
        $public_events_board->description = 'Events Coordinator Announcements';
        $public_events_board->order_index = 2;
        $public_events_board->save();

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

        $training_board = new Boards;
        $training_board->category_id = $controllers_cat->id;
        $training_board->name = 'Web Services Department';
        $training_board->description = 'Announcements, Support and Services Discussion';
        $training_board->order_index = 4;
        $training_board->save();

        $artcc_discussion_board = new Boards;
        $artcc_discussion_board->category_id = $controllers_cat->id;
        $artcc_discussion_board->name = 'ARTCC Event Discussion';
        $artcc_discussion_board->description = 'Controller Event Discussions';
        $artcc_discussion_board->order_index = 5;
        $artcc_discussion_board->save();

        $training_board = new Boards;
        $training_board->category_id = $controllers_cat->id;
        $training_board->name = 'General Discussion';
        $training_board->description = 'Anything and Everything Goes';
        $training_board->order_index = 6;
        $training_board->save();

        $training_board = new Boards;
        $training_board->category_id = $staff_cat->id;
        $training_board->name = 'Senior Staff';
        $training_board->description = 'Senior Staff Discussion';
        $training_board->order_index = 1;
        $training_board->save();

        $training_board = new Boards;
        $training_board->category_id = $staff_cat->id;
        $training_board->name = 'All Staff';
        $training_board->description = 'Staff Discussion';
        $training_board->order_index = 2;
        $training_board->save();

        $training_board = new Boards;
        $training_board->category_id = $staff_cat->id;
        $training_board->name = 'Training Staff';
        $training_board->description = 'Training Staff Discussion';
        $training_board->order_index = 3;
        $training_board->save();

        $training_board = new Boards;
        $training_board->category_id = $staff_cat->id;
        $training_board->name = 'Events Staff';
        $training_board->description = 'Events Staff Discussion';
        $training_board->order_index = 4;
        $training_board->save();
    }
}
