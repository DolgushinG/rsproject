<?php

namespace App\Console;
use App\Console\Commands\SendInfo;
use App\Console\Commands\SendMail;
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
        SendMail::class,
        SendInfo::class,
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
        $schedule->exec("php artisan backup:clean")->weeklyOn(1, '00:00');
        $schedule->exec("php artisan backup:run --only-db")->weeklyOn(1, '00:00');
//        // Backups (to Google Drive)
        $schedule->command('sendMail')->weeklyOn(1, '10:00');
        $schedule->command('searchEvent')->dailyAt('22:00');
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
