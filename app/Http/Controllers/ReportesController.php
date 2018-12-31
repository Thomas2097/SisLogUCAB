<?php

namespace SisLogUCAB\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class ReportesController extends Controller
{

	public function index11()
	{

		$a = DB::select(DB::raw("SELECT s.nombre as nom_env,z.nombre as nom_rec from sucursal s,sucursal z where
		s.codigo=(select mode() within group (order by fk_sucursal_origen)
		FROM paquete) and z.codigo=(select mode() within group (order by fk_sucursal_destino)
		FROM paquete);"));

		return view("reportes.indexReporte11", compact('a'));

	}

	public function index13()
	{

		$suc = DB::select(DB::raw("SELECT s.nombre as nombre,round(avg(p.peso)::numeric,2) as prom
		from paquete p,sucursal s
		group by s.codigo,s.nombre,p.fk_sucursal_origen having(s.codigo=p.fk_sucursal_origen);"));

		return view("reportes.indexReporte13", compact('suc'));

	}

	public function index14()
	{

		$mes = DB::select(DB::raw("SELECT mode() within group (order by to_char(fecha_inicio, 'Mon')) as nombre from envio;"));

		return view("reportes.indexReporte14", compact('mes'));

	}

	public function index15()
	{

		$ruta = DB::select(DB::raw("SELECT r.nombre as nombre,s.nombre as nombres1,z.nombre as nombres2
		from ruta r,sucursal s, sucursal z
		where r.codigo = (SELECT mode() within group (order by fk_ruta)
		from envio ) and s.codigo = r.fk_sucursal_origen and z.codigo=r.fk_sucursal_destino;"));

		return view("reportes.indexReporte15", compact('ruta'));

	}

	public function index17()
	{ //Reporte: listado de empleados con las inasistencias

		$empleados = DB::select(DB::raw("SELECT e.codigo as codigo, e.cedula as cedula, e.nombre || ' ' || e.apellido as nombre_completo, a.asistio as asistio, a.fecha_trabajada as fecha_trabajada
		FROM empleado e, asistencia a, hor_emp he
		where e.codigo = he.fk_empleado and a.fk_hor_emp = he.codigo and a.asistio = 'no' 
		order by e.codigo desc;"));//no hace falta el order by

		return view("reportes.indexReporte17", compact('empleados'));

	}

	public function index18()
	{ //Reporte: listado de inasistencia indicando el horario asignado al empleado

		$empleados = DB::select(DB::raw("SELECT e.codigo as codigo, e.cedula as cedula, e.nombre || ' ' || e.apellido as nombre_completo, a.asistio as asistio, a.fecha_trabajada as fecha_trabajada, h.dia as dia, h.hora_ent as hora_ent, h.hora_sal as hora_sal
		FROM empleado e, horario h, asistencia a, hor_emp he
		where e.codigo = he.fk_empleado and a.fk_hor_emp = he.codigo and asistio = 'no' and h.codigo = he.fk_horario; "));

		return view("reportes.indexReporte18", compact('empleados'));

	}

	public function index22()
    { //Reporte: sucursales de puertos y aeropuertos
        
    	$puertos = DB::select(DB::raw("SELECT p.codigo as codigo, s.nombre as nombres, l.nombre as lugar, p.nombre as nombrep
    	FROM Sucursal s, Lugar l, Puerto p 
    	where s.codigo = p.fk_sucursal and l.codigo = p.fk_lugar;"));

    	$aeropuertos = DB::select(DB::raw("SELECT a.codigo as codigo, s.nombre as nombres, l.nombre as lugar, a.nombre as nombrea
    	FROM Sucursal s, Lugar l, Aeropuerto a
    	where s.codigo = a.fk_sucursal and l.codigo = a.fk_lugar;"));

    	return view("reportes.indexReporte22", compact('puertos'), compact('aeropuertos'));

    }

    public function index23()
    { // Reporte: histórico de revisión de la flota indicando taller, falla y duración de la revisión

    	$revisiones = DB::select(DB::raw("SELECT r.codigo as codigorevision, r.fecha_entrada as f_ent, r.fecha_sal_real as f_sal, r.fecha_prox as f_pro, r.falla as falla, t.nombre as nombretaller, a.codigo as codigoaut, s.nombre as nomsucursal
    		FROM aut_tal r, taller t, automovil a, sucursal s
    		where a.codigo = r.fk_automovil and t.codigo = r.fk_taller and s.codigo = a.fk_sucursal;"));

    	return view("reportes.indexReporte23", compact('revisiones'));

    }

    public function index24()
    {

    	$revisiones = DB::select(DB::raw("SELECT sum(r.costo) as total, s.nombre as nombresucursal
			from aut_tal r, sucursal s, automovil a
			where s.codigo = a.fk_sucursal and r.fk_automovil = a.codigo
			group by s.nombre;"));

    	return view("reportes.indexReporte24", compact('revisiones'));

    }
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

    }*/
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