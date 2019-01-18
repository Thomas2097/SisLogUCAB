<?php

namespace SisLogUCAB\Http\Controllers;

use Illuminate\Http\Request;

use SisLogUCAB\Envio;

use DB;

class EnviosController extends Controller
{
	public function index()
    {
        
        $envios=Envio::all();

        return view("envios.index", compact("envios"));

    }
/*
    public function indexDelete()
    {

        $usuarios=Usuario::all();

        return view("usuarios.delete", compact("usuarios"));

    }

    public function indexUpdate()
    {

        $usuarios=Usuario::all();

        return view("usuarios.edit", compact("usuarios"));

    }
*/

    public function create2()
    {
    	$paquetes= DB::table('paquete')->get();
        $rutas= DB::table('ruta')->get();
        $sucursales = DB::table('sucursal')->get();
        return view("envios.create2", ["paquetes"=>$paquetes,"rutas"=>$rutas,"sucursales"=>$sucursales]);

    }
    public function store2(Request $request)
    {

        $envio=new Envio;

        $envio->fecha_inicio=$request->fecha_inicio;
        $envio->fecha_entrega=$request->fecha_entrega;
        $envio->fk_paquete=$request->fk_paquete;
        $envio->fk_ruta=$request->fk_ruta;
        $envio->fk_sucursal_origen=$request->fk_sucursal_origen;
        $envio->fk_sucursal_destino=$request->fk_sucursal_destino;

        $envio->save();

        return redirect('envios/create2');


    }
    public function store(Request $request)
    {
        $h = $request->input('fk_ruta');
        $fecha_inicio = $request->input('fecha_inicio');
        $fecha_entrega = $request->input('fecha_entrega');
        $fk_paquete = $request->input('fk_paquete');
        $or = DB::select('select fk_sucursal_origen from ruta  where codigo = ?',[$h]);
        $de = DB::select('select fk_sucursal_destino from ruta  where codigo = ?',[$h]);
        DB::insert('Insert into Envio (fecha_inicio, fecha_entrega, fk_paquete, fk_ruta, fk_sucursal_origen, fk_sucursal_destino) values(?,?,?,?,?,?)',[$fecha_inicio,$fecha_entrega,$fk_paquete,$h,$or[0]->fk_sucursal_origen,$de[0]->fk_sucursal_destino]);
        /*$*/
        
        return redirect('envios');

    }
}
/*
    public function show($id)
    {
        //
    }

    public function edit($codigo)
    {

        $usuario = Usuario::where('codigo',$codigo)->first();
        $roles = DB::table('rol')->get();

        return view('usuarios.update',["usuario"=>$usuario],["roles"=>$roles]);

    }


    public function update(Request $request, $codigo)
    {
        $nuevoNombre= $request->input('nombre');
        $nuevoContraseña= $request->input('contraseña');
        $nuevoFk_rol= $request->input('fk_rol');
        //----------------------------------------------
        $usuario = Usuario::find($codigo);
        $usuario->nombre = $nuevoNombre;
        $usuario->contraseña = $nuevoContraseña;
        $usuario->fk_rol = $nuevoFk_rol;

        $usuario->save();

        return redirect('usuarios/update');
    }


    public function destroy($codigo)
    {

		Cliente::where('fk_usuario','=',$codigo)->delete();
        Empleado::where('fk_usuario','=',$codigo)->delete();
       	Usuario::destroy($codigo);
       	return redirect('usuarios/delete');

    }
}*/