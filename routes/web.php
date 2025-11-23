<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/' , [UserController::class, 'page']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout']);
// Route::get('/dashboard')
Route::middleware('auth')->group(function() {
    Route::get('/dashboard', [DashboardController::class, 'show']);
});
