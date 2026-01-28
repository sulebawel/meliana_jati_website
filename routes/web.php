<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;





// Homepage
Route::get('/', [HomeController::class, 'index'])->name('home');

// Contact Form Submission
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Newsletter Subscription
Route::post('/newsletter', [ContactController::class, 'newsletter'])->name('newsletter.subscribe');



// Admin - Contacts Management
Route::prefix('admin')->name('admin.')->group(function () {
    
    // List all contacts
    Route::get('/contacts', [ContactController::class, 'index'])
        ->name('contacts.index');
    
    // View single contact
    Route::get('/contacts/{id}', [ContactController::class, 'show'])
        ->name('contacts.show');
    
    // Delete contact
    Route::delete('/contacts/{id}', [ContactController::class, 'destroy'])
        ->name('contacts.destroy');
});


/*
|--------------------------------------------------------------------------
| Fallback Route (404 Handler)
|--------------------------------------------------------------------------
| Route ini akan diakses jika URL tidak ditemukan
*/

Route::fallback(function () {
    return view('errors.404');
});

