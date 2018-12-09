<?php

namespace SisLogUCAB\Http\Controllers;

use Illuminate\Http\Request;

use SisLogUCAB\Cliente;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $clientes=Cliente::all();

        return view("clientes.index", compact("clientes"));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view("clientes.create");

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return view("clientes.modificar");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return view("clientes.eliminar");
    }
}

/*<?php

namespace SisLogUCAB\Http\Controllers;

use Illuminate\Http\Request;

class ClientesController extends Controller{

    public function inicio(){

        return view ("inicio");
    }

    public function crearCliente(){

        return view ("crearCliente");
    }

    public function modificarCliente(){

        return view ("modificarCliente");
    }

    public function consultarCliente(){

        return view ("consultarCliente");
    }

    public function eliminarCliente(){

        return view ("eliminarCliente");
    }
}*/