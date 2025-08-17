<?php
use Illuminate\Support\Facades\Route;
use App\Models\Listing;

//all listing
Route::get('/listings', function () {
    return view('listings', [
        'heading' => 'Latest Job listings',
        'listings' => Listing::all()
    ]);
});

//single listing
Route::get('/listings/{id}', function ($id) {
    return view('listing', [
        'heading' => 'Job listing',
        'listing' => Listing::find($id)
    ]);
});
