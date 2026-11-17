<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ContactController;

/*
|--------------------------------------------------------------------------
| DAOZ360 API Routes
|--------------------------------------------------------------------------
*/

Route::post('/chat/leads', [ChatController::class, 'createLead']);
Route::post('/chat/messages', [ChatController::class, 'handleMessage']);
Route::post('/chat/requests', [ChatController::class, 'submitRequest']);
Route::post('/contact', [ContactController::class, 'submit']);
