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

Route::get('/', 'HomeController@index')->name('home');

Route::get('article/{article}', 'HomeController@article')->name('article');

Route::post('article/{article}', 'HomeController@storeComment')->name('article.storeComment');

Auth::routes(['register' => false]);

Route::redirect('/home', '/');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('articles', 'ArticleController');

    Route::get('comments/{comment}/reply', 'CommentController@reply')->name('comments.reply');

    Route::post('comments/{comment}/reply', 'CommentController@storeReply')->name('comments.storeReply');

    Route::resource('comments', 'CommentController');
});
