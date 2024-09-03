<?php

namespace App\Console;

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
        'App\Console\Commands\SyncFromPartsDB',
        'App\Console\Commands\SyncFromSage',
        'App\Console\Commands\SyncProductPrices',
        'App\Console\Commands\SyncCSVProductPrices',
        'App\Console\Commands\SyncProductQuantity',
        'App\Console\Commands\SyncCSVProductQuantity'
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('sync:partsdb')->daily()->evenInMaintenanceMode()->withoutOverlapping();
        //$schedule->command('sync:sageapi')->daily()->evenInMaintenanceMode()->withoutOverlapping();
        // $schedule->command('sync:product:prices')->daily()->evenInMaintenanceMode()->withoutOverlapping();
        // $schedule->command('sync:product:qty')->daily()->evenInMaintenanceMode()->withoutOverlapping();

        $schedule->command('sync:csvproduct:prices')->dailyAt('11:15')->evenInMaintenanceMode()->withoutOverlapping()->runInBackground();
        $schedule->command('sync:csvproduct:qty')->hourly()->evenInMaintenanceMode()->withoutOverlapping()->runInBackground();
        // $schedule->command('sync:csvproduct:qty')->everyTwoHours()->evenInMaintenanceMode()->withoutOverlapping()->runInBackground();
        //$schedule->command('sync:csvproduct:qty')->dailyAt('21:00')->evenInMaintenanceMode()->withoutOverlapping()->runInBackground();

        // $schedule->command('sync:csvproduct:prices')->dailyAt('22:15')->evenInMaintenanceMode()->withoutOverlapping();
        // $schedule->command('sync:csvproduct:qty')->dailyAt('22:15')->evenInMaintenanceMode()->withoutOverlapping();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
