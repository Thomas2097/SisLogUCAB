Create table Lugar(
	codigo serial Not Null Unique,
	nombre varchar(50) Not Null,
	tipo varchar(100) Not Null,
	fk_lugar integer,
	Constraint pk_codigo_lugar primary key (codigo),
	Constraint fk_lugar_lugar foreign key (fk_lugar) references Lugar(codigo),
	Constraint check_tipo_lugar check(tipo IN ('estado','municipio','parroquia'))
);

Create table Destinatario(
	codigo serial Not Null Unique,
	cedula integer Not Null,
	nombre varchar(100) Not Null,
	apellido varchar(100) Not Null,
	Constraint pk_codigo_destinatario primary key (codigo)
);

Create table Rol(
	codigo serial Not Null unique,
	nombre varchar(100) Not Null,
	Constraint pk_codigo_rol primary key (codigo)
);

Create table Usuario(
	codigo serial Not Null Unique,
	nombre integer not null,
	contrase�a varchar(100) Not Null,
	fk_rol integer,
	Constraint pk_codigo_usuario primary key (codigo),
	Constraint fk_rol_usuario foreign key (fk_rol) references Rol(codigo)
);

Create table Accion(
	codigo serial Not Null Unique,
	fecha_accion date not null,
	Constraint pk_codigo_accion primary key (codigo)
);

Create table Usu_Acc(
	codigo serial Not Null Unique,
	fk_usuario integer Not Null,
	fk_accion integer Not Null,
	Constraint pk_codigo_usu_accion primary key (codigo),
	Constraint fk_usuario_usu_acc foreign key (fk_usuario) references Usuario(codigo),
	Constraint fk_accion_usu_acc foreign key (fk_accion) references Accion(codigo)
);

Create table Cliente(
	codigo serial Not Null Unique,
	cedula integer Not Null,
	nombre varchar(100) Not Null,
	apellido varchar(100) Not Null,
	fecha_nac date Not Null,
	edo_civil varchar(10) Not Null,
	empresa varchar(100) Not Null,
	lvip varchar(3) Not Null,
	fk_lugar integer Not Null,
	fk_usuario integer Not Null Unique,
	Constraint pk_codigo_cliente primary key (codigo),
	Constraint fk_lugar_cliente foreign key (fk_lugar) references Lugar(codigo),
	Constraint fk_usuario_cliente foreign key (fk_usuario) references Usuario(codigo),
	Constraint check_edo_civil_cliente check(edo_civil IN ('soltero','casado','viudo')),
	Constraint check_lvip_cliente check(lvip IN ('si','no'))
);

Create Table Marca(
	codigo serial Not Null unique,
	nombre varchar(40) not null,
	constraint pk_codigo_marca primary key(codigo)
);
	
Create Table Modelo(
	codigo serial Not Null unique,
	nombre varchar(40) not null,
	fecha_prod date not null,
	fk_marca integer not null,
	constraint pk_codigo_modelo primary key(codigo),
	constraint fk_marca_modelo foreign key(fk_marca) references marca(codigo)
);

create table Tipo_pago(
	codigo serial Not Null unique,
	num_billetes integer,
	tipo_cuenta varchar(20),
	banco varchar(50),
	num_chequera varchar(50),
	tipo_tarjeta varchar(50),
	num_tarjeta varchar(50),
	tipo varchar(20) not null,
	constraint pk_codigo_Tipo_pago primary key(codigo),
	constraint check_tipo_cuenta_Tipo_pago check(tipo_cuenta in('corriente','ahorro')),
	constraint check_tipo_Tipo_pago check(tipo in ('efectivo','transferencia','t_credito','t_debito','cheque'))
);


Create Table Servicio(
	codigo serial Not Null unique,
	nombre varchar(100) not null,
	constraint pk_codigo_servicio primary key(codigo)
);

create table sucursal(
	codigo serial Not Null unique,
	nombre varchar(255) not null,
	capacidad_m2 numeric(10,2) not null,
	correo varchar(100) not null,
	capacidad_alm integer not null,
	tam_deposito integer not null,
	fk_lugar integer not null,
	constraint pk_codigo_sucursal primary key(codigo),
	constraint fk_lugar_sucursal foreign key(fk_lugar) references lugar(codigo)
);

Create table Aeropuerto(
	codigo serial Not Null Unique,
	nombre varchar(100) Not Null,
	cant_term integer Not Null,
	cant_pistas integer Not Null,
	capacidad integer Not Null,
	fk_sucursal integer Not Null Unique,
	fk_lugar integer Not Null,
	Constraint pk_codigo_aeropuerto primary key (codigo),
	Constraint fk_sucursal_aeropuerto foreign key (fk_sucursal) references Sucursal(codigo),
	Constraint fk_lugar_aeropuerto foreign key (fk_lugar) references Lugar(codigo)
);

Create table Puerto(
	codigo serial Not Null Unique,
	nombre varchar(100) Not Null,
	cant_puestos integer Not Null,
	cant_areas integer Not Null,
	longitud numeric(10,2) Not Null,
	ancho numeric(10,2) Not Null,
	calado numeric(10,2) Not Null,
	uso varchar(100) Not Null,
	fk_sucursal integer Not Null Unique,
	fk_lugar integer Not Null,
	Constraint pk_codigo_puerto primary key (codigo),
	Constraint fk_sucursal_puerto foreign key (fk_sucursal) references Sucursal(codigo),
	Constraint fk_lugar_puerto foreign key (fk_lugar) references Lugar(codigo)
);



create table avion(
	codigo serial Not Null unique,
	peso integer not null,
	tipo_vehiculo varchar(100) not null,
	capacidad_carga real not null,
	descripcion varchar(255) not null,
	clasificacion varchar(100) not null,
	envergadura integer not null,
	longitud real not null,
	cap_combustible real not null,
	area real not null,
	altura real not null,
	diam_fuselaje real not null,
	ancho_cabina real not null,
	velocidad_max real not null,
	peso_max real not null,
	num_motores integer not null,
	car_despegue real not null,
	fk_sucursal integer not null,
	fk_modelo integer not null,
	constraint pk_codigo_avion primary key(codigo),
	constraint fk_sucursal_avion foreign key(fk_sucursal) references sucursal(codigo),
	constraint fk_modelo_avion foreign key(fk_modelo) references modelo(codigo)
);

create table automovil(
	codigo serial Not Null unique,
	peso real not null,
	tipo_vehiculo varchar(100) not null,
	capacidad_carga real not null,
	descripcion varchar(255) not null,
	clasificacion varchar(100) not null,
	serial_motor varchar(40) not null,
	serial_carroceria varchar(100)not null,
	fk_sucursal integer not null,
	fk_modelo integer not null,
	constraint pk_codigo_automovil primary key(codigo),
	constraint fk_sucursal_automovil foreign key(fk_sucursal)references sucursal(codigo),
	constraint fk_modelo_automovil foreign key(fk_modelo)references modelo(codigo)
);

Create Table Barco(
	codigo serial not null unique,
	peso numeric (10,2) not null,
	tipo_vehiculo varchar(100) not null,
	capacidad_carga real not null,
	descripcion varchar(100) not null,
	clasificacion varchar(100) not null,
	propulsion numeric(10,2) not null,
	num_pisos integer not null,
	velocidad_max numeric(10,2) not null,
	fk_sucursal integer not null,
	Constraint pk_codigo_Barco primary key (codigo),
	Constraint fk_Sucursal_Barco foreign key (fk_sucursal) references Sucursal(codigo)
);

Create table Cargo(
	codigo serial Not Null Unique,
	nombre varchar(100) Not Null,
	salario numeric(10,2) Not Null,
	Constraint pk_codigo_cargo primary key (codigo)
);

Create table Empleado(
	codigo serial Not Null Unique,
	cedula integer Not Null,
	nombre varchar(100) Not Null,
	apellido varchar(100) Not Null,
	correo_pers varchar(100) Not Null,
	correo_emp varchar(100) Not Null,
	fecha_nac date Not Null,
	niv_acad varchar(100) Not Null,
	profesion varchar(100) Not Null,
	edo_civil varchar(100) Not Null,
	num_hijos integer Not Null,
	fecha_ingr date Not Null,
	fecha_egre date,
	activo varchar(3) Not Null,
	fk_lugar integer Not Null,
	fk_cargo integer Not Null,
	fk_usuario integer Not Null,
	Constraint pk_codigo_empleado primary key (codigo),
	Constraint fk_lugar_empleado foreign key (fk_lugar) references Lugar(codigo),
	Constraint fk_cargo_empleado foreign key (fk_cargo) references Cargo(codigo),
	Constraint fk_usuario_empleado foreign key (fk_usuario) references Usuario(codigo),
	Constraint check_edo_civil_empleado check(edo_civil IN('soltero','casado','viudo')),
	Constraint check_activo_empleado check(activo IN('si','no'))
);

Create Table Taller(
	codigo serial Not Null unique,
	nombre varchar(50) Not Null,
	pag_web varchar(100) Not Null,
	correo varchar(50) Not Null,
	Constraint pk_codigo_Taller Primary key (codigo)
);
										
Create Table Persona_Contacto(
	codigo serial Not Null Unique,
	cedula integer Not Null,
	nombre varchar(100) Not Null,
	apellido varchar(100) Not Null,
	fk_taller integer Not Null,
	Constraint pk_cedula_Persona_Contacto primary key (codigo),
	Constraint fk_Taller_Persona_Contacto foreign key (fk_taller) references Taller(codigo)
);
							
Create Table Aut_tal(
	codigo serial Not Null unique,
	fecha_entrada date Not Null,
	fecha_sal_aprox date Not Null,
	fecha_sal_real date Not Null,
	fecha_prox date Not Null,
	costo integer Not Null,
	falla varchar(100) Not Null,
	fk_taller integer Not Null,
	fk_automovil integer not null,
	Constraint pk_codigo_Aut_tal primary key (codigo),
	Constraint fk_Taller_Aut_tal foreign key (fk_taller) references Taller(codigo),
	Constraint fk_Automovil_Aut_tal foreign key (fk_automovil) references Automovil(codigo)
);



create table tipo_producto(
   codigo serial not null unique,
   nombre varchar(100) not null,
   costo integer not null,
   constraint pk_codigo_tipo_producto primary key(codigo)
   
);

Create table Paquete(
	codigo serial Not Null Unique,
	fecha_entrega date Not Null,
	peso numeric(10,2) Not Null,
	alto numeric(10,2) not null,
	ancho numeric(10,2) not null,
	profundidad numeric(10,2) not null,
	fk_tipo_producto integer Not Null,
	fk_cliente integer Not Null,
	fk_destinatario integer Not Null,
	fk_sucursal_origen integer Not Null,
	fk_sucursal_destino integer Not Null,
	Constraint pk_codigo_paquete primary key (codigo),
	Constraint fk_cliente_paquete foreign key (fk_cliente) references Cliente(codigo),
	Constraint fk_destinatario_paquete foreign key (fk_destinatario) references Destinatario(codigo),
	Constraint fk_sucursal_origen_paquete foreign key (fk_sucursal_origen) references Sucursal(codigo),
	Constraint fk_sucursal_destino_paquete foreign key (fk_sucursal_destino) references Sucursal(codigo),
	constraint fk_tipo_producto_paquete foreign key (fk_tipo_producto)references tipo_producto(codigo)
);
Create Table Estado_paquete(
	codigo serial not null unique,
	nombre varchar(100) not null,
	constraint pk_codigo_Estado_paquete primary key(codigo)
);
								
Create Table Est_paq(
	codigo serial not null unique,
	fecha_cambio date not null,
	fk_paquete integer not null,
	fk_estado_paquete integer not null,
	Constraint pk_codigo_Est_paq primary key(codigo),
	Constraint fk_Paquete_Est_paq foreign key (fk_paquete) references Paquete(codigo),
	Constraint fkEstado_paquete_Est_paq foreign key (fk_estado_paquete) references Estado_paquete(codigo)
);
Create Table Ruta(
	codigo serial not null unique,
	nombre varchar(100) not null,
	tipo varchar(100) not null,
	fk_sucursal_origen integer not null,
	fk_sucursal_destino integer not null,
	costo integer not null,
	constraint pk_codigo_Ruta primary key(codigo),
	constraint fk_SucursalOrigen_Ruta foreign key(fk_sucursal_origen) references Sucursal(codigo),
	constraint fk_SucursalDestino_Ruta foreign key(fk_sucursal_destino) references Sucursal(codigo)
);
										 
Create Table Rut_Rut(
	codigo serial not null unique,
	fk_ruta_primaria integer not null,
	fk_ruta_secundaria integer not null,
	constraint pk_codigo_Rut_rut primary key(codigo),
	constraint fk_RutaPrimaria_Rut_rut foreign key(fk_ruta_primaria) references Ruta(codigo),
	constraint fk_RutaSecundaria_Rut_rut foreign key (fk_ruta_secundaria) references Ruta(codigo)
);

create table envio(
    codigo serial not null unique,
	fecha_inicio date not null,
	fecha_entrega date not null,
	fk_paquete integer not null,
	fk_ruta integer not null,
	fk_sucursal_origen integer not null,
	fk_sucursal_destino integer not null,
	constraint pk_codigo_envio primary key(codigo),
	constraint fk_paquete_envio foreign key(fk_paquete)references paquete(codigo),
	constraint fk_ruta_envio foreign key(fk_ruta)references ruta(codigo),
	constraint fk_sucursal_origen_envio foreign key(fk_sucursal_origen)references sucursal(codigo),
	constraint fk_sucursal_destino_envio foreign key(fk_sucursal_destino)references sucursal(codigo)	

);

create table ser_suc(
   codigo serial not null unique,
   costo integer not null,
   fecha_pago date not null,
   fk_servicio integer not null,
   fk_sucursal integer not null,
   constraint pk_codigo_ser_suc primary key(codigo),
   constraint fk_servicio_ser_suc foreign key(fk_servicio)references servicio(codigo),
   constraint fk_sucursal_ser_Suc foreign key(fk_sucursal)references sucursal(codigo)
);

create table suc_env(
    codigo serial not null unique,
	fecha_ing date not null,
	fecha_sal date not null,
	fk_sucursal integer not null,
	fk_envio integer not null,
	constraint pk_codigo_suc_env primary key(codigo),
	constraint fk_sucursal_suc_env foreign key(fk_sucursal)references sucursal(codigo),
	constraint fk_envio_suc_env foreign key(fk_envio)references envio(codigo)
);

Create table Tipo_Envio(
	codigo serial Not Null Unique,
	nombre varchar(100) Not Null,
	Constraint pk_codigo_tipo_envio primary key (codigo)
);


										
Create Table Telefono(
	codigo serial Not Null Unique,
	numero varchar(100) Not Null,
	tipo varchar(10) Not Null,
	fk_cliente integer,
	fk_taller integer,
	fk_persona_contacto integer,
	fk_sucursal integer,
	fk_empleado integer ,
	Constraint pk_codigo_Telefono primary key (codigo),
	Constraint fk_Cliente_Telefono foreign key (fk_cliente) references Cliente(codigo),
	Constraint fk_Persona_contacto_Telefono foreign key (fk_persona_contacto) references Persona_contacto(codigo),
	constraint fk_Sucursal_Telefono foreign key (fk_sucursal) references Sucursal(codigo),
	constraint fk_Empleado_Telefono foreign key (fk_empleado) references Empleado(codigo),
	Constraint check_tipo_Telefono check(tipo IN ('celular','hogar','empresa'))
);
	


										 
Create Table Zona(
	codigo serial not null unique,
	nombre varchar(100) not null,
	tama�o numeric(10,2) not null,	
	descripcion varchar(100) not null,
	fk_sucursal integer not null,
	Constraint pk_codigo_Zona primary key (codigo),
	Constraint fk_Sucursal_Zona foreign key (fk_sucursal) references Sucursal(codigo)
);
										 

										 										 
Create Table Zon_emp(
	codigo serial not null unique,
	fk_empleado integer not null,
	fk_zona integer not null,
	fecha_ingreso date not null,
	constraint pk_codigo_Zon_emp primary key(codigo),
	constraint fk_Empleado_Zon_emp foreign key (fk_empleado) references Empleado(codigo),
	constraint fk_Zona_Zon_emp foreign key (fk_zona) references Zona(codigo)
);
										 
Create Table horario(
	codigo serial not null unique,
	dia varchar(10) not null,
	hora_ent varchar(100) not null,
	hora_sal varchar(100) not null,
	constraint pk_codigo_Horario primary key(codigo),
	Constraint check_dia_horario check(dia IN ('Lunes','Martes','Miercoles','Jueves','Viernes','Sabado','Domingo'))
	
);
										 
Create Table Hor_emp(
	codigo serial not null unique,
	fk_empleado integer not null,
	fk_horario integer not null,
	constraint pk_codigo_Hor_emp primary key(codigo),
	constraint fk_empleado_Hor_emp foreign key(fk_empleado) references Empleado(codigo),
	constraint fk_horario_Hor_emp foreign key (fk_horario) references Horario(codigo)
);

create table asistencia(
     codigo serial not null unique,
	 fk_hor_emp integer not null,
	 asistio varchar(3) not null,
	 fecha_trabajada date not null,
	 constraint pk_codigo_asistencia primary key(codigo),
	 constraint fk_hor_emp_asistencia foreign key(fk_hor_emp)references hor_emp(codigo),
	 constraint check_asistio_asistencia check(asistio in('si','no'))
);


create table tra_rut(
	codigo serial Not Null unique,
	duracion integer not null,
	fk_automovil integer,
	fk_avion integer,
	fk_barco integer,
	fk_ruta integer not null,
	constraint pk_codigo_tra_rut primary key(codigo),
	constraint fk_automovil_tra_rut foreign key(fk_automovil)references automovil(codigo),
	constraint fk_avion_tra_rut foreign key(fk_avion)references avion(codigo),
	constraint fk_barco_tra_rut foreign key(fk_barco)references barco(codigo),
	constraint fk_ruta_tra_rut foreign key(fk_ruta)references ruta(codigo)
);


Create Table Pago(
	codigo serial Not Null unique,
	monto_total real not null,
	fecha_pago date not null,
	fk_tipo_pago integer not null,	
	fk_paquete integer not null,
	fk_cliente integer not null,
	fk_destinatario integer not null,
	constraint pk_codigo_pago primary key(codigo),
	constraint fk_paquete_pago foreign key(fk_paquete)references paquete(codigo),
	constraint fk_cliente_pago foreign key(fk_cliente)references cliente(codigo),
	constraint fk_tipo_pago_pago foreign key(fk_tipo_pago)references tipo_pago(codigo)
);

create table privilegio(
    codigo serial not null unique,
	nombre varchar(100) not null,
	constraint pk_codigo_privilegio primary key(codigo)
);

create table acc_pri(
     codigo serial not null unique,
	 fk_accion integer not null,
	 fk_privilegio integer not null,
	 constraint pk_codigo_acc_pri primary key(codigo),
	 constraint fk_accion_acc_pri foreign key(fk_accion)references accion(codigo),
	 constraint fk_privilegio_acc_pri foreign key(fk_privilegio)references privilegio(codigo)
);

create table env_tip(
    codigo serial not null unique,
	fecha_cambio date not null,
	fk_envio integer not null,
	fk_tipo_envio integer not null,
	constraint pk_codigo_env_tip primary key(codigo),
	constraint fk_envio_env_tip foreign key(fk_envio)references envio(codigo),
	constraint fk_tipo_envio_env_tip foreign key(fk_tipo_envio) references tipo_envio(codigo)
);

create table emp_suc(
codigo serial not null unique,
fecha_pago date not null,
fk_empleado integer not null,
fk_sucursal integer not null,
constraint pk_codigo_emp_suc primary key (codigo),
constraint fk_empleado_emp_suc foreign key (fk_empleado)references empleado(codigo),
constraint fk_sucursal_emp_suc foreign key(fk_sucursal)references sucursal(codigo)
);



