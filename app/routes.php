<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


//Routes de inicio

Route::get('/hola',function(){
	return "HOLA MUNDO";
});
Route::group(array('before' => 'guest'), function(){
	Route::get('/',function(){
		return View::make('inicio.index');
	}) ;

	Route::get('/info',function(){
		return View::make('inicio.info');
	});

	Route::get('/contactos',function(){
		return View::make('inicio.contactos');
	});
});

//Routes home

Route::get('/home', array('before' => 'auth',function(){
	if(Auth::user()->is_activo){
		return View::make('usuario.home');
	}
	else{
		return View::make('usuario.inactivo');
	}
	
}));


//Routes de controladores

Route::controller('GestionUsuario','UsuarioController');
Route::controller('Autenticacion','AutenticacionController');
Route::controller('Administracion','AdministracionController');
