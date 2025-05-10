<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

// Admin redirect route
Route::get('/admin', function () {
    return redirect('/admin/login');
});

// Public website routes using PageController
Route::controller(PageController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/about', 'about')->name('about');
    Route::get('/pricing', 'pricing')->name('pricing');
    Route::get('/blog', 'blog')->name('blog');
    Route::get('/blog/{slug}', 'blogDetail')->name('blog.details');
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/dokumentacioni', 'dokumentacioni')->name('dokumentacioni');
    Route::get('/login', 'login')->name('login');
    Route::get('/register', 'register')->name('register');

    // Additional resource pages
    Route::get('/features', 'features')->name('features');
    Route::get('/testimonial', 'testimonial')->name('testimonial');
    Route::get('/how-it-works', 'howItWorks')->name('how-it-works');
    Route::get('/privacy', 'privacy')->name('privacy');
    Route::get('/terms', 'terms')->name('terms');
    Route::get('/refund', 'refund')->name('refund');
    Route::get('/support', 'support')->name('support');
    Route::get('/xml-tools', 'xmlTools')->name('xml-tools');
});
