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


Route::get('home', function () {
  return  \Redirect::action('HomeController@index');
});

Route::get('/', 'UserAllController@reg_create');
Auth::routes();

Route::prefix('backend')->group(function () {
  Route::post('registro', 'UserAllController@store')->name('registro.save');
  Route::post('autenticacion', 'HomeController@login')->name('autenticacion');
  Route::get('/', function () {
    return  \Redirect::action('HomeController@index');
  });
  Route::get('home', 'HomeController@index')->name('home');
  Route::resource('usuarios', 'UserAllController', ['names' => ['store' => 'user.create']]);
  Route::get('password/{id}', 'UserAllController@pass');
  Route::get('password/{id}/change', 'UserAllController@pass');
  Route::post('password', 'UserAllController@pass_store')->name('pass.store');
  Route::post('logoutData', 'HomeController@logoutData')->name('logoutData'); 
  Route::resource('tickets', 'TicketsController', ['names' => ['store' => 'ticket.store', 'update' => 'ticket.update', 'destroy' => 'ticket.destroy']]);
  Route::get('inscribe', 'UserAllController@inscribe');
  Route::post('import', 'UserAllController@import')->name('import');
});
