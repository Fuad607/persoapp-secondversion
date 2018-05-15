<?php

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
    if(Auth::user()){
    if((Auth::user()->hasRole('business')) || (Auth::user()->hasRole('applicant'))){
        return view('dashboard/dashboard');
    }
    }
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/boarding', 'BoardingController@viewBoarding');

//Dashboard Routes
Route::get('/dashboard', 'Dashboard\DashboardController@viewDashboard');

Route::get('/offer', 'Dashboard\OfferController@viewOwnOffers');

Route::get('/allOffers', 'Dashboard\OfferConroller@viewAllOffers');


Route::get('/userprofile', function(){
    return view('dashboard/userprofile');
});
Route::get('/matchesBusiness', 'Dashboard\MatchesController@viewAllMatchesBusiness');

Route::get('/myMatches', 'Dashboard\MatchesController@viewMyMatches');



Route::get('/messages', function(){
    return view('dashboard/messages');
});

Route::get('/calendar', function(){
    return view('dashboard/calendar');
});

Route::get('/stats', function(){
    return view('dashboard/stats');
});
Route::get('/ratings', function(){
    return view('dashboard/ratings');
});

Route::get('/apps', function(){
    return view('dashboard/apps');
});
Route::get('/businessprofile', 'Dashboard\BusinessprofileController@viewProfile');
Route::post('/editBusinessprofile', 'Dashboard\BusinessprofileController@editProfile');

Route::get('/benefits', function(){
    return view('dashboard/benefits');
});
Route::get('/settings', function(){
    return view('dashboard/settings');
});

Route::get('/support', function(){
    return view('dashboard/support');
});

Route::get('/logout', 'Auth\LoginController@logout')->name('logout' );


Route::post('/initializeApplicant', 'BoardingController@saveApplicant');

Route::post('/initializeBusiness', 'BoardingController@initializeBusiness');

Route::get('image-upload',['as'=>'image.upload','uses'=>'ImageUploadController@imageUpload']);

Route::post('image-upload',['as'=>'image.upload.post','uses'=>'ImageUploadController@imageUploadPost']);

//Route::get('/offer', function(){
//    return view('dashboard/offer');
//});

Route::post('createOffer', 'Dashboard\OfferController@createOffer');

Route::post('detailOffer', 'Dashboard\OfferController@viewDetail');

Route::post('deleteOffer', 'Dashboard\OfferController@deleteOffer');

Route::post('editOffer', 'Dashboard\OfferController@editOffer');

Route::post('showUser', 'Dashboard\UserProfileController@showProfile');
Route::get('myProfile', 'Dashboard\UserProfileController@showMyProfile');

//User Verification
$this->get('/verify-user/{code}', 'Auth\RegisterController@activateUser')->name('activate.user');