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

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {

    Route::get('csv', 'MyController@importExportView');
    Route::get('export', 'MyController@export')->name('export');
    Route::post('import', 'MyController@import')->name('import');
    Route::get('drop', 'MyController@drop')->name('drop');

    Route::get('github-search', 'GithubController@index');
    Route::get('github-search/search','GithubController@searchUser')->name('github-search.search');

    Route::resource('clientdeal', 'ClientDealsController');
    Route::delete('clientdeal/destroy/all', 'ClientDealsController@multi_delete')->name('ClientDeals.destroy');

});

Route::get('login/{provider}', 'Auth\SocialController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\SocialController@handleProviderCallback');
