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
    return redirect()->route('login');
});

Auth::routes([
    'register' => false,
    'verify' => false
]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/daftar/relawan', 'VolunteerRegController@index')->name('reg.volunteer');
Route::post('/daftar/relawan', 'VolunteerRegController@store')->name('reg.volunteer');;

Route::resource('program', 'ProgramController');
Route::resource('program/{id}/subprogram', 'SubprogramController');
Route::resource('volunteer', 'VolunteerController');
Route::resource('nursery', 'NurseryController');
Route::resource('nursery/{id}/stock', 'StockController');
Route::resource('seed', 'SeedController');
Route::resource('distribution', 'DistributionController');
Route::resource('distribution/{id}/seed', 'DistributionSeedController', [ 'as' => 'dist' ]);

// Profile
Route::get('/profile', 'ProfileController@index')->name('profile.index');
Route::post('/profile', 'ProfileController@store')->name('profile.store');

// Download Attach File
Route::get('/download/{file}/program', 'DownloadController@program')->name('download.program');
