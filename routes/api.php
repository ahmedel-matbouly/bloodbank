<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['prefix'=>'v1','namespace'=>'Api' ],  function (){
    Route::post('register','authcontroller@register'); 
    Route::post('login','authcontroller@login'); 
    Route::get('governorates','Maincontroller@governorates'); 
    
    Route::get('bloods','Maincontroller@bloods');
    Route::get('settings','Maincontroller@settings');
    Route::post('contacts','Maincontroller@contacts');
   
    Route::get('order-all','Maincontroller@orderAll'); 
    Route::get('city','Maincontroller@cities'); 
    Route::get('removetoken','authcontroller@removetoken'); 
    Route::get('notifications','authcontroller@notifications'); 
    Route::post('favourites','MainController@favourites');
    Route::post('resetpassword','authcontroller@resetpassword');
    Route::post('newpassword','authcontroller@newpassword');
   
    Route::group(['middleware'=>'auth:api'],function(){
        Route::get('posts','Maincontroller@posts');
        Route::post('order','Maincontroller@order'); 
        Route::post('profil','authcontroller@profil'); 
        Route::get('categories','Maincontroller@categories');
        Route::post('notificationSetting','Maincontroller@notificationSetting');
        // Route::post('notificationSetting','Maincontroller@notificationsetting');
        Route::get('getnotificationsetting','Maincontroller@getnotificationsetting');
        Route::post('registertoken','authcontroller@registertoken');
        Route::post('removetoken','authcontroller@removetoken');
        
    });
});

