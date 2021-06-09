<?php

namespace App\Console;

use App\Models\User;
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
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('inspire')->hourly();
        $user = User::whereNull('email_verified_at')->get();
        if(count($user) > 0){
            $schedule->call(function () {
                User::whereNull('email_verified_at')->delete();
            })->weekly();
        }
        // Backups (to Google Drive)
        $schedule->command('backup:clean')->dailyAt('01:30');
        $schedule->command('backup:run --only-db')->dailyAt('01:35');

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
