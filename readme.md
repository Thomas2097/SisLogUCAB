1)Registro de asistencia de empleados. LISTO
2)Cambio de estatus de paquetes durante el envío. 
3)Envío de paquetes con el medio de transporte, tomar en cuenta duración, costos y fecha estimada de entrega. 
4)Recibo de envíos. 
5)Para los clientes VIP se otorga 10% de descuento sobre el total a pagar en el envío. 
6)Asignación de roles a usuarios. 
7)Asignación de permisos a roles. 
8)Inicio de sesión con la validación de permisos. 
9)Alerta de paquetes con más de 24 horas. 
10)Generación de clientes VIP y su carnet. 
11)Oficina que envía y recibe más paquetes Casi LISTO, falta mostrar el número de paquetes
12)Ingresos y egresos por oficina por mes. 
13)Peso promedio de los paquetes que se envían por oficina. 
14)Mes del año que se realizan más envíos. Casi LISTO, falta mostrar el número de envíos
15)Ruta más utilizada. Casi LISTO, falta mostrar el número de veces que es utilizada
16)Recibo de pago de nómina. 
17)Listado de empleados con las inasistencias. LISTO (/reporte17)
18)Listado de inasistencia indicando el horario asignado al empleado. LISTO (/reporte18) 
10)Listado de paquetes con todos los cambios de estatus indicando las fechas de cambio. 
20)Auditoria del sistema por fecha. 
21)Promedio de estancia de los paquetes por cada zona de las oficinas. 
22)Sucursales de puertos y aeropuertos. LISTO (/reporte18)
23)Histórico de revisión de la flota indicando taller, falla y duración de la revisión. LISTO (/reporte23)
24)Total de gastos generados por revisión de flotas por mes y por sucursal. Falta que sea por mes y no el total (/reporte24)
	Ésto es lo que se tiene del reporte 24:
		select sum(r.costo), s.nombre
		from aut_tal r, sucursal s, automovil a
		where s.codigo = a.fk_sucursal and r.fk_automovil = a.codigo
		group by s.nombre;
