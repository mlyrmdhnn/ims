<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/coba', function() {
    return view('admin-one.dist.index');
});

Route::get('/coba2', function() {
    return view('dashboard.table');
});

Route::get('/' , [UserController::class, 'page']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout    ', [UserController::class, 'logout']);
// Route::get('/dashboard')
Route::middleware('auth')->group(function() {
    Route::get('/dashboard', [DashboardController::class, 'show']);
});
