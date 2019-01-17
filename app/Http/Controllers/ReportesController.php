<?php

namespace SisLogUCAB\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class ReportesController extends Controller
{

	/*public function index4(){

		$recibo = DB::select(DB::raw("SELECT e.codigo as codigo_envio,p.monto_total,p.fecha_pago,tp.tipo
			FROM envio e, pago p,tipo_pago tp, paquete pq
			where pq.codigo = p.fk_paquete and p.fk_tipo_pago =tp.codigo and e.fk_paquete = pq.codigo
			order by e.codigo"));

		return view("reportes.indexReporte4", compact('recibo'));

	}*/



	public function index11()
	{

		$a = DB::select(DB::raw("SELECT s.nombre as nom_env,z.nombre as nom_rec,
			(select count(fk_sucursal_origen) as paq_enviados from paquete group by fk_sucursal_origen order by paq_enviados desc limit 1),
			(select count(fk_sucursal_destino) as paq_recibidos from paquete group by fk_sucursal_destino order by paq_recibidos desc limit 1)
			from sucursal s,sucursal z where
			s.codigo=(select mode() within group (order by fk_sucursal_origen)
			from paquete) and z.codigo=(select mode() within group (order by fk_sucursal_destino)
			from paquete)"));

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

		$mes = DB::select(DB::raw("SELECT (to_char(fecha_inicio,'Month'))as mes,count(to_char(fecha_inicio,'Month')) as envios
		from envio
		group by to_char(fecha_inicio,'Month') order by envios desc limit 1
		"));

		return view("reportes.indexReporte14", compact('mes'));

	}

	public function index15()
	{

		$ruta = DB::select(DB::raw("SELECT r.nombre as nombre,s.nombre as origen,z.nombre as destino,(select count(fk_Ruta)as num_usada from envio 
			group by fk_ruta order by num_usada desc limit 1)
			from ruta r,sucursal s, sucursal z
			where r.codigo = (SELECT mode() within group (order by fk_ruta)
			from envio ) and s.codigo = r.fk_sucursal_origen and z.codigo=r.fk_sucursal_destino"));

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

	public function index19()
	{

		$paq = DB::select(DB::raw("SELECT p.codigo as paquete,e.nombre as estado_paquete,ep.fecha_cambio as fecha
			from paquete p,estado_paquete e, est_paq ep
			where ep.fk_paquete = p.codigo and 
			ep.fk_Estado_paquete = e.codigo
			order by p.codigo"));

		return view("reportes.indexReporte19", compact('paq'));

	}

	public function index20()
	{

		$acc = DB::select(DB::raw("SELECT u.nombre as usuario,a.fecha_accion as fecha_accion,p.nombre as privilegio,r.nombre as rol
			from usuario u,accion a,usu_acc ua,privilegio p,acc_pri ap,rol r
			where ua.fk_usuario=u.codigo and ua.fk_accion=a.codigo
			and ap.fk_accion=a.codigo and ap.fk_privilegio = p. codigo and u.fk_rol=r.codigo"));

		return view("reportes.indexReporte20", compact('acc'));

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

    	$revisiones = DB::select(DB::raw("SELECT sum(r.costo) as total, s.nombre as nombresucursal,to_char(r.fecha_entrada, 'Month-yy') as fecha
			from aut_tal r, sucursal s, automovil a,taller t
			where s.codigo = a.fk_sucursal and r.fk_automovil = a.codigo and r.fk_taller = t.codigo
			group by s.nombre,to_char(r.fecha_entrada, 'Month-yy') 
			order by s.nombre,fecha;"));

    	return view("reportes.indexReporte24", compact('revisiones'));

    }

    public function index25()
    {

    	$suc = DB::select(DB::raw("SELECT s.nombre as nsuc,lu.nombre as estado from sucursal s,lugar l,lugar lu
			where s.fk_lugar=l.codigo and l.fk_lugar = lu.codigo
			group by s.nombre,lu.nombre,lu.codigo order by lu.codigo,s.nombre,lu.nombre"));

    	return view("reportes.indexReporte25", compact('suc'));

    }

    public function index26()
    {

    	$emp = DB::select(DB::raw("SELECT e.cedula as cedula,e.nombre as nombre ,e.apellido as apellido ,e.edo_civil as edo_civil,c.nombre as cargo, e.activo as activo,
			e.fecha_ingr as fecha_ingreso
			from empleado e,cargo c
			where e.fk_Cargo = c.codigo and e.activo = 'si'
			order by e.codigo"));	

    	return view("reportes.indexReporte26", compact('emp'));

    }

    public function index27()
    {

    	$emp = DB::select(DB::raw("SELECT e.cedula as cedula,e.nombre||' ' ||e.apellido as nombre_completo,e.edo_civil as edo_civil,c.nombre as cargo,
			e.fecha_ingr as fecha_ingreso,e.fecha_egre as fecha_egreso, e.activo as activo
			from empleado e,cargo c
			where e.fk_Cargo = c.codigo
			order by e.codigo;"));

    	$num = DB::select(DB::raw("SELECT (select count(*) from empleado where activo='si') as activos,(select count(*) from empleado where activo='no') as egresados;"));

    	return view("reportes.indexReporte27", compact('emp'), compact('num'));

    }

    public function index28()
    {

    	$rutas = DB::select(DB::raw("SELECT r.nombre as ruta,s.nombre as origen,z.nombre as destino
		from ruta r,sucursal s, sucursal z
		where s.codigo = r.fk_sucursal_origen and z.codigo=r.fk_sucursal_destino"));

    	return view("reportes.indexReporte28", compact('rutas'));

    }

    public function index29()
    {

    	$medio = DB::select(DB::raw("SELECT count(te.fk_tipo_envio) as total, t.nombre as nombre
		from tipo_envio as t, env_tip as te
		where te.fk_tipo_envio = t.codigo
		group by t.nombre
		order by count(te.fk_tipo_envio) desc  limit 1 ;"));

    	return view("reportes.indexReporte29", compact('medio'));

    }

    public function index34()
    {

    	$clientes = DB::select(DB::raw("SELECT c.nombre||' '||c.apellido as nombre,c.cedula as cedula,count(p.fk_cliente) as paquetes_enviados
			from cliente c, paquete p
			where fk_cliente = c.codigo and lvip='si'
			group by c.nombre,c.apellido,c.cedula
			order by nombre asc"));

    	return view("reportes.indexReporte34", compact('clientes'));

    }

    public function index38()
    {

    	$vehiculos = DB::select(DB::raw("SELECT nombre,tipo_vehiculo,descripcion,capacidad_carga, automovil.codigo as codigo
		from automovil ,sucursal
		where fk_sucursal = sucursal.codigo 
		UNION ALL
		SELECT nombre,tipo_vehiculo,descripcion,capacidad_carga, avion.codigo as codigo
		from avion, sucursal
		where fk_sucursal = sucursal.codigo
		UNION ALL
		SELECT nombre,tipo_vehiculo,descripcion,capacidad_carga, barco.codigo as codigo
		from barco , sucursal 
		where fk_sucursal = sucursal.codigo"));

    	return view("reportes.indexReporte38", compact('vehiculos'));

    }

    public function index40()
    {

    	$suc = DB::select(DB::raw("SELECT s.nombre as sucursal ,z.nombre as zona,lu.nombre as estado from sucursal s,lugar l,lugar lu,zona z
		where s.fk_lugar=l.codigo and l.fk_lugar = lu.codigo and z.fk_sucursal=s.codigo
		group by s.nombre,lu.nombre,z.nombre,lu.codigo order by lu.codigo,s.nombre,lu.nombre"));

		return view("reportes.indexReporte40", compact('suc'));

    }

    public function index42()
    {

    	$aviones = DB::select(DB::raw("SELECT codigo as cod,peso as peso,capacidad_carga ,descripcion,envergadura,
    		longitud,cap_combustible,area,altura,diam_fuselaje,ancho_cabina,velocidad_max,peso_max,num_motores,
    		car_despegue,fk_modelo from avion"));

    	return view("reportes.indexReporte42", compact('aviones'));

    }

    public function index43()
    {

    	$aer = DB::select(DB::raw("SELECT a.nombre as nombre,a.cant_term as term,a.cant_pistas as pist,a.capacidad as cap,estado.nombre as ubicacion
			from aeropuerto a,lugar l, lugar estado,lugar lu
			where a.fk_lugar = l.codigo and l.fk_lugar = lu.codigo and lu.fk_lugar = estado.codigo"));

    	$puer = DB::select(DB::raw("SELECT p.nombre as nombre,p.cant_puestos as puest,p.cant_areas areas,p.calado as calado,p.uso as uso,estado.nombre as ubicacion
			from puerto p, lugar l, lugar lu, lugar estado
			where p.fk_lugar = l.codigo and l.fk_lugar = lu.codigo 
			and lu.fk_lugar = estado.codigo"));

    	return view("reportes.indexReporte43", compact('aer'), compact('puer'));

    }

    public function index44()
    {

    	$emp = DB::select(DB::raw("SELECT e.cedula as cedula,e.nombre||' '||e.apellido as nombre,z.nombre as zona,s.nombre as sucursal,h.dia as horario, h.hora_ent as ent, h.hora_sal as sal
			from empleado e,zon_emp zn, zona z, horario h,sucursal s,hor_emp her
			where e.codigo = zn.fk_empleado and zn.fk_zona = z.codigo 
			and z.fk_sucursal = s.codigo
			and her.fk_empleado = e.codigo and her.fk_horario = h.codigo
			order by s.codigo,e.codigo"));

    	return view("reportes.indexReporte44", compact('emp'));

    }

    public function index49()
    {

    	$suc = DB::select(DB::raw("SELECT max(s.capacidad_m2) as ma,estado.nombre as est					
			from sucursal s,lugar l, lugar estado
			where s.fk_lugar = l.codigo and l.fk_lugar =estado.codigo
			group by estado.nombre
			order by estado.nombre,ma"));

    	return view("reportes.indexReporte49", compact('emp'));

    }

    public function index50()
    {

    	$usu = DB::select(DB::raw("SELECT u.nombre as usuario, r.nombre as rol
			from usuario u, rol r
			where u.fk_Rol = r.codigo"));

    	return view("reportes.indexReporte50", compact('usu'));

    }

    public function index56()
    {

    	$flota = DB::select(DB::raw("SELECT distinct a.codigo as cod,mar.nombre as marca,mol.nombre as modelo,a.descripcion as descr,s.nombre as suc,max(fecha_entrada) as fecha_entrada,max(fecha_prox) as fecha_proxima
			from automovil a, marca mar,modelo mol, aut_tal aut,taller,sucursal s
			where a.fk_modelo = mol.codigo and mol.fk_marca = mar.codigo
			and  s.codigo = a.fk_sucursal and aut.fk_automovil = a.codigo
			group by s.nombre,a.codigo,mar.nombre,mol.nombre,a.descripcion"));

    	return view("reportes.indexReporte56", compact('flota'));

    }

    public function index59()
    {

    	$suc = DB::select(DB::raw("SELECT suc.nombre as suc,ser.nombre as ser
			from servicio ser, sucursal suc, ser_suc ss
			where ss.fk_servicio=ser.codigo and ss.fk_sucursal=suc.codigo
			group by suc.nombre,ser.nombre,suc.codigo
			order by suc.codigo"));

    	return view("reportes.indexReporte59", compact('suc'));

    }

    public function index60()
    {

    	$vehiculos = DB::select(DB::raw("SELECT codigo, peso, capacidad_carga, tipo_vehiculo
			from avion  
			UNION SELECT codigo, peso, capacidad_carga, tipo_vehiculo
			from barco 
			UNION SELECT codigo, peso, capacidad_carga, tipo_vehiculo
			from automovil  order by tipo_vehiculo;"));

    	return view("reportes.indexReporte60", compact('vehiculos'));

    }

}