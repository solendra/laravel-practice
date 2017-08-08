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


Route::get('/', 'HomeController@index');
Route::resource('members','MembersController');

Route::get('pdf','PDFController@pdf');
Route::get('contact','ContactsController@contact');
Route::get('export','ExcelController@exportMembers');
Route::get('exportcsv','ExcelController@exportMembersCSV');
Route::any('importexcel','ExcelController@importexcel');
Route::get('location','MapController@location');
Route::resource('team','TeamController');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('login/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');
