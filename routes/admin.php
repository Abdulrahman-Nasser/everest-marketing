<?php

use App\Http\Controllers\admin\adminHomeController;
use App\Http\Controllers\admin\homeAddData as AdminHomeAddData;
use App\Http\Controllers\adminAuthController;
use App\Http\Controllers\AdminController\homeAddData;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
Route::middleware('guest:admin')->group(function () {
    Route::get('/login', [adminAuthController::class, 'index'])->name('admin.getLogin');
    Route::post('/login', [adminAuthController::class, 'login'])->name('admin.login');
});

Route::middleware('auth:admin')->group(function () {
    Route::controller(adminHomeController::class)->group(function () {
        Route::get("/home", "index")->name("admin.home");
        Route::get("/showAdd", "showAdd")->name("admin.addHome");
        Route::post("/home","store")->name("home.store");

    });

});





