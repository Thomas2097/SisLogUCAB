<?php

namespace SisLogUCAB\Http\Controllers;

use Illuminate\Http\Request;

use SisLogUCAB\Cliente;

use SisLogUCAB\Usuario;

use DB;

class ClientesController extends Controller
{

    public function preIndex()
    {

        return view("clientes.pre-index");

    }

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

        return view("clientes.edit", compact("clientes"));

    }

    public function create()
    {

        $lugares=DB::table('lugar')->where('tipo','=','parroquia')->get();

        return view("clientes.create", ["lugares"=>$lugares]);

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
        //$cliente->fk_usuario=$request->fk_usuario;

        $usuario= Usuario::Where('nombre',$request->cedula)->first();
        $cliente->fk_usuario=$usuario->codigo;

        $cliente->save();
        return redirect('clientes/create');

    }

    public function show($id)
    {
        //
    }

    public function edit($codigo)
    {
        $cliente = Cliente::where('codigo',$codigo)->first();
        $lugares = DB::table('lugar')->where('tipo', '=', 'parroquia')->get();
        return view('clientes.update',["cliente"=>$cliente, "lugares"=>$lugares]);
    }


    public function update(Request $request, $codigo)
    {
        $nuevoCedula= $request->input('cedula');
        $nuevoNombre = $request->input('nombre');
        $nuevoApellido = $request->input('apellido');
        $nuevoFecha_nac = $request->input('fecha_nac');
        $nuevoFk_lugar = $request->input('fk_lugar');
        $nuevoEdo_civil = $request->input('edo_civil');
        $nuevoEmpresa = $request->input('empresa');
        $nuevoLvip = $request->input('lvip');
        //----------------------------------------------
        $cliente = Cliente::find($codigo);
        $cliente->cedula = $nuevoCedula;
        $cliente->nombre = $nuevoNombre;
        $cliente->apellido = $nuevoApellido;
        $cliente->fecha_nac = $nuevoFecha_nac;
        $cliente->fk_lugar = $nuevoFk_lugar;
        $cliente->edo_civil = $nuevoEdo_civil;
        $cliente->empresa = $nuevoEmpresa;
        $cliente->lvip = $nuevoLvip;
        $cliente->save();

        return redirect('clientes/update');
    }


    public function destroy($codigo)
    {

       Cliente::destroy($codigo);

       return redirect('clientes/delete');

    }

    public function carnet()
    {

        $vip = DB::select(DB::raw("SELECT distinct c.codigo as codigo,
        c.nombre||' '||c.apellido as nombre,c.cedula as cedula, lvip as lvip,
        MIN(s.codigo||'-'||c.cedula||'-'||c.codigo) as codigo_carnet
        from cliente c,sucursal s,paquete p
        where lvip='si' and p.fk_cliente = c.codigo and p.fk_sucursal_origen = s.codigo
        group by c.codigo
        order by c.codigo"));

        return view("clientes.vip", compact('vip'));

    }

    public function generarCarnet($codigo)
    {

        $vip = DB::select(DB::raw("SELECT distinct c.codigo as codigo,
        c.nombre||' '||c.apellido as nombre,c.cedula as cedula, lvip as lvip,
        MIN(s.codigo||'-'||c.cedula||'-'||c.codigo) as codigo_carnet
        from cliente c,sucursal s,paquete p
        where c.codigo = ? and lvip='si' and p.fk_cliente = c.codigo and p.fk_sucursal_origen = s.codigo
        group by c.codigo
        order by c.codigo"),[$codigo]);

        return view("clientes.carnet", ["vip"=>$vip]);


    }
}