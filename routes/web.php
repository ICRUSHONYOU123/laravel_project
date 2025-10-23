<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LicenseController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application.
|--------------------------------------------------------------------------
*/

// 🏠 Home Route
Route::get('/', function () {
    return view('home');
});

// 🧑‍💼 Dashboard & Admin Routes
// Admin profile routes
Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/dashboard', 'showRole')->name('dashboard');
        Route::get('/view-clients', 'viewClients')->name('view.clients');
        Route::post('edit-user/{id}', 'editUser')->name('edit');
        Route::get('delete-user/{id}', 'deleteUser')->name('delete');
        Route::get('/view-admins', 'viewAdmins')->name('view.admins');
    });
});
// 🔑 License Management (Admin)
Route::controller(LicenseController::class)->middleware(['auth', 'verified', 'admin'])->group(function () {
        Route::get('/active-keys', 'activeKeys')->name('active.keys');
        Route::get('/delete-key/{id}', 'deleteKey')->name('deleteKey');
        Route::get('/KeylicenseMethod', 'KeyMethod')->name('license.Method');
        Route::post('/generateAdmin-key', 'generateMethod')->name('generateAdmin');
        Route::get('/getKeys/{key}', 'showAdmin')->name('getKeylicenseAdmin');
    });

// 👤 Authenticated User Routes
Route::middleware('auth')->group(function () {
    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Payment / Buy Now
    Route::get('/payment-method', [ProfileController::class, 'showPayment'])->name('buynow');
    // License Key (User)
    Route::post('/generate-key', [LicenseController::class, 'generate'])->name('generateKey');
    Route::get('/getKey/{key}', [LicenseController::class, 'show'])->name('getKeylicense');
});
// 🔐 Authentication Routes
require __DIR__ . '/auth.php';
