<?php

namespace SisLogUCAB\Http\Controllers;

use Illuminate\Http\Request;

use SisLogUCAB\Paquete;

use SisLogUCAB\Cliente;

use SisLogUCAB\Empleado;

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

    	$paquetes= DB::table('paquete')->get();
        return view("paquetes.create", ["paquetes"=>$paquetes]);

    }

    public function store(Request $request)
    {
        $paquete=new Paquete;

        $paquete->nombre=$request->nombre;
        $paquete->contraseña=$request->contraseña;
        $usuario->fk_rol=$request->fk_rol;

        $paquete->save();
        
        return redirect('paquetes/create');

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