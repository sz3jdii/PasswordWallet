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
Route::namespace('Admin')->middleware('auth')->group(function () {
    // Admin
    Route::group(['prefix' => '/admin'], function() {

    });
});

require __DIR__.'/auth.php';
