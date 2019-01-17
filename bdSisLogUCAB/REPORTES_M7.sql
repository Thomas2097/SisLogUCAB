4)SELECT e.codigo as codigo_envio,p.monto_total as monto_total,p.fecha_pago as fecha_pago,tp.tipo as tipo_pago
FROM envio e, pago p,tipo_pago tp, paquete pq
where pq.codigo = p.fk_paquete and p.fk_tipo_pago =tp.codigo and e.fk_paquete = pq.codigo
order by e.codigo

5)update pago set monto_total = (monto_total-monto_total*1.1) where fk_cliente in
(select codigo from cliente where lvip='si')

10)select distinct c.codigo,c.nombre||' '||c.apellido as nombre,c.cedula as cedula,
MIN(s.codigo||'-'||c.cedula||'-'||c.codigo) as codigo_carnet
from cliente c,sucursal s,paquete p
where lvip='si' and p.fk_cliente = c.codigo and p.fk_sucursal_origen = s.codigo
group by c.codigo 
order by c.codigo 

11) select s.nombre as sucursal_mas_enviados,z.nombre as sucursal_mas_recibidos,
(select count(fk_sucursal_origen) as paq_enviados from paquete group by fk_sucursal_origen order by paq_enviados desc limit 1) as num_enviados,
(select count(fk_sucursal_destino) as paq_recibidos from paquete group by fk_sucursal_destino order by paq_recibidos desc limit 1) as num_recibidos
from sucursal s,sucursal z where
s.codigo=(select mode() within group (order by fk_sucursal_origen)
from paquete) and z.codigo=(select mode() within group (order by fk_sucursal_destino)
from paquete)

12)select suc.nombre,sum(ss.costo)as egresos, sum(p.monto_total) as ingresos
from ser_suc ss, servicio s,sucursal suc,pago p, paquete paq
where ss.fk_servicio = s.codigo and ss.fk_sucursal = suc.codigo
and p.fk_paquete = paq.codigo and paq.fk_sucursal_origen = suc.codigo
group by suc.nombre

13) select s.nombre,round(avg(p.peso)::numeric,2)
from paquete p,sucursal s
group by s.codigo,s.nombre,p.fk_sucursal_origen having(s.codigo=p.fk_sucursal_origen)
order by p.fk_sucursal_origen


	14)select (to_char(fecha_inicio,'Month'))as mes,count(to_char(fecha_inicio,'Month')) as envios
from envio
group by to_char(fecha_inicio,'Month') order by envios desc limit 1

   15)select r.nombre,s.nombre as origen,z.nombre as destino,(select count(fk_Ruta)as num_usada from envio 
group by fk_ruta order by num_usada desc limit 1)
from ruta r,sucursal s, sucursal z
where r.codigo = (SELECT mode() within group (order by fk_ruta)
from envio ) and s.codigo = r.fk_sucursal_origen and z.codigo=r.fk_sucursal_destino


   19)select p.codigo as paquete,e.nombre as estado_paquete,ep.fecha_cambio
from paquete p,estado_paquete e, est_paq ep
where ep.fk_paquete = p.codigo and 
ep.fk_Estado_paquete = e.codigo
order by p.codigo
 
 20)select u.nombre as usuario,a.fecha_accion as fecha_accion,p.nombre as privilegio,r.nombre as rol
from usuario u,accion a,usu_acc ua,privilegio p,acc_pri ap,rol r
where ua.fk_usuario=u.codigo and ua.fk_accion=a.codigo
and ap.fk_accion=a.codigo and ap.fk_privilegio = p. codigo and u.fk_rol=r.codigo


24)	select sum(r.costo), s.nombre,to_char(r.fecha_entrada, 'Month-yy') as fecha
		from aut_tal r, sucursal s, automovil a,taller t
		where s.codigo = a.fk_sucursal and r.fk_automovil = a.codigo and r.fk_taller = t.codigo
		group by s.nombre,to_char(r.fecha_entrada, 'Month-yy') 
		order by s.nombre,fecha;