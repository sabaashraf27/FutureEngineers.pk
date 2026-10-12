<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ListingController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CvTemplateController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\ContactMessageController;

/*
|--------------------------------------------------------------------------
| Admin Panel Routes
|--------------------------------------------------------------------------
| Everything here lives under /admin. Login is unauthenticated; everything
| else requires the 'admin' middleware (see app/Http/Middleware/EnsureUserIsAdmin.php).
*/

Route::prefix('admin')->name('admin.')->group(function () {

    // Login (no auth required)
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.attempt');

    Route::middleware('admin')->group(function () {
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        // Listings: jobs & internships / scholarships / courses, one controller
        Route::get('/listings/{section}', [ListingController::class, 'index'])->name('listings.index');
        Route::get('/listings/{section}/create', [ListingController::class, 'create'])->name('listings.create');
        Route::post('/listings/{section}', [ListingController::class, 'store'])->name('listings.store');
        Route::get('/listings/{section}/{listing}/edit', [ListingController::class, 'edit'])->name('listings.edit');
        Route::put('/listings/{section}/{listing}', [ListingController::class, 'update'])->name('listings.update');
        Route::delete('/listings/{section}/{listing}', [ListingController::class, 'destroy'])->name('listings.destroy');

        // Categories (shared dropdown data for listings)
        Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
        Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
        Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
        Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

        // CV Templates
        Route::resource('cv-templates', CvTemplateController::class)
            ->except(['show'])
            ->parameters(['cv-templates' => 'cvTemplate']);

        // Industry News articles
        Route::resource('articles', ArticleController::class)
            ->except(['show'])
            ->names('articles');

        // Contact form submissions (read-only + delete)
        Route::get('/contact-messages', [ContactMessageController::class, 'index'])->name('contact-messages.index');
        Route::get('/contact-messages/{contactMessage}', [ContactMessageController::class, 'show'])->name('contact-messages.show');
        Route::delete('/contact-messages/{contactMessage}', [ContactMessageController::class, 'destroy'])->name('contact-messages.destroy');
    });
});
