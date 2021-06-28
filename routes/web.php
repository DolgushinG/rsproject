<?php

use Illuminate\Support\Facades\Mail;
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
Route::middleware(['auth','verified'])->group(function () {
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
    Route::get('/getProfileGeneral', [App\Http\Controllers\ProfileController::class, 'getTabContentGeneral'])->name('getProfileGeneral');
    Route::post('/editChagesGeneral', [App\Http\Controllers\ProfileController::class, 'editTabContentGeneral'])->name('editChagesGeneral');
    Route::get('/getProfileInfo', [App\Http\Controllers\ProfileController::class, 'getTabContentInfo'])->name('getProfileInfo');
    Route::post('/editChagesInfo', [App\Http\Controllers\ProfileController::class, 'editChagesInfo'])->name('editChagesInfo');
    Route::get('/getProfileNotifications', [App\Http\Controllers\ProfileController::class, 'getTabContentNotifications'])->name('getProfileNotifications');
    Route::post('/editChagesNotifications', [App\Http\Controllers\ProfileController::class, 'editChagesNotifications'])->name('editChagesNotifications');
    Route::get('/getProfileSocialLinks', [App\Http\Controllers\ProfileController::class, 'getTabContentSocialLinks'])->name('getTabContentSocialLinks');
    Route::post('/editChagesSocialLinks', [App\Http\Controllers\ProfileController::class, 'editChagesSocialLinks'])->name('editChagesSocialLinks');
    Route::post('/cropimageupload', [App\Http\Controllers\CropImageController::class,'uploadCropImage'])->name('cropimageupload');
    Route::post('/profile/save', [App\Http\Controllers\ProfileController::class, 'saveAvatar'])->name('saveAvatar');
});

//public

Route::get('/privacyconf', [App\Http\Controllers\HomeController::class, 'indexPrivacy'])->name('privacyconf');
Route::get('/privatedata', [App\Http\Controllers\HomeController::class, 'indexPrivacyData'])->name('privatedata');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'indexAbout'])->name('about');
Route::get('/blog', [App\Http\Controllers\HomeController::class, 'indexBlog'])->name('blog');
Route::get('/feedback', [App\Http\Controllers\FeedbackController::class, 'index'])->name('feedback');
Route::post('/postfeedback', [App\Http\Controllers\FeedbackController::class, 'postFeedback'])->name('postfeedback');
Route::post('/getresultsearch', [App\Http\Controllers\SearchController::class, 'getResultSearch'])->name('getresultsearch');
Route::post('/getresultsearch/paginationSeach', [App\Http\Controllers\SearchController::class, 'paginationSeach'])->name('paginationSeach');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'indexCategory'])->name('register');
Route::get('/profile/{id}', [App\Http\Controllers\PublicProfileController::class, 'indexPublic'])->name('profileDetails');
Route::get('/live-status/{id}', [App\Http\Controllers\PublicProfileController::class, 'liveStatus']);
Route::post('/postrating', [App\Http\Controllers\PublicProfileController::class, 'postRatingAndReview'])->name('postrating');
Route::get('/getrating', [App\Http\Controllers\PublicProfileController::class, 'getRatingAndReview'])->name('getrating');

Route::post('getEmployees',[App\Http\Controllers\HomeController::class, 'getEmployees'])->name('getEmployees');
Route::get('/verify/success',[App\Http\Controllers\HomeController::class, 'indexVerificationPage']);
Route::get('send_test_email', function(){
    Mail::raw('Sending emails with Mailgun and Laravel ', function($message)
    {
        $message->subject('Mailgun and Laravel ');
        $message->from('no-reply@website_name.com', 'Website Name');
        $message->to('pardeepkumargt@gmail.com');
    });
});
Route::get('sendmail', [App\Http\Controllers\MailController::class, 'sendmail']);
Auth::routes(['verify' => true]);
Route::get('gmaps', [App\Http\Controllers\LocationController::class, 'gmaps'])->name('gmaps');

