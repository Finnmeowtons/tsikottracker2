<?php

use App\Http\Controllers\CustomersApi;
use App\Http\Controllers\EmployeesApi;
use App\Http\Controllers\OffersApi;
use App\Http\Controllers\RecordsApi;
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
Route::apiResource('offers', OffersApi::class);

Route::apiResource('records', RecordsApi::class);

Route::apiResource('companies', CompanyController::class);

Route::apiResource('employees', EmployeesApi::class);

Route::apiResource('customers', CustomersApi::class);

