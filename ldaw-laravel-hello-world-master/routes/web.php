<?php

use Illuminate\Support\Facades\Route;

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



Route::get('/clase', function () {
    return view('mi-clase');
});

// Path de la ruta, 'NombreDelController@FunciónDentroDelController'

Route::view('/welcome', 'welcome');

Route::get('/prueba-controller', 'PruebaController@index');

Route::view('/dashboard', 'dashboard')
    ->middleware(['invitado']);

Route::resource('coins', 'CoinsController')
    ->middleware(['usuario','invitado']);

Route::resource('users', 'AuthController')
    ->middleware(['invitado','usuario']);

Route::get('register','AuthController@register')
    ->middleware(['validate_hour'])
    ->name('auth.register');

Route::post('register','AuthController@doRegister')
    ->name('auth.do-register');

Route::get('login','AuthController@login')
    ->middleware(['validate_hour'])
    ->name('auth.login');

Route::post('login','AuthController@doLogin')
    ->middleware(['validate_hour'])
    ->name('auth.do-login');

Route::any('logout', 'AuthController@logout')->name('auth.logout');
