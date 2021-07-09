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
  return \Redirect::to('registro');
});
Route::get('/home', function () {
  return  \Redirect::action('HomeController@index');
});

Route::get('/registro', 'UserAllController@reg_create');
Route::post('/registro', 'UserAllController@store');


Auth::routes();
Route::post('autenticacion', 'HomeController@login')->name('autenticacion');

Route::get('/activate', function () {
  return view('auth.activate');
});

Route::get('/sendValidator/{id}', 'HomeController@sendValidator');


Route::prefix('backend')->group(function () {
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
