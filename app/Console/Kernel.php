<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

use Carbon\Carbon;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\DBUpdatesCron::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $date1 = Carbon::createFromFormat('m/d/Y H:i:s', '12/01/2030 10:20:00');
        $date2 = Carbon::createFromFormat('m/d/Y H:i:s', '12/01/2020 10:20:00');
        //
        if($date1->gt($date2)){
          $schedule->command('DBUpdates:cron')->everyMinute();
        }else{
            return 'Not Update Found';
        }

        // ->hourly();
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
