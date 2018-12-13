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

/*Route::get('/clientes/borrar',function(){
	
	return view('clientes.delete');
});*/

Route::get('/clientes/create','ClientesController@create');
Route::get('/clientes','ClientesController@index');
Route::post('/clientes','ClientesController@store');
Route::get('/clientes/delete','ClientesController@indexDelete');
Route::get('/clientes/update','ClientesController@indexUpdate');
Route::get('/clientes/edit/{codigo}', 'ClientesController@edit');
Route::post('clientes/update/{codigo}','ClientesController@update');
Route::get('/clientes/{codigo}','ClientesController@destroy');
//
Route::get('/roles/create','RolesController@create');
Route::get('/roles','RolesController@index');
Route::post('/roles','RolesController@store');
Route::get('/roles/delete','RolesController@indexDelete');
Route::get('/roles/update','RolesController@indexUpdate');
Route::get('/roles/edit/{codigo}', 'RolesController@edit');
Route::post('roles/update/{codigo}','RolesController@update');
Route::get('/roles/{codigo}','RolesController@destroy');
//
Route::get('/sucursales/create','SucursalesController@create');
Route::get('/sucursales','SucursalesController@index');
Route::post('/sucursales','SucursalesController@store');
Route::get('/sucursales/delete','SucursalesController@indexDelete');
Route::get('/sucursales/update','SucursalesController@indexUpdate');
Route::get('/sucursales/edit/{codigo}', 'SucursalesController@edit');
Route::post('sucursales/update/{codigo}','SucursalesController@update');
Route::get('/sucursales/{codigo}','SucursalesController@destroy');
//
Route::get('/automoviles/create','AutomovilesController@create');
Route::get('/automoviles','AutomovilesController@index');
Route::post('/automoviles','AutomovilesController@store');
Route::get('/automoviles/delete','AutomovilesController@indexDelete');
Route::get('/automoviles/update','AutomovilesController@indexUpdate');
Route::get('/automoviles/edit/{codigo}', 'AutomovilesController@edit');
Route::post('automoviles/update/{codigo}','AutomovilesController@update');
Route::get('/automoviles/{codigo}','AutomovilesController@destroy');
//
Route::get('/aviones/create','AvionesController@create');
Route::get('/aviones','AvionesController@index');
Route::post('/aviones','AvionesController@store');
Route::get('/aviones/delete','AvionesController@indexDelete');
Route::get('/aviones/update','AvionesController@indexUpdate');
Route::get('/aviones/edit/{codigo}', 'AvionesController@edit');
Route::post('aviones/update/{codigo}','AvionesController@update');
Route::get('/aviones/{codigo}','AvionesController@destroy');
//ABAJO VA BARCO XD
Route::get('/usuarios/create','UsuariosController@create');
Route::get('/usuarios','UsuariosController@index');
Route::post('/usuarios','UsuariosController@store');
Route::get('/usuarios/delete','UsuariosController@indexDelete');
Route::get('/usuarios/update','UsuariosController@indexUpdate');
Route::get('/usuarios/edit/{codigo}', 'UsuariosController@edit');
Route::post('usuarios/update/{codigo}','UsuariosController@update');
Route::get('/usuarios/{codigo}','UsuariosController@destroy');
//


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