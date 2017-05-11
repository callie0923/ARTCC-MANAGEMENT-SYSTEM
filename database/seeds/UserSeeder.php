<?php

use App\Models\Rating;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'id' => 1240411,
            'first_name' => 'Matt',
            'last_name' => 'Bozwood-Davies',
            'email' => 'mbozwooddavies@zjxartcc.org',
            'rating_id' => 8,
            'visitor' => 0,
            'status' => 0,
        ]);
    }
}
