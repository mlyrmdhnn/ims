<?php

use App\Http\Controllers\AiController;
use App\Http\Controllers\RequestFromClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/read/notification', [RequestFromClient::class, 'setIsRead']);