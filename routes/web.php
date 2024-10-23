<?php

use Illuminate\Support\Facades\Route;

// Website
Route::get('/', function () {
    echo "Hello world";
});

// Admin
Route::get('/admin', [\App\Http\Controllers\AdminController::class, "dashboard"])
    ->name("admin.dashboard")
    ->middleware('auth');

Route::get('/admin/logout', [\App\Http\Controllers\AdminController::class, "logout"])
    ->name("admin.logout");

Route::get('/admin/login', [\App\Http\Controllers\AdminController::class, "login"])
    ->name("admin.login");

Route::post('/admin/login', [\App\Http\Controllers\AdminController::class, "authenticate"]);
