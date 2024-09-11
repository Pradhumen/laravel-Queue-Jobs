<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailJob;
use App\Models\User;
use Illuminate\Http\Request;

class NewslatterController extends Controller
{
    public function create()
    {
        return view('newsletter.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'to' => 'required|email',
            'subject' => 'required|string|max:255',
            'body' => 'required|string'
        ]);

        
        User::create([
            'admin' => 'admin', 
            'to' => $request->input('to'),
            'subject' => $request->input('subject'),
            'body' => $request->input('body'),
        ]);

            
            $details = [
                'to' => $request->input('to'),
                'subject' => $request->input('subject'),
                'body' => $request->input('body'),
            ];
            
            
            SendEmailJob::dispatch($details);

        return redirect()->route('newsletter.create')->with('success', 'Newsletter saved successfully.');
    }
}
