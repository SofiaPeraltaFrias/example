<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
    return view('home');
});

Route::get('/contact', function () {
    return view('contact');
});


// JOBS
// Index
Route::get('/jobs', function () {
    $jobs = Job::with('employer')->latest()->paginate(4);
    return view('jobs.index', ['jobs' => $jobs]);
});

// Create
Route::get('/jobs/create', function () {
    return view('jobs.create');
});

// Show
Route::get('/jobs/{job}', function (Job $job) {
    return view('jobs.show', ['job' => $job]);
});

// Store
Route::post('/jobs', function () {
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required']
    ]);


    \App\Models\Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1  
    ]);

    return redirect('/jobs');
});

// Edit
Route::get('/jobs/{job}/edit', function (Job $job) {
    return view('jobs.edit', ['job' => $job]);
});

// Update
Route::patch('/jobs/{job}', function (Job $job) {
    
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
});

// Destroy
Route::delete('/jobs/{job}', function (Job $job) {
    // Authorize (TODO)

    // Delete
    $job->delete();

    // Redirect
    return redirect('/jobs');
});



