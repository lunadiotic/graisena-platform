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
Route::resource('nursary', 'NursaryController');
Route::resource('seed', 'SeedController');
Route::resource('distribution', 'DistributionController');
//stock
Route::get('/nursary/{nursary}/stock/', 'StockController@index')->name('stock.index');
Route::get('/nursary/{nursary}/stock/create/', 'StockController@create')->name('stock.create');
Route::post('/nursary/stock/store/', 'StockController@store')->name('stock.store');
Route::get('/nursary/{stock}/stock/edit/', 'StockController@edit')->name('stock.edit');
Route::patch('/nursary/{stock}/stock/update/', 'StockController@update')->name('stock.update');
Route::get('/nursary/{stock}/stock/show/', 'StockController@show')->name('stock.show');
Route::delete('/nursary/{stock}/stock/destroy/', 'StockController@destroy')->name('stock.destroy');
//distribution seed
Route::get('/distribution/{distribution}/distribution/seed/', 'DistributionSeedController@index')->name('distribution.seed.index');
Route::get('/distribution/{distribution}/distribution/seed/create/', 'DistributionSeedController@create')->name('distribution.seed.create');
Route::post('/distribution/distribution/seed/store/', 'DistributionSeedController@store')->name('distribution.seed.store');
Route::get('/distribution/{distribution_seed}/distribution/seed/edit/', 'DistributionSeedController@edit')->name('distribution.seed.edit');
Route::patch('/distribution/{distribution_seed}/distribution/seed/update/', 'DistributionSeedController@update')->name('distribution.seed.update');
Route::delete('/distribution/{distribution_seed}/distribution/seed/destroy/', 'DistributionSeedController@destroy')->name('distribution.seed.destroy');

// Download Attach File
Route::get('/download/{file}/program', 'DownloadController@program')->name('download.program');
