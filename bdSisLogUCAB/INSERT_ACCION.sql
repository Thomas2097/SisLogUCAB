INSERT into accion(nombre)values
('crear'),
('modificar'),
('modificar'),
('eliminar'),
('consultar'),
('generar reporte'),
('enviar paquete');

insert into usu_acc(fecha_accion, fk_usuario, fk_accion) values 
('9/17/2018', 1, 3),
('9/13/2018', 2, 4),
('9/20/2018', 3, 5),
('9/18/2018', 4, 6),
('9/15/2018', 5, 7),
('9/19/2018', 6, 4),
('9/27/2018', 7, 6),
('9/14/2018', 8, 6),
('9/15/2018', 9, 1),
('9/18/2018', 10, 4);
