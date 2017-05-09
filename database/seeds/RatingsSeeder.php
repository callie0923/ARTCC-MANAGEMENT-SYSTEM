<?php

use App\Models\Rating;
use Illuminate\Database\Seeder;

class RatingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rating::create([
            'rating_short' => 'OBS',
            'rating_long' => 'Pilot/Observer'
        ]);
        Rating::create([
            'rating_short' => 'S1',
            'rating_long' => 'Student'
        ]);
        Rating::create([
            'rating_short' => 'S2',
            'rating_long' => 'Student 2'
        ]);
        Rating::create([
            'rating_short' => 'S3',
            'rating_long' => 'Senior Student'
        ]);
        Rating::create([
            'rating_short' => 'C1',
            'rating_long' => 'Controller'
        ]);
        Rating::create([
            'rating_short' => 'C2',
            'rating_long' => 'Controller 2'
        ]);
        Rating::create([
            'rating_short' => 'C3',
            'rating_long' => 'Senior Controller'
        ]);
        Rating::create([
            'rating_short' => 'I1',
            'rating_long' => 'Instructor'
        ]);
        Rating::create([
            'rating_short' => 'I2',
            'rating_long' => 'Instructor 2'
        ]);
        Rating::create([
            'rating_short' => 'I3',
            'rating_long' => 'Senior Instructor'
        ]);
        Rating::create([
            'rating_short' => 'SUP',
            'rating_long' => 'Supervisor'
        ]);
        Rating::create([
            'rating_short' => 'ADM',
            'rating_long' => 'Administrator'
        ]);
    }
}
