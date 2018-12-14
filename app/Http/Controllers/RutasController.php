<?php

namespace SisLogUCAB\Http\Controllers;

use Illuminate\Http\Request;

use SisLogUCAB\Ruta;

use SisLogUCAB\Sucursal;

use DB;

class RutasController extends Controller
{
	public function index()
    {
        
        $rutas=Ruta::all();

        return view("rutas.index", compact("rutas"));

    }

    public function indexDelete()
    {

        $rutas=Ruta::all();

        return view("rutas.delete", compact("rutas"));

    }

    public function indexUpdate()
    {

        $rutas=Ruta::all();

        return view("rutas.edit", compact("rutas"));

    }


    public function create()
    {

    	$sucursales= DB::table('sucursal')->get();
        return view("rutas.create", ["sucursales"=>$sucursales]);

    }

    public function store(Request $request)
    {
        $ruta=new Ruta;

        $ruta->nombre=$request->nombre;
        $ruta->tipo=$request->tipo;
        $ruta->costo=$request->costo;
        $ruta->fk_sucursal_origen=$request->fk_sucursal_origen;
        $ruta->fk_sucursal_destino=$request->fk_sucursal_destino;

        $ruta->save();
        
        return redirect('rutas/create');

    }

    public function show($id)
    {
        //
    }

    public function edit($codigo)
    {

        $ruta = Ruta::where('codigo',$codigo)->first();
        $sucursales = DB::table('sucursal')->get();
        $sucursales2 = DB::table('sucursal')->get();
        return view('rutas.update',["ruta"=>$ruta,"sucursales"=>$sucursales,"sucursales2"=>$sucursales2]);

    }


    public function update(Request $request, $codigo)
    {
        $nuevoNombre= $request->input('nombre');
        $nuevoTipo= $request->input('tipo');
        $nuevoCosto= $request->input('costo');
        $nuevoFk_sucursal_origen= $request->input('fk_sucursal_origen');
        $nuevoFk_sucursal_destino= $request->input('fk_sucursal_destino');
        //----------------------------------------------
        $ruta = Ruta::find($codigo);
        $ruta->nombre = $nuevoNombre;
        $ruta->tipo = $nuevoTipo;
        $ruta->costo = $nuevoCosto;
        $ruta->fk_sucursal_origen = $nuevoFk_sucursal_origen;
        $ruta->fk_sucursal_destino = $nuevoFk_sucursal_destino;

        $ruta->save();

        return redirect('rutas/update');
    }


    public function destroy($codigo)
    {

       	Ruta::destroy($codigo);
       	return redirect('rutas/delete');

    }
}