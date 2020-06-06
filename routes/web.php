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

Route::view('/', 'welcome')->name('home');

Route::get('/blog', 'PostController@index')->name('blog');
Route::get('/stream', 'StreamController@index')->name('stream');

Route::middleware('auth')->group(function () {
    Route::get('/a', 'Admin\DashboardController@index')->name('dashboard');
    Route::get('/a/post/create', 'PostController@create')->name('post.create');
    Route::get('/a/post/{post}/edit', 'PostController@edit')->name('post.edit');
    Route::post('/posts', 'PostController@store')->name('post.store');
    Route::patch('/post/{post}', 'PostController@update')->name('post.update');
});

// Pre Scaffolded Routes
Route::middleware('guest')->group(function () {
    Route::view('login', 'auth.login')->name('login');
});

Route::view('password/reset', 'auth.passwords.email')->name('password.request');
Route::get('password/reset/{token}', 'Auth\PasswordResetController')->name('password.reset');

Route::middleware('auth')->group(function () {
    Route::view('email/verify', 'auth.verify')->middleware('throttle:6,1')->name('verification.notice');
    Route::get('email/verify/{id}/{hash}', 'Auth\EmailVerificationController')->middleware('signed')->name('verification.verify');

    Route::post('logout', 'Auth\LogoutController')->name('logout');

    Route::view('password/confirm', 'auth.passwords.confirm')->name('password.confirm');
});
