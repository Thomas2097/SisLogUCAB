<?php

namespace SisLogUCAB\Http\Controllers;

use Illuminate\Http\Request;

use SisLogUCAB\Avion;

use DB;

class AvionesController extends Controller
{

    public function index()
    {
        
        $aviones=Avion::all();

        return view("aviones.index", compact("aviones"));

    }

    public function indexDelete()
    {

        $aviones=Avion::all();

        return view("aviones.delete", compact("aviones"));

    }

    public function indexUpdate()
    {

        $aviones=Avion::all();

        return view("aviones.edit", compact("aviones"));

    }

    public function create()
    {

        $sucursales=DB::table('sucursal')->get();
        $modelos=DB::table('modelo')->get();

        return view("aviones.create", ["sucursales"=>$sucursales], ["modelos"=>$modelos]);

    }

    public function store(Request $request)
    {
        $avion=new Avion;

        $avion->peso=$request->peso;
        $avion->longitud=$request->longitud;
        $avion->capacidad_carga=$request->capacidad_carga;
        $avion->descripcion=$request->descripcion;
        $avion->clasificacion=$request->clasificacion;
        $avion->tipo_vehiculo='aereo';
        $avion->envergadura=$request->envergadura;
        $avion->area=$request->area;
        $avion->altura=$request->altura;
        $avion->cap_combustible=$request->cap_combustible;
        $avion->diam_fuselaje=$request->diam_fuselaje;
        $avion->ancho_cabina=$request->ancho_cabina;
        $avion->velocidad_max=$request->velocidad_max;
        $avion->peso_max=$request->peso_max;
        $avion->num_motores=$request->num_motores;
        $avion->car_despegue=$request->car_despegue;
        $avion->fk_modelo=$request->fk_modelo;
        $avion->fk_sucursal=$request->fk_sucursal;

        $avion->save();

        return redirect('aviones/create');

    }

    public function show($id)
    {
        //
    }

    public function edit($codigo)
    {
        $avion = avion::where('codigo',$codigo)->first();
        $sucursales = DB::table('sucursal')->get();
        $modelos = DB::table('modelo')->get();
        return view('aviones.update',["avion"=>$avion, "sucursales"=>$sucursales], ["modelos"=>$modelos]);
    }


    public function update(Request $request, $codigo)
    {
        $nuevoPeso= $request->input('peso');
        $nuevoCapacidad_carga = $request->input('capacidad_carga');
        $nuevoDescripcion = $request->input('descripcion');
        $nuevoClasificacion = $request->input('clasificacion');
        $nuevoLongitud = $request->input('longitud');
        $nuevoEnvergadura = $request->input('envergadura');
        $nuevoFk_modelo = $request->input('fk_modelo');
        $nuevoFk_sucursal = $request->input('fk_sucursal');
        $nuevoArea = $request->input('area');
        $nuevoAltura = $request->input('altura');
        $nuevoCap_combustible = $request->input('cap_combustible');
        $nuevoDiam_fuselaje = $request->input('diam_fuselaje');
        $nuevoAncho_cabina = $request->input('ancho_cabina');
        $nuevoVelocidad_max = $request->input('velocidad_max');
        $nuevoPeso_max = $request->input('peso_max');
        $nuevoNum_motores = $request->input('num_motores');
        $nuevoCar_despegue = $request->input('car_despegue');
        //----------------------------------------------
        $avion = Avion::find($codigo);
        $avion->peso = $nuevoPeso;
        $avion->capacidad_carga = $nuevoCapacidad_carga;
        $avion->descripcion = $nuevoDescripcion;
        $avion->clasificacion = $nuevoClasificacion;
        $avion->longitud = $nuevoLongitud;
        $avion->envergadura = $nuevoEnvergadura;
        $avion->fk_modelo = $nuevoFk_modelo;
        $avion->fk_sucursal = $nuevoFk_sucursal;
        $avion->area= $nuevoArea;
        $avion->altura= $nuevoAltura;
        $avion->cap_combustible= $nuevoCap_combustible;
        $avion->diam_fuselaje= $nuevoDiam_fuselaje;
        $avion->ancho_cabina= $nuevoAncho_cabina;
        $avion->velocidad_max= $nuevoVelocidad_max;
        $avion->peso_max= $nuevoPeso_max;
        $avion->num_motores= $nuevoNum_motores;
        $avion->car_despegue= $nuevoCar_despegue;

        $avion->save();

        return redirect('aviones/update');
    }


    public function destroy($codigo)
    {

       Avion::destroy($codigo);

       return redirect('aviones/delete');

    }
}