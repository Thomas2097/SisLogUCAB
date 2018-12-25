<?php

namespace SisLogUCAB\Http\Controllers;

use Illuminate\Http\Request;

use SisLogUCAB\Paquete;

use DB;

class PaquetesController extends Controller
{
	public function index()
    {
        
        $paquetes=Paquete::all();

        return view("paquetes.index", compact("paquetes"));

    }

    public function indexDelete()
    {

        $paquetes=Paquete::all();

        return view("paquetes.delete", compact("paquetes"));

    }

    public function indexUpdate()
    {

        $paquetes=Paquete::all();

        return view("paquetes.edit", compact("paquetes"));

    }


    public function create()
    {
<<<<<<< HEAD

    	$paquetes= DB::table('paquete')->get();
        return view("paquetes.create", ["paquetes"=>$paquetes]);
=======
    	$sucursales= DB::table('sucursal')->get();
        $tipos_productos= DB::table('tipo_producto')->get();
        $clientes= DB::table('cliente')->get();
        $destinatarios= DB::table('destinatario')->get();
        return view("paquetes.create", ["sucursales"=>$sucursales,"tipos_productos"=>$tipos_productos,"clientes"=>$clientes,"destinatarios"=>$destinatarios]);
>>>>>>> 4bf7780ef99c7f2ca779d8aca808885f25b54834

    }

    public function store(Request $request)
    {
<<<<<<< HEAD
        $paquete=new Paquete;

        $paquete->nombre=$request->nombre;
        $paquete->contraseña=$request->contraseña;
        $usuario->fk_rol=$request->fk_rol;

        $paquete->save();
        
        return redirect('paquetes/create');
=======

        $paquete=new Paquete;

        $paquete->fecha_entrega=$request->fecha_entrega;
        $paquete->peso=$request->peso;
        $paquete->alto=$request->alto;
        $paquete->ancho=$request->ancho;
        $paquete->profundidad=$request->profundidad;
        $paquete->fk_tipo_producto=$request->fk_tipo_producto;
        $paquete->fk_cliente=$request->fk_cliente;
        $paquete->fk_destinatario=$request->fk_destinatario;
        $paquete->fk_sucursal_origen=$request->fk_sucursal_origen;
        $paquete->fk_sucursal_destino=$request->fk_sucursal_destino;

        $paquete->save();
        
        return redirect('envios/create');
>>>>>>> 4bf7780ef99c7f2ca779d8aca808885f25b54834

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