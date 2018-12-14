insert into privilegio(nombre)values
('crear'),
('modificar'),
('consultar'),
('eliminar'),
('enviar paquete');

insert into acc_pri(fk_accion,fk_privilegio)values
(1,1),
(2,2),
(3,3),
(4,4),
(5,5);

insert into env_tip (fecha_cambio, fk_envio, fk_tipo_Envio) values 
('12/9/2018', 27, 1),
('11/22/2018', 31, 3),
('10/20/2018', 60, 4),
('11/16/2018', 52, 3),
('10/19/2018', 44, 3);
