<?php

namespace SisLogUCAB\Http\Controllers;

use Illuminate\Http\Request;

use SisLogUCAB\Usuario;

use SisLogUCAB\Cliente;

use DB;

class UsuariosController extends Controller
{
	public function index()
    {
        
        $usuarios=Usuario::all();

        return view("usuarios.index", compact("usuarios"));

    }

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


    public function create()
    {
    	$roles= DB::table('rol')->get();
        return view("usuarios.create", ["roles"=>$roles]);

    }

    public function store(Request $request)
    {
        $usuario=new Usuario;

        $usuario->nombre=$request->nombre;
        $usuario->contraseña=$request->contraseña;
        $usuario->fk_rol=$request->fk_rol;

        $usuario->save();
        
        return redirect('usuarios/create');

    }

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
       Usuario::destroy($codigo);
       return redirect('usuarios/delete');

    }
}