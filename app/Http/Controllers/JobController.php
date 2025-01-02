<?php

namespace App\Http\Controllers;

use App\Mail\JobPosted;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class JobController extends Controller
{
    public function index() {
        $jobs = Job::with('employer')->latest()->paginate(4);
        return view('jobs.index', ['jobs' => $jobs]);
    }

    public function create() {
        if(Auth::guest()) {
            return redirect('/login');
        }    
        return view('jobs.create');
    }

    public function show(Job $job) {
        return view('jobs.show', ['job' => $job]);
    }

    public function store() {
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required']
        ]);
    
    
        $job = \App\Models\Job::create([
            'title' => request('title'),
            'salary' => request('salary'),
            'employer_id' => 1
        ]);

        Mail::to($job->employer->user)->send(
            new JobPosted($job)
        );
    
        return redirect('/jobs');    
    }
    
    public function edit(Job $job) {
        return view('jobs.edit', ['job' => $job]);
    }

    public function update(Job $job) {
        // Authorize (TODO)

        // Validate
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required']
        ]);


        // Update
        $job->update([
            'title' => request('title'),
            'salary' => request('salary')
        ]);

        // Redirect
        return redirect('/jobs/' . $job->id);        
    }

    public function destroy(Job $job) {
        // Authorize (TODO)

        // Delete
        $job->delete();

        // Redirect
        return redirect('/jobs');    
    }
}
