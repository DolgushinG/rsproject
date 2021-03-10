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

Route::get('/', function () {
    return view('home');
});
Route::get('/about', [App\Http\Controllers\HomeController::class, 'indexAbout'])->name('about');
Route::get('/blog', [App\Http\Controllers\HomeController::class, 'indexBlog'])->name('blog');
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'indexContact'])->name('contact');
Route::get('/routesetters', [App\Http\Controllers\SearchController::class, 'index'])->name('routesetters');
Route::post('/getresultsearch', [App\Http\Controllers\SearchController::class, 'getResultSearch'])->name('getresultsearch');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'indexCategory'])->name('register');
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
Route::get('/profile/{id}', [App\Http\Controllers\ProfileController::class, 'indexPublic'])->name('profileDetails');
