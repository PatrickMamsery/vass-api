<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('pages.dashboard');
    });

    Route::get('/dashboard', function () {
        return view('pages.dashboard');
    })->name('dashboard');

    Route::get('/centres', function () {
        return view('pages.centres');
    })->name('centres');

    Route::get('/logs', function () {
        return view('pages.logs');
    })->name('logs');

    Route::get('/under-construction', function () {
        return view('pages.under_construction');
    })->name('under-construction');
});


require __DIR__.'/auth.php';
