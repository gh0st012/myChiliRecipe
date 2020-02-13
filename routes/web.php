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

Auth::routes();

Route::get('/recipe/create', 'RecettesController@create');
Route::post('/recipe', 'RecettesController@store');
Route::get('/recipe/{recette}', 'RecettesController@show');
Route::get('/recipe/{recette}/edit', 'RecettesController@edit')->name('recette.edit');
Route::patch('/recipe/{recette}', 'RecettesController@update')->name('recette.update');
Route::delete('/recipe/{recette}', 'RecettesController@destroy');

Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.show');
