<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
});

Route::post('/login', function () {

    // Retrieve the input data from the request
    $email = request('email');
    $password = request('password');

    // Perform the login logic here
    if (Auth::attempt(['document_number' => $email, 'password' => $password])) {
        return redirect('/pulse');
    } else {
        // Login failed, redirect back to /login with an error message
        return redirect('/login')->with('error', 'Invalid credentials');
    }
});
