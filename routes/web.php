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
Route::resource('program/{id}/subprogram', 'SubprogramController');
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
Route::get('/distribution/{distribution}/distribution/', 'DistributionSeedController@index')->name('distribution.index');
Route::get('/distribution/{distribution}/distribution/create/', 'DistributionSeedController@create')->name('distribution.create');
Route::post('/distribution/distribution/store/', 'DistributionSeedController@store')->name('distribution.store');
Route::get('/distribution/{distribution_seed}/distribution/edit/', 'DistributionSeedController@edit')->name('distribution.edit');
Route::patch('/distribution/{distribution_seed}/distribution/update/', 'DistributionSeedController@update')->name('distribution.update');
Route::get('/distribution/{distribution_seed}/distribution/show/', 'DistributionSeedController@show')->name('distribution.show');
Route::delete('/distribution/{distribution_seed}/distribution/destroy/', 'DistributionController@destroy')->name('distribution.destroy');

// Download Attach File
Route::get('/download/{file}/program', 'DownloadController@program')->name('download.program');
