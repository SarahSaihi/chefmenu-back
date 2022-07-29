<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\restaurantController;
use App\Http\Controllers\RestorerController;
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

Route::post('/register', [AuthController::class, 'store']);

Route::middleware('auth:sanctum')->get('/login', [AuthController::class, 'login']);

////////////////////////////////////////////////////////////////

Route::post('/inscription', [RestorerController::class, 'store'])->name('restorers.store');

Route::get('/inscription', [RestorerController::class, 'index'])->name('restorers.index');

// //////////////////////////////////////////////////////////////////////////

Route::post('/restaurant', [restaurantController::class, 'store'])->name('restaurants.store');

Route::get('/restaurant', [restaurantController::class, 'index'])->name('restaurants.index');
Route::get('/restaurant/{id}', [restaurantController::class, 'show'])->name('restaurants.show');
//////////////////////////////////////////////////////////////////////////////
Route::put('/restaurant/{id}', [restaurantController::class, 'update'])->name('restaurants.update');
