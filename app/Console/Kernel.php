<?php 
namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Jobs\SendEmailJob;
use Illuminate\Support\Facades\Cache;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            // Check the last job completion time
            $lastJobTime = Cache::get('last_job_time', now()->subMinutes(5));
            $nextJobTime = $lastJobTime->addMinutes(5);

            if (now()->greaterThanOrEqualTo($nextJobTime)) {
                $details = [
                    'to' => 'test@example.com',
                    'subject' => 'Scheduled Email',
                    'body' => 'This is an email sent every 5 minutes.'
                ];

                // Dispatch the job
                SendEmailJob::dispatch($details);

                // Update the last job time
                Cache::put('last_job_time', now(), now()->addMinutes(5));
            }
        })->everyMinute(); // Run every minute to check and dispatch jobs
    }

    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
