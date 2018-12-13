<?php

namespace SisLogUCAB\Http\Controllers;

use Illuminate\Http\Request;

use SisLogUCAB\Automovil;

use DB;

class AutomovilesController extends Controller
{

    public function index()
    {
        
        $automoviles=Automovil::all();

        return view("automoviles.index", compact("automoviles"));

    }

    public function indexDelete()
    {

        $automoviles=Automovil::all();

        return view("automoviles.delete", compact("automoviles"));

    }

    public function indexUpdate()
    {

        $automoviles=Automovil::all();

        return view("automoviles.edit", compact("automoviles"));

    }

    public function create()
    {

        $sucursales=DB::table('sucursal')->get();
        $modelos=DB::table('modelo')->get();

        return view("automoviles.create", ["sucursales"=>$sucursales], ["modelos"=>$modelos]);

    }

    public function store(Request $request)
    {
        $automovil=new Automovil;

        $automovil->peso=$request->peso;
        $automovil->tipo_vehiculo=$request->tipo_vehiculo;
        $automovil->capacidad_carga=$request->capacidad_carga;
        $automovil->descripcion=$request->descripcion;
        $automovil->clasificacion=$request->clasificacion;
        $automovil->tipo_vehiculo='terrestre';
        $automovil->serial_carroceria=$request->serial_carroceria;
        $automovil->serial_motor=$request->serial_motor;
        $automovil->fk_modelo=$request->fk_modelo;
        $automovil->fk_sucursal=$request->fk_sucursal;

        $automovil->save();

        return redirect('automoviles/create');

    }

    public function show($id)
    {
        //
    }

    public function edit($codigo)
    {
        $automovil = automovil::where('codigo',$codigo)->first();
        $sucursales = DB::table('sucursal')->get();
        $modelos = DB::table('modelo')->get();
        return view('automoviles.update',["automovil"=>$automovil, "sucursales"=>$sucursales], ["modelos"=>$modelos]);
    }


    public function update(Request $request, $codigo)
    {
        $nuevoPeso= $request->input('peso');
        $nuevoCapacidad_carga = $request->input('capacidad_carga');
        $nuevoDescripcion = $request->input('descripcion');
        $nuevoClasificacion = $request->input('clasificacion');
        $nuevoSerial_carroceria = $request->input('serial_carroceria');
        $nuevoSerial_motor = $request->input('serial_motor');
        $nuevoFk_modelo = $request->input('fk_modelo');
        $nuevoFk_sucursal = $request->input('fk_sucursal');
        //----------------------------------------------
        $automovil = Automovil::find($codigo);
        $automovil->peso = $nuevoPeso;
        $automovil->capacidad_carga = $nuevoCapacidad_carga;
        $automovil->descripcion = $nuevoDescripcion;
        $automovil->clasificacion = $nuevoClasificacion;
        $automovil->serial_carroceria = $nuevoSerial_carroceria;
        $automovil->serial_motor = $nuevoSerial_motor;
        $automovil->fk_modelo = $nuevoFk_modelo;
        $automovil->fk_sucursal = $nuevoFk_sucursal;

        $automovil->save();

        return redirect('automoviles/update');
    }


    public function destroy($codigo)
    {

       Automovil::destroy($codigo);

       return redirect('automoviles/delete');

    }
}