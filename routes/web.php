<?php

use Illuminate\Support\Facades\Route;

// Static Pages
Route::view('/', 'welcome');
Route::view('/about', 'about');
Route::view('/contact', 'contact');

// Activity 2 - Email Form
Route::get('/formtest', function () {
    return view('formtest', [
        'emails' => session('emails', [])
    ]);
});

Route::post('/formtest', function () {
    $emails = session('emails', []);

    // 1. Check Capacity
    if (count($emails) >= 5) {
        return back()->with('warning', 'Maximum of 5 emails reached.')->withInput();
    }

    // 2. Validate Format
    request()->validate([
        'email' => 'required|email',
    ]);

    $newEmail = request('email');

    // 3. Check Duplicates
    if (in_array($newEmail, $emails)) {
        return back()->with('error', 'That email is already in the list.')->withInput();
    }

    // 4. Save to Session
    $emails[] = $newEmail;
    session(['emails' => $emails]);

    return back()->with('success', 'Email added successfully!');
});

Route::post('/formtest/delete', function () {
    $emails = session('emails', []);
    $emailToDelete = request('email');

    // Filter out the target email and reset array keys
    $emails = array_values(array_filter($emails, fn($e) => $e !== $emailToDelete));
    
    session(['emails' => $emails]);

    return back()->with('success', 'Email removed.');
});
