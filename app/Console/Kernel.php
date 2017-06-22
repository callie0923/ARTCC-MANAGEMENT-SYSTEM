<?php

namespace App\Console;

use App\Console\Commands\BuildInitialRoster;
use App\Console\Commands\GetAirportWeather;
use App\Console\Commands\InitialSetup;
use App\Console\Commands\ProcessRoster;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        InitialSetup::class,
        GetAirportWeather::class,
        BuildInitialRoster::class,
        ProcessRoster::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('artcc:weather')->everyThirtyMinutes();
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
