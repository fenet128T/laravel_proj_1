<?php
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\CartController;

use App\Http\Controllers\User\DashboardController;

use Illuminate\Support\Facades\Route;


use Inertia\Inertia;


Route::get('/', function () {
  return Inertia::render('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// user routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/', function () {
    return view('welcome');
});

// admin routes
   Route::prefix('checkout')->controller(CheckoutController::class)->group((function()  {
        Route::post('order','store')->name('checkout.store');
        Route::get('success','success')->name('checkout.success');
        Route::get('cancel','cancel')->name('checkout.cancel');
    }));

  Route::group(['prefix' => 'admin', 'middleware' => 'redirectAdmin'], function () {
    Route::get('login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [AdminAuthController::class, 'login'])->name('admin.login.post');
    Route::post('logout', [AdminAuthController::class, 'logout'])->name('logout');
});


Route::group(['middleware' => [\App\Http\Middleware\AdminMiddleware::class]], function () {
    // Admin-only routes here

    Route::get('/admin/dashboard', 'AdminController@dashboard');



});

// end


  // end
