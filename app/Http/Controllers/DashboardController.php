<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailJob;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Artisan;

class DashboardController extends Controller
{
    public function index()
    {
        // Retrieve jobs from the database or cache (for simplicity, using User model here)
        $jobs = User::all(); // or filter by status if needed

        return view('dashboard.index', compact('jobs'));
    }

    public function startJobs(Request $request)
    {
        $jobIds = $request->input('job_ids', []);

        foreach ($jobIds as $id) {
            // Assuming that your `SendEmailJob` can be dispatched using some identifier
            $job = User::find($id);
            if ($job) {
                $details = [
                    'to' => $job->to,
                    'subject' => $job->subject,
                    'body' => $job->body,
                ];

                // Dispatch the job with the current timestamp to execute immediately
                SendEmailJob::dispatch($details);
                
                // Optionally update the job status in the database
                $job->update(['status' => 'dispatched']);
            }
        }

        return redirect()->route('dashboard.index')->with('success', 'Selected jobs started successfully.');
    }
}
