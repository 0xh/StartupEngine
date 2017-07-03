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
Route::get('/auth0/callback', '\Auth0\Login\Auth0Controller@callback');

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

    //Articles
    Route::get('/articles', 'ArticleController@getArticles');
    Route::get('/article/{slug}', ['uses' => 'ArticleController@getArticle', 'as' => 'article']);
    Route::get('/article/{slug}/{section}', 'ArticleController@getArticleSection');
});