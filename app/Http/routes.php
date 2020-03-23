<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
resource('equipos','EquipoController');
resource('empresas','EmpresaController');
resource('clientes','ClienteController');
resource('productos','ProductoController');
resource('pagos','PagoController');
resource('registro_pagos','RegistroPagosController');
resource('archivo_pago','ArchivoPagoController');

Route::get('saludo','MensajeController@enviar_mensaje');
