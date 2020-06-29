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

Route::view('/', 'pages.about')
    ->name('home');

Route::view('/about', 'pages.about')
    ->name('about');

Route::get('/blog', 'PostController@index')
    ->name('blog');

Route::get('/stream', 'StreamController@index')
    ->name('stream');

Route::group(['prefix' => 'laravel-filemanager'], function () {
     \UniSharp\LaravelFilemanager\Lfm::routes();
 });

Route::middleware('auth')->group(function () {

    Route::get('/a', 'Admin\DashboardController@index')
        ->name('dashboard');

	Route::get('/a/posts', 'Admin\PostController@index')
        ->name('dashboard.post.index');

    Route::get('/a/posts/create', 'Admin\PostController@create')
        ->name('dashboard.post.create');

    Route::post('/a/posts', 'Admin\PostController@store')
        ->name('dashboard.post.store');

    Route::post('/a/images', 'Admin\ImageController@store')
        ->name('dashboard.image.store');

});

// Pre Scaffolded Routes
Route::middleware('guest')->group(function () {

    Route::view('login', 'auth.login')
        ->name('login');

});

Route::view('password/reset', 'auth.passwords.email')
    ->name('password.request');

Route::get('password/reset/{token}', 'Auth\PasswordResetController')
    ->name('password.reset');

Route::middleware('auth')->group(function () {

    Route::view('email/verify', 'auth.verify')
        ->middleware('throttle:6,1')
        ->name('verification.notice');

    Route::get('email/verify/{id}/{hash}', 'Auth\EmailVerificationController')
        ->middleware('signed')
        ->name('verification.verify');

    Route::post('logout', 'Auth\LogoutController')
        ->name('logout');

    Route::view('password/confirm', 'auth.passwords.confirm')
        ->name('password.confirm');

});
