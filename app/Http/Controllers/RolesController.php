<?php

namespace SisLogUCAB\Http\Controllers;

use Illuminate\Http\Request;

use SisLogUCAB\Rol;

use DB;

class RolesController extends Controller
{
	public function index()
    {
        
        $roles=Rol::all();

        return view("roles.index", compact("roles"));

    }

    public function indexDelete()
    {

        $roles=Rol::all();

        return view("roles.delete", compact("roles"));

    }

    public function indexUpdate()
    {

        $roles=Rol::all();

        return view("roles.edit", compact("roles"));

    }


    public function create()
    {

        return view("roles.create");

    }

    public function store(Request $request)
    {
        $rol=new Rol;

        $rol->nombre=$request->nombre;

        $rol->save();
        
        return redirect('roles/create');

    }

    public function show($id)
    {
        //
    }

    public function edit($codigo)
    {
        $rol = Rol::where('codigo',$codigo)->first();
        return view('roles.update',["rol"=>$rol]);
        //return view("clientes.edit", ["cliente"=>Cliente::findOrFail($codigo)]);
    }


    public function update(Request $request, $codigo)
    {
        $nuevoNombre= $request->input('nombre');
        //----------------------------------------------
        $rol = Rol::find($codigo);
        $rol->nombre = $nuevoNombre;
        $rol->save();

        return redirect('roles/update');
    }


    public function destroy($codigo)
    {

       Rol::destroy($codigo);

       return redirect('roles/delete');

    }
}