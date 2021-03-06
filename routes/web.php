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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('contact/{nom?}', function ($nom = '') {
//     return "Salut $nom";
// });

// Route::get('user/{id}/{name}', 'PageController@user')->where(['id' => '[0-9]+', 'name' => '[a-zA-Z]+']);

Route::get('/articles','ArticleController@index')->name('articles.index');

Route::get('/articles/create','ArticleController@create')->name('articles.create');
Route::post('/articles/save','ArticleController@store')->name('articles.store');

Route::get('/articles/update','ArticleController@update')->name('articles.update');
Route::get('/articles/destroy','ArticleController@destroy')->name('articles.destory');