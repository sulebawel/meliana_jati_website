<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;





// Homepage
Route::get('/', [HomeController::class, 'index'])->name('home');

// Static pages
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/services', [HomeController::class, 'services'])->name('services');
Route::get('/portfolio', [HomeController::class, 'portfolio'])->name('portfolio');
// Portfolio item detail
Route::get('/portfolio/{id}', [HomeController::class, 'showPortfolio'])->name('portfolio.show');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

// Authentication
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin dashboard (simple role check)
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

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

    // Portfolio Management
    Route::get('/portfolio', [AdminController::class, 'portfolioIndex'])
        ->name('portfolio');

    // Newsletter Management (menampilkan semua subscriber)
    Route::get('/newsletter', [AdminController::class, 'newsletterIndex'])
        ->name('newsletter');
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

