<?php

use App\Http\Controllers\ClientRequestController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\RequestFromClient;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WarehousesController;
use App\Models\Notifications;
use Illuminate\Support\Facades\Route;

Route::get('/coba', function() {
    return view('admin-one.dist.index');
});

Route::get('/coba2', function() {
    return view('dashboard.table');
});

Route::get('/', function() {
    return view('landingPage', ['title' => 'IMS']);
});

Route::get('/back-office/login' , [UserController::class, 'page']);
Route::get('/client/login', [UserController::class, 'clientPage']);
Route::get('/client/regist', [UserController::class, 'clientRegistPage']);

Route::post('/regist',[UserController::class, 'clientRegist']);

Route::post('/login/client', [UserController::class]);
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout']);

Route::middleware('auth')->group(function() {
    Route::get('/dashboard', [DashboardController::class, 'show']);
    Route::get('/request', [RequestFromClient::class, 'page']);
    Route::get('/request/rejected', [RequestFromClient::class, 'rejectedPage']);
    Route::get('/request/approved', [RequestFromClient::class, 'approvedPage']);
    Route::get('/request/pending', [RequestFromClient::class, 'pendingPage']);
    Route::post('/request/decision', [RequestFromClient::class, 'requestDecision']);
    Route::get('/request/detail/{uuid}', [RequestFromClient::class, 'detailRequest']);
    Route::get('/transaction', [TransactionController::class, 'page']);
    Route::get('/create/item',[ItemsController::class, 'page']);
    Route::post('/item/create', [ItemsController::class, 'createItem']);
    Route::get('/warehouses',[WarehousesController::class, 'page']);
    Route::post('/warehouse/create', [WarehousesController::class, 'createWarehouse']);
    Route::get('/warehouse/delete/{id}', [WarehousesController::class, 'delete']);
    Route::get('/warehouse/{id}/edit', [WarehousesController::class, 'edit']);
    Route::patch('/warehouse/{id}', [WarehousesController::class, 'update']);
    Route::get('/create/staff', [UserController::class, 'createUserPage']);
    Route::post('/create/staff', [UserController::class, 'createUser']);
    // Route::post('/create/staff' [UserController::class, 'createUser']);
    // client page
    Route::get('/client/dashboard', [DashboardController::class, 'clientDashboard']);
    Route::get('/client/request', function() {
        return view('client.request', ['title' => 'IMS | Request']);
    });
    Route::post('/client/request', [ClientRequestController::class, 'sendRequest']);
    Route::get('/client/history/request', [HistoryController::class, 'clientHistoryRequestPage']);
    Route::get('/client/history/transaction', [HistoryController::class, 'clientHistoryTransactionPage']);
    Route::get('/client/transaction', [TransactionController::class, 'clientTransaction']);
    Route::get('/client/notifications', [NotificationsController::class, 'clientNotifPage']);
    Route::post('/notification/read/{id}', [NotificationsController::class, 'setRead']);
    // Reusable Page
    Route::get('/detail/transaction/{transactionNo}', [TransactionController::class, 'detailTransactionPage']);
});
