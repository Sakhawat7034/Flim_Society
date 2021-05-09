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
Route::resource('movies','MovieController');
Route::get('actor','ActorController@create');
Route::post('actor','ActorController@store');
Route::get('actorshow','ActorUpdateController@index');
Route::get('edit/{id}','ActorUpdateController@show');
Route::post('edit/{id}','ActorUpdateController@edit');
Route::get('director','DirectorController@create');
Route::post('director','DirectorController@store');
Route::get('directorshow','DirectorController@show');
Route::get('directoredit/{id}','DirectorController@edit');
Route::post('directoredit/{id}','DirectorController@update');
