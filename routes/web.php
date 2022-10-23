<?php

use Illuminate\Support\Facades\Auth;
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
Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');

// Route::middleware("auth")->resource("/apartments", "User\ApartmentController");

// Route::middleware('auth')
//     ->namespace('User')
//     ->name('apartments.')
//     ->prefix('admin')
//     ->group(function () {
//         Route::get('/', 'AdminController@dashboard')->name('dashboard');
//         Route::resource('apartments', 'ApartmentController');
//         Route::resource('messages', 'MessageController');
//     });


    Route::middleware('auth')
    //# aggiorna la cartella all'interno della quale si trovano i controller
    ->namespace('User')
    // § aggiorna il name di ogni "subroute" con un prefisso admin.
    ->name('user.')
    // aggiorna ogni url con un prefisso admin/
    ->prefix('user')
    //ragqruppa varie rotte
    ->group(function (){
        // Route::get('/', 'HomeController@index')->name('home');

        Route::post('/apartments/assignSponsorship', 'ApartmentController@assignSponsorship')->name('apartments.assignSponsorship');

        Route::get("/apartments/messages/{id}", "ApartmentController@showMessage")->name("apartments.showMessage");
        Route::get("/apartments/{id}/messages", "ApartmentController@messagesIndex")->name("apartments.messageIndex");

        Route::get('/apartments/{id}/goToSponsorship', 'ApartmentController@goToSponsorship')->name('apartments.goToSponsorship');


        Route::resource('/apartments', 'ApartmentController');
        Route::resource('/sponsorships', 'SponsorshipController');



            // Route::resource('/categories', 'CategoryController');
            // Route::resource('/tags', 'TagController');

});

Route::get("{any?}", function () {
    return view('welcome');
})->where("any", ".*");

