<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CvTemplateController;
use App\Http\Controllers\PageController;


/*
|--------------------------------------------------------------------------
| FutureEngineers.pk Routes
|--------------------------------------------------------------------------
*/


// Home
Route::get('/', [HomeController::class, 'index'])
    ->name('home');


// Jobs & Internships
Route::get('/jobs-internships', [ListingController::class, 'jobs'])
    ->name('jobs');

Route::get('/jobs-internships/{id}', [ListingController::class, 'show'])
    ->name('jobs.show');


// Scholarships
Route::get('/scholarships', [ListingController::class, 'scholarships'])
    ->name('scholarships');

Route::get('/scholarships/{id}', [ListingController::class, 'showScholarship'])
    ->name('scholarships.show');


// Courses & Certifications
Route::get('/courses-certifications', [ListingController::class, 'courses'])
    ->name('courses');

Route::get('/courses-certifications/{id}', [ListingController::class, 'showCourse'])
    ->name('courses.show');


// Industry News
Route::get('/industry-news', [ArticleController::class, 'index'])
    ->name('articles.index');

// Individual article
Route::get('/industry-news/{id}', [ArticleController::class, 'show'])
    ->name('articles.show');


// CV Templates
Route::get('/cv-templates', [CvTemplateController::class, 'index'])
    ->name('cv-templates.index');

// Individual CV template
Route::get('/cv-templates/{id}', [CvTemplateController::class, 'show'])
    ->name('cv-templates.show');


// About
Route::get('/about', [PageController::class, 'about'])
    ->name('about');


// Contact
Route::get('/contact', [PageController::class, 'contact'])
    ->name('contact');

Route::post('/contact', [PageController::class, 'contactStore'])
    ->name('contact.store');


// Terms & Privacy
Route::get('/terms', [PageController::class, 'terms'])
    ->name('terms');

Route::get('/privacy', [PageController::class, 'privacy'])
    ->name('privacy');
require __DIR__.'/admin.php';