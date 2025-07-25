<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::get('/', function () {
  return Inertia::render('dashboard');
});
// user routes


Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => [\App\Http\Middleware\AdminMiddleware::class]], function () {
    // Admin-only routes here
    Route::get('/admin/dashboard', 'AdminController@dashboard');
});

// end


// end
