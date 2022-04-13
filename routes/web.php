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



Auth::routes();
Route::group( ['middleware' => 'auth'], function()
{
    
    Route::get('/','HomeController@index');
    Route::get('/home', 'HomeController@index');
    Route::post('new-portal', 'PortalController@new_portal');
    Route::post('updatePortalStatus/{id}', 'PortalController@updatePortalStatus');
    Route::post('new-bulletin', 'BulletinController@new_bulletin');
    Route::post('deleteBulletin', 'BulletinController@deleteBulletin');
});

Route::post('saveEmployee', 'RegisterController@saveEmployee');
Route::get('signup', 'RegisterController@register');

    