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

Route::namespace('Site')->group(function () {
    // Homepage
    Route::get('/', ['as' => 'site.homepage', 'uses' => 'HomepageController@index']);
    Route::get('/index', ['as' => 'site.homepage.index', 'uses' => 'HomepageController@index']);
});
Route::namespace('Guard')->group(function () {
    // Login
    Route::group(['prefix' => '/guard'], function() {
        Route::get('/login', ['as' => 'guard.login', 'uses' => 'AuthController@login']);
        Route::get('/register', ['as' => 'guard.register', 'uses' => 'AuthController@register']);
        Route::post('/checkLogin', ['as' => 'guard.checkLogin', 'uses' => 'AuthController@checkLogin']);
        Route::post('/checkRegister', ['as' => 'guard.checkRegister', 'uses' => 'AuthController@checkRegister']);
    });
});
Route::namespace('Panel')->middleware('auth')->group(function () {
    // Panel
    Route::group(['prefix' => '/panel'], function() {
        Route::get('/{userPassword?}', ['as' => 'panel', 'uses' => 'PanelController@index']);
        Route::group(['prefix' => '/passwords'], function() {
            Route::get('create', ['as' => 'panel.passwords.create', 'uses' => 'PasswordController@create']);
            Route::post('create', ['as' => 'panel.passwords.store', 'uses' => 'PasswordController@store']);
        });
    });
});

require __DIR__.'/auth.php';
