<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CustomersApi;
use App\Http\Controllers\EmployeesApi;
use App\Http\Controllers\OffersApi;
use App\Http\Controllers\RecordsApi;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::middleware('auth:sanctum')->get('/user', [UserController::class, 'getAuthenticatedUser']); 

Route::post('/login-retrofit', [AuthenticatedSessionController::class, 'loginRetrofit']);

Route::post('/register-retrofit', [RegisteredUserController::class, 'registerRetrofit']);

Route::post('/forgotpassword-retrofit', [PasswordResetLinkController::class, 'sendPasswordResetLink']);

Route::get('/user/{userId}/companies', [UserController::class, 'getUserCompanies']);


Route::apiResource('offers', OffersApi::class);

Route::apiResource('records', RecordsApi::class);

Route::apiResource('companies', CompanyController::class);

Route::apiResource('employees', EmployeesApi::class);

Route::apiResource('customers', CustomersApi::class);

