<?php

use App\Models\Rating;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AirportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::unprepared(file_get_contents(storage_path('sql/airports.sql')));
        DB::unprepared(file_get_contents(storage_path('sql/airports2.sql')));
        DB::unprepared(file_get_contents(storage_path('sql/airports3.sql')));
        DB::unprepared(file_get_contents(storage_path('sql/airports4.sql')));
        DB::unprepared(file_get_contents(storage_path('sql/airports5.sql')));
        DB::unprepared(file_get_contents(storage_path('sql/airports6.sql')));
        DB::unprepared(file_get_contents(storage_path('sql/airports7.sql')));
        DB::unprepared(file_get_contents(storage_path('sql/airports8.sql')));
    }
}
