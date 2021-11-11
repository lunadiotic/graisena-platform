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
Route::get('/nursary/{nursary}/stock/', 'StockController@index')->name('stock.index');
Route::get('/nursary/{nursary}/stock/create/', 'StockController@create')->name('stock.create');
Route::post('/nursary/stock/store/', 'StockController@store')->name('stock.store');
Route::get('/nursary/{stock}/stock/edit/', 'StockController@edit')->name('stock.edit');
Route::patch('/nursary/{stock}/stock/update/', 'StockController@update')->name('stock.update');
Route::get('/nursary/{stock}/stock/show/', 'StockController@show')->name('stock.show');
Route::delete('/nursary/{stock}/stock/destroy/', 'StockController@destroy')->name('stock.destroy');

Route::resource('program', 'ProgramController');
Route::resource('nursary', 'NursaryController');
