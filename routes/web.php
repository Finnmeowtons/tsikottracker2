<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\Employees;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/companydashboard', function () {
    return view('companydashboard');
})->middleware('auth');

Route::get('/record', function () {
    return view('record');
});

Route::get('/analytics', function () {
    return view('analytics');
});

Route::get('/offers', function () {
    return view('offers');
});


/*
Employee Routes
*/
Route::get('/employees', function () {
    return view('employees');
});
Route::get('/employees', [Employees::class, 'index']); 


Route::get('/loglog', function () {
    return view('login');
});



Route::get('/customers', function () {
    return view('customers');
});


Route::get('/settings', function () {
    return view('settings');
});

Route::get('/settings', [CompanyController::class, 'get']); 

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
