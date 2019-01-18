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

/*
    	$sucursales= DB::table('sucursal')->get();
        $tipos_productos= DB::table('tipo_producto')->get();
        $clientes= DB::table('cliente')->get();
        $destinatarios= DB::table('destinatario')->get();
        return view("paquetes.create", ["sucursales"=>$sucursales,"tipos_productos"=>$tipos_productos,"clientes"=>$clientes,"destinatarios"=>$destinatarios]);*/

        $sucursales= DB::table('sucursal')->get();
        $tipos_productos= DB::table('tipo_producto')->get();
        $clientes= DB::table('cliente')->get();
        $destinatarios= DB::table('destinatario')->get();
        return view("paquetes.create", ["sucursales"=>$sucursales,"tipos_productos"=>$tipos_productos,"clientes"=>$clientes,"destinatarios"=>$destinatarios]);


    }

    public function store(Request $request)
    {

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
        $si = 'si';
        $x = $paquete->fk_cliente;
    $c = DB::select('select count(p.fk_cliente) from cliente c, paquete p where p.fk_cliente = ? and p.fk_cliente = c.codigo group by fk_cliente',[$x]);
    //$c2=$c[0];
    $cuatro= 4;
    if ($c>$cuatro){

        DB::update('update cliente set lvip = ? where codigo = ?',[$si,$x]);


        }
        //$sucursales = DB::table('sucursal')->get();
        $x = DB::select('select r.nombre, r.codigo
            from ruta r
            where r.fk_sucursal_origen = ? ',[$paquete->fk_sucursal_origen]);
        $paq = DB::select('select p.codigo from paquete p where p.codigo = ?',[$paquete->codigo]);
        
        return view("envios.create", compact('x'),compact('paq'));
        //return redirect('envios/create');
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