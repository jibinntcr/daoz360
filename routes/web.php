<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ChatController;

/*
|--------------------------------------------------------------------------
| DAOZ360 Web Routes
|--------------------------------------------------------------------------
|
| Compatible with Laravel 10 / 11 / 12. Serves the marketing home page,
| pricing page, legal pages, contact portal, and form / chat endpoints.
| Note: /social/* routes belong to the main DAOZ360 web application.
|
*/

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/home', function () {
    return redirect()->route('home', [], 301);
});

Route::get('/pricing', [PageController::class, 'pricing'])->name('pricing');

Route::get('/privacy-policy', [PageController::class, 'privacyPolicy'])->name('privacy-policy');
Route::get('/privacy', function () {
    return redirect()->route('privacy-policy', [], 301);
});

Route::get('/terms-conditions', [PageController::class, 'termsConditions'])->name('terms-conditions');
Route::get('/terms', function () {
    return redirect()->route('terms-conditions', [], 301);
});

Route::get('/contact', [PageController::class, 'contact'])->name('contact');

// Contact form submission
Route::post('/contact/submit', [ContactController::class, 'submit'])->name('contact.submit');

// Chat assistant API endpoints (also registered in routes/api.php)
Route::prefix('api/chat')->group(function () {
    Route::post('/leads', [ChatController::class, 'createLead'])->name('chat.leads');
    Route::post('/messages', [ChatController::class, 'handleMessage'])->name('chat.messages');
    Route::post('/requests', [ChatController::class, 'submitRequest'])->name('chat.requests');
});

// Helpful 404 fallback page with Home and Contact actions (Section 11F)
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});
