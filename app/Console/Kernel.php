<?php

namespace App\Console;
use Illuminate\Support\Facades\Artisan;
use App\Models\User;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Spatie\Backup\Commands\BackupCommand;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        \Spatie\Backup\Commands\BackupCommand::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $user = User::whereNull('email_verified_at')->get();
            if (count($user) > 0) {
                User::whereNull('email_verified_at')->delete();
            }
        })->weekly();
        $schedule->exec("php artisan backup:clean")->dailyAt('01:30');
        $schedule->exec("php artisan backup:run --only-db")->dailyAt('01:30');
//        // Backups (to Google Drive)
//        $schedule->command('backup:clean')->dailyAt('01:30')->withoutOverlapping();
//        $schedule->command('backup:run --only-db')->dailyAt('01:35')->withoutOverlapping();

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
