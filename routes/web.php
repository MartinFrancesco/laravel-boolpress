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

// HOME

Route::get('/', 'HomeController@index')->name('home');

// ROTTE PER LOGIN / REGISTRAZIONE

Auth::routes();

// ROTTE PAGINE UTENTI LOGGATI
// Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')
    ->namespace('Admin')
    ->name('admin.')
    ->middleware('auth')
    ->group(function() {
        // Home Admin
        Route::get('/', 'HomeController@index')->name('home');

        // Rotte Post CRUD
        Route::resource('post', 'PostController');
    });