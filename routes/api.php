<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CustomersApi;
use App\Http\Controllers\EmployeesApi;
use App\Http\Controllers\OffersApi;
use App\Http\Controllers\RecordsApi;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('users', UserController::class);

Route::apiResource('offers', OffersApi::class);

Route::apiResource('records', RecordsApi::class);

Route::apiResource('companies', CompanyController::class);

Route::apiResource('employees', EmployeesApi::class);

Route::apiResource('customers', CustomersApi::class);