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
        Commands\SendMailMagazine::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('email:sendmailmagazine')
                 ->dailyAt('13:00');
        $schedule
        ->command('batch:start_application')
        ->withoutOverlapping()
        ->dailyAt('00:00');

        $schedule
        ->command('batch:finish_application')
        ->withoutOverlapping()
        ->dailyAt('00:00');

        $schedule
        ->command('batch:finish_capacity')
        ->withoutOverlapping()
        ->dailyAt('14:00');

        $schedule
        ->command('batch:gather_application')
        ->withoutOverlapping()
        ->dailyAt('00:00');

        //$schedule->call(function () {
            //DB::table('recent_users')->delete();
        //})->dailyAt('00:00');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
