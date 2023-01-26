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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/nrp/{nrp}/{name}', function ($nrp , $name) {
    return "NRP dan Nama =" . $nrp . $name; 
}) -> where ('nrp', '[0-9]+') ->  where ('name', '[A-Z]+');

Route::get('person', 'PersonController@index')->name('person.index');
Route::get('/person/show/{param}', 'PersonController@index');

Route::resource('student', 'StudentController');

Route::get('/person/send-data', 'PersonController@sendData');

Route::get('/person/my-course/{course}/{task}/{quiz}/{mid_term}/{final}', 'PersonController@myCourse');

//method GET
Route::get('person/create', 'PersonController@create')->name('person.create');

//methode POST
Route::post('person/create', 'PersonController@store')->name('person.store');

Route::get('student/index', 'StudentController@index')->name('student.index');

Route::get('student', 'StudentController@index');
Route::get('student/create', 'StudentController@create');
Route::post('student/store', 'StudentController@store');
Route::delete('student/{id}/delete', 'StudentController@destroy');
Route::post('student/edit/{id}', 'StudentController@update');
Route::get('student/edit/{id}', 'StudentController@edit');



