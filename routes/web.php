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


//Route::resource('stocks', 'StocksController');
Route::get('/stocks','StocksController@index');
Route::get('/stocks/{stock}/edit','StocksController@edit')->name('stocks.edit');
Route::put('/stocks/{stock}','StocksController@update')->name('stocks.update');
Route::patch('/stocks/{stock}','StocksController@update')->name('stocks.update');
Route::delete('/stocks/{stock}','StocksController@destroy')->name('stocks.destroy');
Route::get('stocks/create','StocksController@create')->name('stocks.create');
Route::post('stocks','StocksController@store')->name('stocks.store');
Route::post('stocks/{stock}','StocksController@show')->name('stocks.show');
Route::get('/stocks/search-data','StocksController@search_data');

