<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\AddressController;

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

/*
|--------
|Protected Routes
|--------
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->post('logout', [AuthenticatedSessionController::class, 'destroy']);

Route::middleware('auth:sanctum')->post('addresses/create', [AddressController::class, 'store']);

Route::middleware('auth:sanctum')->get('addresses/{user_id}', [AddressController::class, 'fetch']);

Route::middleware('auth:sanctum')->post('addresses/update', [AddressController::class, 'update']);

Route::middleware('auth:sanctum')->post('addresses/delete/{id}', [AddressController::class, 'delete']);

/*
|--------
|Public Routes
|--------
*/

Route::post('register', [RegisteredUserController::class, 'store']);

Route::post('login', [AuthenticatedSessionController::class, 'store']);


