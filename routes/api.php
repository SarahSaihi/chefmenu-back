<?php

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

Route::post('/inscription', [RestorerController::class, 'store'])->name('restorers.store');

Route::get('/inscription', [RestorerController::class, 'index'])->name('restorers.index');
