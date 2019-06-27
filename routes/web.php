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
    return redirect('/orders/create');
});


Route::resource('products', 'ProductsController');
Route::resource('orders', 'OrdersController');

Route::get('/orders/toArchive/{id}', 'OrdersController@toArchive')->name('orders.toArchive');
Route::get('/orders/toComplete/{id}', 'OrdersController@toComplete')->name('orders.toComplete');
Route::get('/orders/toNew/{id}', 'OrdersController@toNew')->name('orders.toNew');

Route::get('/completed', 'CompletedOrdersController@index');
Route::get('/archived', 'ArchivedOrdersController@index');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index'); 
