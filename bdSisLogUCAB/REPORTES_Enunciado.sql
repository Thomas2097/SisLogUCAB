Oficinas por estado ordenadas alfabeticamente:
select s.nombre,lu.nombre from sucursal s,lugar l,lugar lu
where s.fk_lugar=l.codigo and l.fk_lugar = lu.codigo
group by s.nombre,lu.nombre,lu.codigo order by lu.codigo,s.nombre,lu.nombre

Oficinas y Zonas por estado
select s.nombre,z.nombre,lu.nombre from sucursal s,lugar l,lugar lu,zona z
where s.fk_lugar=l.codigo and l.fk_lugar = lu.codigo and z.fk_sucursal=s.codigo
group by s.nombre,lu.nombre,z.nombre,lu.codigo order by lu.codigo,s.nombre,lu.nombre

Lista de empleados activos:
select e.cedula as cedula,e.nombre as nombre ,e.apellido as apellido ,e.edo_civil as edo_civil,c.nombre as cargo,
e.fecha_ingr as fecha_ingreso
from empleado e,cargo c
where e.fk_Cargo = c.codigo and e.activo = 'si'
order by e.codigo

Lista de todos los empleados
select e.cedula as cedula,e.nombre||' ' ||e.apellido as nombre_completo,e.edo_civil as edo_civil,c.nombre as cargo,
e.fecha_ingr as fecha_ingreso,e.fecha_egre as fecha_egreso,(select count(*) from empleado where activo='si') as activos,
(select count(*) from empleado where activo='no') as egresados
from empleado e,cargo c
where e.fk_Cargo = c.codigo
order by e.codigo

Listado de Rutas:
select r.nombre,s.nombre as origen,z.nombre as destino
from ruta r,sucursal s, sucursal z
where s.codigo = r.fk_sucursal_origen and z.codigo=r.fk_sucursal_destino

Listado de Usuarios y roles:
select u.nombre, r.nombre
from usuario u, rol r
where u.fk_Rol = r.codigo

Listado de servicios por oficina:
select suc.nombre,ser.nombre
from servicio ser, sucursal suc, ser_suc ss
where ss.fk_servicio=ser.codigo and ss.fk_sucursal=suc.codigo
group by suc.nombre,ser.nombre,suc.codigo
order by suc.codigo

Listado de aviones y sus caracteristicas:
select codigo as cod,peso as peso,capacidad_carga ,descripcion,envergadura,longitud,cap_combustible,area,altura,diam_fuselaje,ancho_cabina,velocidad_max,peso_max,num_motores,car_despegue,fk_modelo from avion

