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
Route::middleware(['auth','verified', 'is_routesetter'])->group(function () {
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
    Route::get('/getProfileGeneral', [App\Http\Controllers\ProfileController::class, 'getTabContentGeneral'])->name('getProfileGeneral');
    Route::get('/getProfileSidebar', [App\Http\Controllers\ProfileController::class, 'getTabContentSidebar'])->name('getProfileSidebar');
    Route::get('/getProfileReviews', [App\Http\Controllers\ProfileController::class, 'getTabContentReviews'])->name('getTabContentReviews');
    Route::get('/getProfileEdit', [App\Http\Controllers\ProfileController::class, 'getTabContentEdit'])->name('getTabContentEdit');
    Route::get('/getProfileMyTrainings', [App\Http\Controllers\MyTrainingController::class, 'getTabContentMyTrainings'])->name('getTabContentMyTrainings');
    Route::post('/createTraining', [App\Http\Controllers\MyTrainingController::class, 'createTraining'])->name('createTraining');
    Route::post('/editChanges', [App\Http\Controllers\ProfileController::class, 'editChanges'])->name('editChanges');
    Route::get('/getProfileSocialLinks', [App\Http\Controllers\ProfileController::class, 'getTabContentSocialLinks'])->name('getTabContentSocialLinks');
    Route::post('/cropimageupload', [App\Http\Controllers\CropImageController::class,'uploadCropImage'])->name('cropimageupload');
    Route::post('/profile/save', [App\Http\Controllers\ProfileController::class, 'saveAvatar'])->name('saveAvatar');
    Route::post('importEvent',[App\Http\Controllers\ImportEvent::class, 'importEvent']);
    Route::get('importInterEvent',[App\Http\Controllers\ImportEvent::class, 'importInterEvent'])->name('importInterEvent');
    Route::post('subscriptionUser', [App\Http\Controllers\SubscriptionUserController::class, 'getEmailUsers'])->name('subscriptionUser');
    Route::get('toSendEmailSubscribe', [App\Http\Controllers\SubscriptionUserController::class, 'sendEmailToSubscribeUser']);
    Route::post('/send-move', [App\Http\Controllers\ClimbingMovesController::class, 'sendMove'])->name('send-move');
    Route::post('/send-hold', [App\Http\Controllers\HoldsController::class, 'sendHolds'])->name('send-hold');
    Route::post('/add-cl-gyms', [App\Http\Controllers\ClimbingGymController::class, 'addClimbingGyms'])->name('add-cl-gyms');
    Route::post('/postfeedback', [App\Http\Controllers\FeedbackController::class, 'postFeedback'])->name('postfeedback');
    Route::post('add-event', [App\Http\Controllers\EventController::class, 'sendEvent']);
    Route::post('/import-climbing-gyms', [App\Http\Controllers\ClimbingGymController::class, 'import'])->name('import-climbing-gyms');
});
Route::middleware(['auth','verified', 'is_organizer'])->group(function () {
    Route::get('/organizer/profile', [App\Http\Controllers\ProfileOrganizerController::class, 'indexOrganizer'])->name('profile.organizer');
    Route::get('/organizer/profile/dashboard', [App\Http\Controllers\ProfileOrganizerController::class, 'dashboard'])->name('profile.organizer.dashboard');
    Route::get('/organizer/profile/getProfileCurrentEvent', [App\Http\Controllers\ProfileOrganizerController::class, 'getTabContentCurrentEvent'])->name('getProfileCurrentEvent');
    Route::get('/organizer/profile/create/event', [App\Http\Controllers\ProfileOrganizerController::class, 'ContentCreateEvent'])->name('create.event');
    Route::get('/organizer/profile/getProfilePreviewsEvent', [App\Http\Controllers\ProfileOrganizerController::class, 'getTabContentPreviewsEvent'])->name('getProfilePreviewsEvent');
    Route::post('/organizer/profile/editChangesCreateEvent', [App\Http\Controllers\ProfileOrganizerController::class, 'editChangesCreateEvent'])->name('editChangesCreateEvent');
    Route::post('/organizer/profile/editChangesCurrentEvent', [App\Http\Controllers\ProfileOrganizerController::class, 'editChangesCurrentEvent'])->name('editChangesCurrentEvent');
    Route::post('/organizer/profile/editChangesPreviewsEvent', [App\Http\Controllers\ProfileOrganizerController::class, 'editChangesPreviewsEvent'])->name('editChangesPreviewsEvent');
    Route::get('/organizer/profile/getProfileGeneralOrganizer', [App\Http\Controllers\ProfileOrganizerController::class, 'getTabContentGeneralOrganizer'])->name('getProfileGeneralOrganizer');
    Route::post('/organizer/profile/editChangesGeneralOrganizer', [App\Http\Controllers\ProfileOrganizerController::class, 'editTabContentGeneralOrganizer'])->name('editChangesGeneralOrganizer');
});
//public
Route::get('/climbing-holds', [App\Http\Controllers\HoldsController::class, 'index'])->name('climbing-holds');
Route::get('/climbing-holds/holds', [App\Http\Controllers\HoldsController::class, 'holds']);
Route::get('/climbing-moves/moves', [App\Http\Controllers\ClimbingMovesController::class, 'moves']);
Route::post('/climbing-moves/likeDisLikeMove', [App\Http\Controllers\ClimbingMovesController::class, 'likeDisLikeMove']);
Route::get('/climbing-moves', [App\Http\Controllers\ClimbingMovesController::class, 'index'])->name('climbing-moves');
Route::get('/posts', [App\Http\Controllers\PostsController::class, 'index'])->name('posts');
Route::get('/climbing-gyms', [App\Http\Controllers\ClimbingGymController::class, 'index'])->name('climbing-gyms');
Route::get('/add-climbing-gyms', [App\Http\Controllers\ClimbingGymController::class, 'indexAddClimbingGyms'])->name('add-climbing-gyms');
//Route::get('/feedback', [App\Http\Controllers\FeedbackController::class, 'index'])->name('feedback');
Route::post('/climbing-gyms/likeDisLikeGym', [App\Http\Controllers\ClimbingGymController::class, 'saveLikeDislike']);
Route::get('/climbing-gyms/votesGyms', [App\Http\Controllers\ClimbingGymController::class, 'votesGyms']);
Route::get('/post/{post}', [App\Http\Controllers\PostsController::class, 'show'])->name('post');
Route::post('/post/likedislike',[App\Http\Controllers\PostsController::class, 'saveLikeDislike'])->name('likeDisLike');
Route::get('add-event', [App\Http\Controllers\EventController::class, 'addEvent'])->name('add-event');
Route::get('/privacyconf', [App\Http\Controllers\HomeController::class, 'indexPrivacy'])->name('privacyconf');
Route::get('/privatedata', [App\Http\Controllers\HomeController::class, 'indexPrivacyData'])->name('privatedata');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'indexAbout'])->name('about');
Route::get('/blog', [App\Http\Controllers\HomeController::class, 'indexBlog'])->name('blog');
Route::get('/getresultsearch', [App\Http\Controllers\SearchController::class, 'getResultSearch'])->name('getresultsearch');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'indexCategory'])->name('register');
Route::get('/register/organizer', [App\Http\Controllers\Auth\RegisterController::class, 'indexCategory'])->name('register.organizer');
Route::get('/profile/{id}', [App\Http\Controllers\PublicProfileController::class, 'indexPublic'])->name('profileDetails');
//Route::get('/profile/organizer/{id}', [App\Http\Controllers\PublicProfileController::class, 'indexPublic'])->name('profileDetails');
Route::get('/live-status/{id}', [App\Http\Controllers\PublicProfileController::class, 'liveStatus']);
Route::post('/postrating', [App\Http\Controllers\PublicProfileController::class, 'postRatingAndReview'])->name('postrating');
Route::get('/getrating', [App\Http\Controllers\PublicProfileController::class, 'getRatingAndReview'])->name('getrating');
Route::post('getEmployees',[App\Http\Controllers\HomeController::class, 'getEmployees'])->name('getEmployees');
Route::get('/verify/success',[App\Http\Controllers\HomeController::class, 'indexVerificationPage']);
Route::get('support-project', [App\Http\Controllers\HomeController::class, 'indexSupport'])->name('support-project');

Auth::routes(['verify' => true]);


