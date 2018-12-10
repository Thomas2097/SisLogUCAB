<?php

namespace SisLogUCAB\Http\Controllers;

use Illuminate\Http\Request;

use SisLogUCAB\Cliente;

class ClientesController extends Controller
{

    public function index()
    {
        
        $clientes=Cliente::all();

        return view("clientes.index", compact("clientes"));

    }

    public function indexDelete()
    {
        $clientes=Cliente::all();

        return view("clientes.delete", compact("clientes"));

    }

    public function indexUpdate()
    {
        $clientes=Cliente::all();

        return view("clientes.update", compact("clientes"));

    }

    public function create()
    {
        
        return view("clientes.create");

    }

    public function store(Request $request)
    {
        $cliente=new Cliente;

        $cliente->cedula=$request->cedula;
        $cliente->nombre=$request->nombre;
        $cliente->apellido=$request->apellido;
        $cliente->fecha_nac=$request->fecha_nac;
        $cliente->fk_lugar=$request->fk_lugar;
        $cliente->edo_civil=$request->edo_civil;
        $cliente->empresa=$request->empresa;
        $cliente->lvip=$request->lvip;
        $cliente->fk_usuario=$request->fk_usuario;

        $cliente->save();
        return view("clientes.create");

    }

    public function show($id)
    {
        //
    }
/*
    public function edit($codigo)
    {

    }


    public function update(Request $request, $codigo)
    {
        //return view("clientes.modificar");
    }

*/
    public function destroy($codigo)
    {

       Cliente::destroy($codigo);

    }
}