25)Oficinas por estado ordenadas alfabeticamente:
select s.nombre,lu.nombre from sucursal s,lugar l,lugar lu
where s.fk_lugar=l.codigo and l.fk_lugar = lu.codigo
group by s.nombre,lu.nombre,lu.codigo order by lu.codigo,s.nombre,lu.nombre

26)Lista de empleados activos:
select e.cedula as cedula,e.nombre as nombre ,e.apellido as apellido ,e.edo_civil as edo_civil,c.nombre as cargo,
e.fecha_ingr as fecha_ingreso
from empleado e,cargo c
where e.fk_Cargo = c.codigo and e.activo = 'si'
order by e.codigo

27)Lista de todos los empleados
select e.cedula as cedula,e.nombre||' ' ||e.apellido as nombre_completo,e.edo_civil as edo_civil,c.nombre as cargo,
e.fecha_ingr as fecha_ingreso,e.fecha_egre as fecha_egreso,(select count(*) from empleado where activo='si') as activos,
(select count(*) from empleado where activo='no') as egresados
from empleado e,cargo c
where e.fk_Cargo = c.codigo
order by e.codigo

28)Listado de Rutas:
select r.nombre,s.nombre as origen,z.nombre as destino
from ruta r,sucursal s, sucursal z
where s.codigo = r.fk_sucursal_origen and z.codigo=r.fk_sucursal_destino

34)select c.nombre||' '||c.apellido as nombre,c.cedula,count(p.fk_cliente) as paquetes_enviados
from cliente c, paquete p
where fk_cliente = c.codigo and lvip='si'
group by c.nombre,c.apellido,c.cedula
order by nombre asc

38)select nombre,tipo_vehiculo,descripcion,capacidad_carga
from automovil ,sucursal
where fk_sucursal = sucursal.codigo 
union all
select nombre,tipo_vehiculo,descripcion,capacidad_carga
from avion, sucursal
where fk_sucursal = sucursal.codigo
union all
select nombre,tipo_vehiculo,descripcion,capacidad_carga
from barco , sucursal 
where fk_sucursal = sucursal.codigo


40)Oficinas y Zonas por estado
select s.nombre,z.nombre,lu.nombre from sucursal s,lugar l,lugar lu,zona z
where s.fk_lugar=l.codigo and l.fk_lugar = lu.codigo and z.fk_sucursal=s.codigo
group by s.nombre,lu.nombre,z.nombre,lu.codigo order by lu.codigo,s.nombre,lu.nombre

42)Listado de aviones y sus caracteristicas:
select codigo as cod,peso as peso,capacidad_carga ,descripcion,envergadura,longitud,cap_combustible,area,altura,diam_fuselaje,ancho_cabina,velocidad_max,peso_max,num_motores,car_despegue,fk_modelo from avion

43)Listado de Puertos y Aeropuertos
Aeropuertos
select a.nombre,a.cant_term,a.cant_pistas,a.capacidad,estado.nombre
from aeropuerto a,lugar l, lugar estado,lugar lu
where a.fk_lugar = l.codigo and l.fk_lugar = lu.codigo and lu.fk_lugar = estado.codigo
Puertos
select p.nombre,p.cant_puestos,p.cant_areas,p.calado,p.uso,estado.nombre
from puerto p, lugar l, lugar lu, lugar estado
where p.fk_lugar = l.codigo and l.fk_lugar = lu.codigo 
and lu.fk_lugar = estado.codigo


44)select e.cedula as cedula,e.nombre||' '||e.apellido as nombre,z.nombre as zona,s.nombre as sucursal,h.dia as horario
from empleado e,zon_emp zn, zona z, horario h,sucursal s,hor_emp her
where e.codigo = zn.fk_empleado and zn.fk_zona = z.codigo 
and z.fk_sucursal = s.codigo
and her.fk_empleado = e.codigo and her.fk_horario = h.codigo
order by s.codigo,e.codigo

45)select p.codigo as codigo_paquete,tp.nombre as tipo_producto,s.nombre as nombre_sucursal
from paquete p,tipo_producto tp,sucursal s
where p.fk_sucursal_origen = s.codigo and p.fk_tipo_producto = tp.codigo 
group by s.nombre,p.codigo,tp.nombre,s.codigo
order by s.codigo,p.codigo

49)SELECT max(s.capacidad_m2) as ma,estado.nombre					
from sucursal s,lugar l, lugar estado
where s.fk_lugar = l.codigo and l.fk_lugar =estado.codigo
group by estado.nombre
order by estado.nombre,ma


50)Listado de Usuarios y roles:
select u.nombre, r.nombre
from usuario u, rol r
where u.fk_Rol = r.codigo

56)select distinct a.codigo,mar.nombre,mol.nombre,a.descripcion,s.nombre,max(fecha_entrada) as fecha_entrada,max(fecha_prox) as fecha_proxima
from automovil a, marca mar,modelo mol, aut_tal aut,taller,sucursal s
where a.fk_modelo = mol.codigo and mol.fk_marca = mar.codigo
and  s.codigo = a.fk_sucursal and aut.fk_automovil = a.codigo
group by s.nombre,a.codigo,mar.nombre,mol.nombre,a.descripcion


59)Listado de servicios por oficina:
select suc.nombre,ser.nombre
from servicio ser, sucursal suc, ser_suc ss
where ss.fk_servicio=ser.codigo and ss.fk_sucursal=suc.codigo
group by suc.nombre,ser.nombre,suc.codigo
order by suc.codigo

