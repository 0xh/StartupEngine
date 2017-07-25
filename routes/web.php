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

//Authentication
Auth::routes();
Route::get('/auth0', '\Auth0\Login\Auth0Controller@callback');
Route::get('/callback', '\Auth0\Login\Auth0Controller@callback');
Route::get('/auth0/callback', '\Auth0\Login\Auth0Controller@callback');

if(config('laravel-auth0.mode') == 'hosted') {
    Route::get('/login', 'AppController@login')->name('login');
}
else {
    Route::get('/login', 'AppController@loginWidget')->name('login');
}

Route::get('/logout', function() {
    Auth::logout();
    return redirect('/');
});

//Web Middleware
Route::group(['middleware' => ['web']], function () {
    //Homepage
    Route::get('/', 'ArticleController@getHomepage');
    Route::get('/about', 'ArticleController@getHomepage');

    //Install
    Route::get('/install', 'SettingsController@install');

    //Settings
    Route::post('/install', 'SettingsController@installContentful');

    //Import
    Route::get('/install/import', 'ContentfulController@import');
    Route::get('/install/import-complete', 'SettingsController@importComplete');

    //Pages
    Route::get('/articles', 'ArticleController@getArticles');
    Route::get('/help', ['uses' => 'HelpController@index', 'as' => 'article']);
    Route::get('/{slug}', ['uses' => 'ArticleController@getArticle', 'as' => 'article']);
    Route::get('/article/{slug}', ['uses' => 'ArticleController@getArticle', 'as' => 'article']);
    Route::get('/landing/{slug}', ['uses' => 'ArticleController@getArticle', 'as' => 'article']);
    Route::get('/product/{slug}', ['uses' => 'ArticleController@getArticle', 'as' => 'article']);
    Route::get('/service/{slug}', ['uses' => 'ArticleController@getArticle', 'as' => 'article']);
    Route::get('/help/{slug}', ['uses' => 'HelpController@getArticle', 'as' => 'article']);
    Route::get('/form/{slug}', ['uses' => 'ArticleController@getArticle', 'as' => 'article']);
});