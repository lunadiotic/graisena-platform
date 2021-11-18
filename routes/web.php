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
//stock
Route::get('/nursary/{nursary}/stock/', 'StockController@index')->name('stock.index');
Route::get('/nursary/{nursary}/stock/create/', 'StockController@create')->name('stock.create');
Route::post('/nursary/stock/store/', 'StockController@store')->name('stock.store');
Route::get('/nursary/{stock}/stock/edit/', 'StockController@edit')->name('stock.edit');
Route::patch('/nursary/{stock}/stock/update/', 'StockController@update')->name('stock.update');
Route::get('/nursary/{stock}/stock/show/', 'StockController@show')->name('stock.show');
Route::delete('/nursary/{stock}/stock/destroy/', 'StockController@destroy')->name('stock.destroy');
//distribution
Route::get('/nursary/{nursary}/distribution/', 'DistributionController@index')->name('distribution.index');
Route::get('/nursary/{nursary}/distribution/create/', 'DistributionController@create')->name('distribution.create');
Route::post('/nursary/distribution/store/', 'DistributionController@store')->name('distribution.store');
Route::get('/nursary/{distribution}/distribution/edit/', 'DistributionController@edit')->name('distribution.edit');
Route::patch('/nursary/{distribution}/distribution/update/', 'DistributionController@update')->name('distribution.update');
Route::get('/nursary/{distribution}/distribution/show/', 'DistributionController@show')->name('distribution.show');
Route::delete('/nursary/{distribution}/distribution/destroy/', 'DistributionController@destroy')->name('distribution.destroy');

// Download Attach File
Route::get('/download/{file}/program', 'DownloadController@program')->name('download.program');
