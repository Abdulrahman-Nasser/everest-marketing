<?php

use App\Http\Controllers\Contacts\contactController;
use App\Http\Controllers\Home\homeController;
use App\Http\Controllers\Reviews\reviewsController;
use App\Http\Controllers\Services\servicesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::controller(homeController::class)->group(function(){
//     Route::get('home','index');
// });

Route::controller(homeController::class)->group(function () {
    Route::get('/home', 'index');
    Route::post('/home', 'store');
});

Route::get('/review', [reviewsController::class, 'index']);

Route::controller(servicesController::class)->group(function () {
    Route::get('/services', 'index');
    Route::post('/services', 'store');
});

Route::controller(contactController::class)->group(function () {
    Route::get('/contact', 'index');
    Route::post('/contact', 'store');
});
