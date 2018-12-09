<?php

use SisLogUCAB\Cliente;
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

Route::resource('/clientes','ClientesController');


/*Route::get('/crearCliente','ClientesController@create');

Route::get('/modificarCliente','ClientesController@update');

Route::get('/eliminarCliente','ClientesController@destroy');*/
/*
Route:: get("/leer", function(){


	$clientes=SisLogUCAB\Cliente::where("nombre","jose")->get();

	return $clientes;
	/*
	$clientes=SisLogUCAB\Cliente::all();

	foreach($clientes as $cliente) {
		echo $cliente->nombre;
		echo $cliente->cedula;
		echo $cliente->
	}
});

Route:: get("/insertar", function(){

	$clientes= new Cliente;

	$clientes->nombre="Armando";
	$clientes->apellido="xddd";
	$clientes->cedula=23443;
	$clientes->fecha_nac="19-09-1999";
	$clientes->edo_civil="soltero";
	$clientes->empresa="ajaja";
	$clientes->lvip="no";
	$clientes->fk_lugar=1;
	$clientes->fk_usuario=10;

	$clientes->save();

});

Route:: get("/actualizar", function(){
	$clientes= Cliente::find(8);

	$clientes->nombre="Armando";
	$clientes->apellido="Linares";
	$clientes->cedula=21;
	$clientes->fecha_nac="19-09-1999";
	$clientes->edo_civil="soltero";
	$clientes->empresa="ajaja";
	$clientes->lvip="no";
	$clientes->fk_lugar=1;
	$clientes->fk_usuario=10;

	$clientes->save();

});

Route:: get("/eliminar", function(){

	$clientes= Cliente::find(8);

	$clientes->delete();
});*/
/*
Route::get('/cliente', 'ClientesController@inicio');
Route::get('/crearCliente', 'ClientesController@crearCliente');
Route::get('/modificarCliente', 'ClientesController@modificarCliente');
Route::get('/consultarCliente', 'ClientesController@consultarCliente');
Route::get('/eliminarCliente', 'ClientesController@eliminarCliente');*/