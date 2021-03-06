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
    return view('welcome');
});

Auth::routes();

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ],
    function()
    {
Route::group(['middleware' => ['auth','auto-check-permission']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('governorate', 'GovernorateController');
    Route::resource('contact', 'contactcontroller');
    Route::resource('setting', 'settingcontroller');
    Route::resource('category', 'categorycontroller');
    Route::resource('city', 'citycontroller');
    Route::resource('order', 'OrderController');
    Route::resource('client', 'ClientController');
    Route::resource('post', 'PostController');
    Route::get('resetpassword','AdminController@changePassword');
    Route::post('resetpassword','AdminController@changePasswordSave');
    Route::resource('role', 'RoleController');
    Route::resource('user', 'UserController');
});


Route::get('forgetpassword','AdminController@forgerpassword');
Route::post('forgtrpassword','AdminController@savePassword')->name('savepassword');
});
