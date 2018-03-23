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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/about-me', 'AboutMeController@index')->name('about-me');

Auth::routes();

Route::prefix('/cv')->group(function () {
    Route::get('/', ['as' => 'cv', 'uses' => 'CVController@index']);
    Route::get('/pdf', ['as' => 'cv.pdf', 'uses' => 'CVController@downloadPdfVersion']);
});

Route::get('/blog', ['as' => 'blog', 'uses' => 'BlogController@index']);
Route::get('/resources', ['as' => 'resources', 'uses' => 'ResourcesController@index']);
