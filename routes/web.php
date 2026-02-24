<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UnitController;
use Illuminate\Support\Facades\Route;

// Homepage
Route::get('/', [HomeController::class, 'index'])->name('home');

// Units
Route::get('/units', [UnitController::class, 'index'])->name('units.index');
Route::get('/units/{slug}', [UnitController::class, 'show'])->name('units.show');

// Articles
Route::get('/lifestyle', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/lifestyle/{slug}', [ArticleController::class, 'show'])->name('articles.show');

// Static Pages
Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');
