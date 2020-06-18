<?php

use Illuminate\Support\Facades\Route;
Auth::routes();
Route::get('/', function () {return view('auth.login');});
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/register',function(){ return back()->withInput();});
Route::post('/Ajouterchapitre','ChapitreController@addchapitre')->name('savechapitre');
Route::get('/deletechapitre/{id}','ChapitreController@delete')->name('deletechapitre');
Route::get('/detailbooks/{id}','ChapitreController@showbook')->name('showbook');
Route::post('/Ajouterpage','PageController@addpage')->name('savepage');
Route::post('/deletepage','PageController@deletepage')->name('deletepage');
//Route::post('/','ChapitreController@')->name('');