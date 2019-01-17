1)Registro de asistencia de empleados. LISTO <br>
2)Cambio de estatus de paquetes durante el envío. <br>
3)Envío de paquetes con el medio de transporte, tomar en cuenta duración, costos y fecha estimada de entrega. <br>
4)Recibo de envíos. <br>
5)Para los clientes VIP se otorga 10% de descuento sobre el total a pagar en el envío. <br>
6)Asignación de roles a usuarios. <br>
7)Asignación de permisos a roles. <br>
8)Inicio de sesión con la validación de permisos. <br>
9)Alerta de paquetes con más de 24 horas. <br>
10)Generación de clientes VIP y su carnet. <br>
11)Oficina que envía y recibe más paquetes Casi LISTO, falta mostrar el número de paquetes <br>
12)Ingresos y egresos por oficina por mes. <br>
13)Peso promedio de los paquetes que se envían por oficina. <br>
14)Mes del año que se realizan más envíos. Casi LISTO, falta mostrar el número de envíos <br>
15)Ruta más utilizada. Casi LISTO, falta mostrar el número de veces que es utilizada <br>
16)Recibo de pago de nómina. <br>
17)Listado de empleados con las inasistencias. LISTO (/reporte17) <br>
18)Listado de inasistencia indicando el horario asignado al empleado. LISTO (/reporte18) <br>
10)Listado de paquetes con todos los cambios de estatus indicando las fechas de cambio. <br>
20)Auditoria del sistema por fecha. <br>
21)Promedio de estancia de los paquetes por cada zona de las oficinas. <br>
22)Sucursales de puertos y aeropuertos. LISTO (/reporte18) <br>
23)Histórico de revisión de la flota indicando taller, falla y duración de la revisión. LISTO (/reporte23) <br>
24)Total de gastos generados por revisión de flotas por mes y por sucursal. Falta que sea por mes y no el total (/reporte24) <br>
	Ésto es lo que se tiene del reporte 24: <br>
		select sum(r.costo), s.nombre <br>
		from aut_tal r, sucursal s, automovil a <br>
		where s.codigo = a.fk_sucursal and r.fk_automovil = a.codigo <br>
		group by s.nombre; <br>
