<?php

namespace SisLogUCAB\Http\Controllers;

use Illuminate\Http\Request;

use SisLogUCAB\Barco;

use DB;

class BarcosController extends Controller
{

    public function index()
    {
        
        $barcos=Barco::all();

        return view("barcos.index", compact("barcos"));

    }

    public function indexDelete()
    {

        $barcos=Barco::all();

        return view("barcos.delete", compact("barcos"));

    }

    public function indexUpdate()
    {

        $barcos=Barco::all();

        return view("barcos.edit", compact("barcos"));

    }

    public function create()
    {

        $sucursales=DB::table('sucursal')->get();

        return view("barcos.create", ["sucursales"=>$sucursales]);

    }

    public function store(Request $request)
    {
        $barco=new Barco;

        $barco->peso=$request->peso;
        $barco->tipo_vehiculo=$request->tipo_vehiculo;
        $barco->capacidad_carga=$request->capacidad_carga;
        $barco->descripcion=$request->descripcion;
        $barco->clasificacion=$request->clasificacion;
        $barco->tipo_vehiculo='maritimo';
        $barco->num_pisos=$request->num_pisos;
        $barco->propulsion=$request->propulsion;
        $barco->velocidad_max=$request->velocidad_max;
        $barco->fk_sucursal=$request->fk_sucursal;

        $barco->save();

        return redirect('barcos/create');

    }

    public function show($id)
    {
        //
    }

    public function edit($codigo)
    {
        $barco = Barco::where('codigo',$codigo)->first();
        $sucursales = DB::table('sucursal')->get();
        return view('barcos.update',["barco"=>$barco, "sucursales"=>$sucursales]);
    }


    public function update(Request $request, $codigo)
    {
        $nuevoPeso= $request->input('peso');
        $nuevoCapacidad_carga = $request->input('capacidad_carga');
        $nuevoDescripcion = $request->input('descripcion');
        $nuevoClasificacion = $request->input('clasificacion');
        $nuevoPropulsion= $request->input('propulsion');
        $nuevoNum_pisos = $request->input('num_pisos');
        $nuevoVelocidad_max = $request->input('velocidad_max');
        $nuevoFk_sucursal = $request->input('fk_sucursal');
        //----------------------------------------------
        $barco = Barco::find($codigo);
        $barco->peso = $nuevoPeso;
        $barco->capacidad_carga = $nuevoCapacidad_carga;
        $barco->descripcion = $nuevoDescripcion;
        $barco->clasificacion = $nuevoClasificacion;
        $barco->propulsion = $nuevoPropulsion;
        $barco->num_pisos = $nuevoNum_pisos;
        $barco->velocidad_max = $nuevoVelocidad_max;
        $barco->fk_sucursal = $nuevoFk_sucursal;

        $barco->save();

        return redirect('barcos/update');
    }


    public function destroy($codigo)
    {

       Barco::destroy($codigo);

       return redirect('barcos/delete');

    }
}