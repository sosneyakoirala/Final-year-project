<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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


Auth::routes(['register'=>false]);


Route::post('/cregister', [App\Http\Controllers\FrontEndController::class, 'cregister'])->name('cregister');
Route::post('/wregister', [App\Http\Controllers\FrontEndController::class, 'wregister'])->name('wregister');

Route::get('/contact',[App\Http\Controllers\ContactController::class, 'contact']);
Route::post('/contact',[App\Http\Controllers\ContactController::class,'contactSubmit'])->name('contact.submit');




Route::get('/',[App\Http\Controllers\FrontendController::class, 'index'])->name('home');





Route::get('getState',[App\Http\Controllers\FrontendController::class, 'getState'])->name('getState');
Route::get('getCity',[App\Http\Controllers\FrontendController::class, 'getCity'])->name('getCity');


Route::get('/register', [App\Http\Controllers\FrontendController::class, 'register'])->name('register');
Route::get('user/logout',[App\Http\Controllers\FrontendController::class, 'logout'])->name('user.logout');

Route::group(['middleware'=>['auth', 'worker']], function() {

    Route::get('profile/{id}', [App\Http\Controllers\FrontendController::class, 'myprofile'])->name('user.profile');
    Route::get('profile-update/{id}', [App\Http\Controllers\FrontendController::class, 'profileupdate']);

    Route::get('location/{id}', [App\Http\Controllers\FrontendController::class, 'locationupdate'])->name('user.location');

    Route::post('profile-update/{id}',[App\Http\Controllers\FrontendController::class, 'updateprofiles'])->name('update.profile');
    Route::post('locatione/{id}',[App\Http\Controllers\FrontendController::class, 'updatelocation'])->name('update.location');

    Route::get('myform', [App\Http\Controllers\FrontendController::class, 'myform'])->name('myform');


    Route::get('register/ajax/{id}',[App\Http\Controllers\FrontendController::class, 'myformAjax'])->name('myform.ajax');
    Route::post('profile/{id}', [App\Http\Controllers\FrontendController::class, 'updateimage'])->name('update.image');

});






Route::group(['middleware'=>['auth', 'admin']], function() {
    Route::get('/admin/user',[App\Http\Controllers\AdminController::class, 'usershow']);
    Route::delete('/admin/user/{id}', [App\Http\Controllers\AdminController::class, 'destroy'])->name('delete.users');
    Route::get('/country',[App\Http\Controllers\AddressController::class, 'show']);
    Route::get('/state',[App\Http\Controllers\AddressController::class, 'state']);
    Route::get('/city',[App\Http\Controllers\AddressController::class, 'city']);
    Route::post('/address', [App\Http\Controllers\AddressController::class, 'store'])->name('address.store');
    Route::post('/state', [App\Http\Controllers\AddressController::class, 'storestate'])->name('state.store');
    Route::post('/city', [App\Http\Controllers\AddressController::class, 'storecity'])->name('city.store');
    Route::delete('/country/{id}', [App\Http\Controllers\AddressController::class, 'destroy'])->name('delete.address');
    Route::get('/admin', [App\Http\Controllers\AdminController::class, 'dashboard']);
    Route::delete('/state/{id}', [App\Http\Controllers\AddressController::class, 'destroystate'])->name('delete.state');
    Route::delete('/city/{id}', [App\Http\Controllers\AddressController::class, 'destroycity'])->name('delete.city');
});

Route::group(['middleware'=>['auth', 'client']], function() {
    Route::get('client/profile/{id}', [App\Http\Controllers\FrontendController::class, 'clientdash'])->name('client.profile');
    Route::get('client/location/{id}', [App\Http\Controllers\FrontendController::class, 'clientupdate'])->name('client.location');
// Route::get('profile-update/{id}', [App\Http\Controllers\FrontendController::class, 'profileupdate']);
// Route::get('location/{id}', [App\Http\Controllers\FrontendController::class, 'locationupdate'])->name('user.location');

// // Route::post('location/{id}',[App\Http\Controllers\FrontendController::class, 'fetch'])->name('dependent.fetch');
// Route::post('profile-update/{id}',[App\Http\Controllers\FrontendController::class, 'updateprofiles'])->name('update.profile');
Route::post('client/location/{id}',[App\Http\Controllers\FrontendController::class, 'updateclientprofile'])->name('update.clientprofile');

});
Route::get('rating/{id}',[App\Http\Controllers\RatingController::class, 'show']);
Route::post('rating', [App\Http\Controllers\RatingController::class, 'store'])->name('rating.store');
Route::get('removecontact/{id}', [App\Http\Controllers\MyWorkerController::class, 'removecontact'])->name('removecontact');
Route::get('/workers',[App\Http\Controllers\MyWorkerController::class, 'workers']);
Route::get('/categories',[App\Http\Controllers\MyWorkerController::class, 'categories']);
Route::get('/byprofession/{name}',[App\Http\Controllers\MyWorkerController::class, 'byprofession'])->name('byprofession');
Route::get('/bylocation/{id}',[App\Http\Controllers\MyWorkerController::class, 'bylocation'])->name('bylocation');



Route::get('/workerdetail/{id}',[App\Http\Controllers\MyWorkerController::class, 'workerdetail'])->name('workerdetail');
Route::get('/clientdetail/{id}',[App\Http\Controllers\MyWorkerController::class, 'clientdetail'])->name('clientdetail');


    Route::post('/addcontact',[App\Http\Controllers\MyWorkerController::class, 'addcontact'])->name('addcontact');

Route::get('/contactlist', [App\Http\Controllers\MyWorkerController::class, 'contactlist'])->name('contactlist');
Route::post('/  ',[App\Http\Controllers\MyWorkerController::class, 'workerSearch'])->name('worker.search');
Route::delete('/contactlist/{id}', [App\Http\Controllers\MyWorkerController::class, 'destroyworker'])->name('delete.contact');

Route::get('/clientlist', [App\Http\Controllers\MyWorkerController::class, 'clientlist'])->name('clientlist');




Route::any('/{page?}',function(){
    return View::make('errors.404');
  })->where('page','.*');