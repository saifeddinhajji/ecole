<?php

use Illuminate\Support\Facades\Route;
Auth::routes();
Route::get('/', function () {return view('auth.login');})->middleware('guest');
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/register',function(){ return back()->withInput();})->middleware('guest');
Route::post('/Ajouterchapitre','ChapitreController@addchapitre')->name('savechapitre')->middleware('auth');
Route::post('/updatechapitre/{id}','ChapitreController@update')->name('updatechapitre')->middleware('auth');
Route::get('/deletechapitre/{id}','ChapitreController@delete')->name('deletechapitre')->middleware('auth');
Route::get('/detailbooks/{id}','ChapitreController@showbook')->name('showbook')->middleware('auth');
Route::post('/Ajouterpage','PageController@addpage')->name('savepage')->middleware('auth');
Route::get('/deletepage/{id}','PageController@deletepage')->name('deletepage')->middleware('auth');
//Route::post('/','ChapitreController@')->name('');