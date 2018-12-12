<?php

namespace SisLogUCAB\Http\Controllers;

use Illuminate\Http\Request;

use SisLogUCAB\Sucursal;

use DB;

class SucursalesController extends Controller
{

    public function index()
    {
        
        $sucursales=Sucursal::all();

        return view("sucursales.index", compact("sucursales"));

    }

    public function indexDelete()
    {

        $sucursales=Sucursal::all();

        return view("sucursales.delete", compact("sucursales"));

    }

    public function indexUpdate()
    {

        $sucursales=Sucursal::all();

        return view("sucursales.edit", compact("sucursales"));

    }

    public function create()
    {

        $lugares=DB::table('lugar')->where('tipo','=','municipio')->get();

        return view("sucursales.create", ["lugares"=>$lugares]);

    }

    public function store(Request $request)
    {
        $sucursal=new Sucursal;

        $sucursal->nombre=$request->nombre;
        $sucursal->capacidad_m2=$request->capacidad_m2;
        $sucursal->correo=$request->correo;
        $sucursal->capacidad_alm=$request->capacidad_alm;
        $sucursal->fk_lugar=$request->fk_lugar;
        $sucursal->tam_deposito=$request->tam_deposito;

        $sucursal->save();

        return redirect('sucursales/create');

    }

    public function show($id)
    {
        //
    }

    public function edit($codigo)
    {

        $sucursal = Sucursal::where('codigo',$codigo)->first();
        $lugares = DB::table('lugar')->where('tipo', '=', 'municipio')->get();

        return view('sucursales.update',["sucursal"=>$sucursal, "lugares"=>$lugares]);

    }


    public function update(Request $request, $codigo)
    {
        $nuevoNombre = $request->input('nombre');
        $nuevoCorreo = $request->input('correo');
        $nuevoCapacidad_m2 = $request->input('capacidad_m2');
        $nuevoFk_lugar = $request->input('fk_lugar');
        $nuevoCapacidad_alm = $request->input('capacidad_alm');
        $nuevoTam_deposito = $request->input('tam_deposito');
        //----------------------------------------------
        $sucursal = Sucursal::find($codigo);
        $sucursal->nombre = $nuevoNombre;
        $sucursal->correo = $nuevoCorreo;
        $sucursal->capacidad_m2 = $nuevoCapacidad_m2;
        $sucursal->fk_lugar = $nuevoFk_lugar;
        $sucursal->capacidad_alm = $nuevoCapacidad_alm;
        $sucursal->tam_deposito = $nuevoTam_deposito;
    
        $sucursal->save();

        return redirect('sucursales/update');
    }


    public function destroy($codigo)
    {

       Sucursal::destroy($codigo);

       return redirect('sucursales/delete');

    }
}