<?php 
namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Jobs\SendEmailJob;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $details = [
                'to' => 'test@example.com',
                'subject' => 'Scheduled Email',
                'body' => 'This is an email sent every 5 minutes.'
            ];

            
            SendEmailJob::dispatch($details);
        })->everyOneMinutes();  
    }


    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
