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

Route::get('/about', [App\Http\Controllers\HomeController::class, 'indexAbout'])->name('about');
Route::get('/blog', [App\Http\Controllers\HomeController::class, 'indexBlog'])->name('blog');
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'indexContact'])->name('contact');
Route::post('/getresultsearch', [App\Http\Controllers\SearchController::class, 'getResultSearch'])->name('getresultsearch');
Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'indexCategory'])->name('register');
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
Route::get('/profile/{id}', [App\Http\Controllers\PublicProfileController::class, 'indexPublic'])->name('profileDetails');
Route::post('/profile/save', [App\Http\Controllers\ProfileController::class, 'saveAvatar'])->name('saveAvatar');
Route::get('getProfileGeneral', [App\Http\Controllers\ProfileController::class, 'getTabContentGeneral'])->name('getProfileGeneral');
Route::get('getProfileChangePassword', [App\Http\Controllers\ProfileController::class, 'getTabContentChangePassword'])->name('getProfileChangePassword');
Route::get('getProfileInfo', [App\Http\Controllers\ProfileController::class, 'getTabContentInfo'])->name('getProfileInfo');
Route::get('getProfileSocialLinks', [App\Http\Controllers\ProfileController::class, 'getTabContentSocialLinks'])->name('getProfileSocialLinks');
Route::get('getProfileConnections', [App\Http\Controllers\ProfileController::class, 'getTabContentConnections'])->name('getProfileConnections');
Route::get('getProfileNotifications', [App\Http\Controllers\ProfileController::class, 'getTabContentNotifications'])->name('getProfileNotifications');