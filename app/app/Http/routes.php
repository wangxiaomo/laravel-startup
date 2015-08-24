<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () { return "Hello laravel"; });

Route::get('admin_hack', 'Admin\AuthController@hack');
Route::get('admin_login', 'Admin\AuthController@login');
Route::get('admin_logout', 'Admin\AuthController@logout');
Route::group([
    'namespace'     =>  'Admin',
    'prefix'        =>  'admin',
    'middleware'    =>  'admin',
], function () {
    Route::get('/', 'IndexController@index');
    Route::get('/test', 'IndexController@test');
});

Route::group([
    'namespace'     =>  'Api',
    'prefix'        =>  'api',
    'middleware'    =>  'api',
], function () {
    Route::get('/', 'IndexController@index');
});
