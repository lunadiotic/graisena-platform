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

Auth::routes([
    'register' => false,
    'verify' => false
]);

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('program', 'ProgramController');

Route::get('/daftar/relawan', 'VolunteerRegController@index')->name('reg.volunteer');
Route::post('/daftar/relawan', 'VolunteerRegController@store')->name('reg.volunteer');;
