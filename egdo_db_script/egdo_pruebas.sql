create database egdo_pruebas;

use egdo_pruebas;

create table usuarios(
id_usuario int not null primary key,
nombre varchar(40) not null
);

create table codigo_disenio(
codigo int not null primary key,
descripcion varchar(20) not null
);

create table disenio(
id_disenio int not null primary key,
codigo_tipo int not null,
disenio_frontal mediumblob not null,
ancho_frontal smallint(3) not null,
alto_frontal smallint(3) not null,
nombre_imagen varchar(50) not null,
tipo_frontal varchar(20) not null,
disenio_impresion mediumblob not null,
ancho_impresion smallint(3) not null,
alto_impresion smallint(3) not null,
nombre_impresion varchar(50) not null,
tipo_impresion varchar(20) not null,
id_usuario_subio int not null,
foreign key(codigo_tipo) references codigo_disenio(codigo),
foreign key(id_usuario_subio) references usuarios(id_usuario) 
);

delete from disenio where votacion_pertenece = 9;

select * from disenio;

alter table disenio add column cantidad_votos int not null default 0;
alter table disenio add column votos_segunda_instancia int not null default 0;
alter table disenio add column votacion_pertenece int not null default 9;
alter table disenio add foreign key (votacion_pertenece) references votacion (id_votacion);
/*agregar id de votacion a la tabla disenio y relacion foranea del campo a tabla votacion*/ 

/*agregar columna a la tabla disenio */
alter table disenio add column path_img_doble varchar(100) not null;

create table votos(
voto int not null primary key,
id_usuario_voto int not null,
disenio_votado int not null,
foreign key (id_usuario_voto) references usuarios(id_usuario),
foreign key (disenio_votado) references disenio(id_disenio)
);

alter table  codigo_disenio change  codigo  codigo int(11) not null auto_increment ;

insert into usuarios values("","Marcos");
insert into usuarios values("","Noelia");
insert into usuarios values("","Paula");
insert into usuarios values("","Romina");
insert into usuarios values("","Gerardo");

insert into codigo_disenio values("","Buzo/Campera");
insert into codigo_disenio values("","Remera");
insert into codigo_disenio values("","Bandera");

alter table votos add column tipo_disenio int not null;
alter table votos add foreign key (tipo_disenio) references disenio(codigo_tipo); 
alter table votos add column instancia_voto int not null default 1;

select * from disenio where codigo_tipo = 3;
select * from disenio as d join usuarios as u on d.id_usuario_subio = u.id_usuario where codigo_tipo = 3;


select * from votos;
alter table votos add column votacion_pertenece int not null default 9;
alter table votos add foreign key (votacion_pertenece) references votacion(id_votacion); 
select * from disenio;

select count(voto) as votos,disenio_votado from votos where tipo_disenio = 2
group by disenio_votado; /*esta consulta es para saber los votos de cada disenio*/
 
select * from disenio as d join usuarios as u on d.id_usuario_subio = u.id_usuario where codigo_tipo = 2;
/* tanto en una consulta como en la otra los los id viene en forma ascendente*/

select d.id_disenio, d.codigo_tipo, d.disenio_frontal, d.ancho_frontal, d.alto_frontal, 
d.nombre_imagen, d.tipo_frontal, d.disenio_impresion, d.ancho_impresion, d.alto_impresion, 
d.nombre_impresion, d.tipo_impresion, d.id_usuario_subio, u.nombre, count(voto) as votos
from usuarios as u join disenio as d on u.id_usuario = d.id_usuario_subio  join votos on 
d.id_disenio = disenio_votado where d.codigo_tipo = 2
group by d.id_disenio;
 
delete from votos where tipo_disenio = 1;

update disenio set cantidad_votos = 1 where id_disenio = 1;

select count(voto) as votos_hechos from votos where id_usuario_voto = 1 
and disenio_votado = 2;

select * from votos;

select d.codigo_tipo, c.descripcion from disenio as d join codigo_disenio as c 
on d.codigo_tipo = c.codigo where d.id_usuario_subio = 1 and d.codigo_tipo = 2;

create table votacion(
id_votacion int not null auto_increment primary key,
fecha_apertura datetime not null,
vigente boolean not null,
tipo_actividad int not null,
usuario_apertura int not null,
foreign key (usuario_apertura) references usuarios(id_usuario)
);

select * from usuarios;

insert into votacion values('','2016-07-05 18:36:00',true,3,1);
 
select * from votacion;
alter table votacion add column curso_pertenece_votacion int not null default 1;
/*agregar fk curso*/
delete from votacion where id_votacion = 9;

select * from votacion where vigente = true;

select * from disenio order by cantidad_votos desc limit 3;
select * from disenio order by cantidad_votos desc limit 1;
select * from disenio as d join usuarios u on d.id_usuario_subio = u.id_usuario 
				where d.codigo_tipo = 1 order by d.cantidad_votos desc limit 1;



select * from disenio as d join usuarios u on d.id_usuario_subio = u.id_usuario where d.codigo_tipo = 2 
and d.votacion_pertenece = 10 order by d.cantidad_votos desc limit 3;



select * from disenio as d join usuarios u on d.id_usuario_subio = u.id_usuario 
where d.codigo_tipo = 3 and d.votacion_pertenece = 10 order by 
d.cantidad_votos desc limit 1;

create table imagen(
id_imagen int not null primary key auto_increment,
nombreImagen varchar(40) not null,
tamanio decimal(6,2) not null,
tipo varchar(15) not null,
ancho int not null,
alto int not null,
imagen mediumblob not null,
id_usuario int not null,
id_actividad int not null
);

select * from imagen;

-- Pruebas realizadas ultimamente
select * from actividad_disenio;
delete from actividad_disenio where actividad_disenio_id = 6;

select * from votos;
select * from disenio;

select count(id_disenio) as ganadores from disenio as di join usuario u on di.id_usuario_subio = u.id_usuario 
where u.id_curso = 2 and codigo_tipo = 3 and votos_segunda_instancia in(
										select max(d.votos_segunda_instancia) from disenio as d 
										where d.codigo_tipo = 3);

select * from talles_curso;
select talle_buzo, talle_remera from talles_curso where usuario = '';
select id_rol from usuario where id_usuario = '' and id_curso = 2;
select * from usuario where id_rol = 2 and id_curso = 2;

select * from curso_pdf;
select * from empresa;
select * from calificacion;

select * from empresa e join calificacion c on e.id_empresa = c.id_empresa;

delete from calificacion where id_empresa = 1;
select * from comentario_empresas;
delete from comentario_empresas where id_empresa = 1;
select * from tcalendario;
delete from tcalendario where id = 21946;
update tcalendario set evento = 'Un nombre', color = 1, hora = '20:03:00' where id = 21961 and fecha= '2017-01-06';

insert into notificaciones values("","Hola buenos dias german","http://german.com","../carpeta/icono.png",3,'2017-01-27 17:25:00');
delete from notificaciones where curso_notificacion = 2; 



select * from notificaciones;


insert into notificacion_vista_por values("",6,4,0,2);
insert into notificacion_vista_por values("",6,5,0,2);
insert into notificacion_vista_por values("",6,8,0,2);
select * from notificacion_vista_por;
select * from notificaciones where curso_notificacion = 2 and id_notificacion not in(
	select id_notificacion from notificacion_vista_por where usuario = 6 and curso_notificacion = 2);


delete from notificacion_vista_por where id_notificacion = 4; 
select * from notificaciones n join notificacion_vista_por nvp on n.id_notificacion = nvp.id_notificacion where n.curso_notificacion = 2 and nvp.usuario = 6 and nvp.borrada = 0;
select * from actividad_disenio;

insert into notificaciones values('','La votacion termino, mira los disenios ganadores.','votacion','../images/shirt.png',2,'2017-02-02 18:40:00',5);
					
insert into notificaciones values('','Ya puedes elegir tus talles de ropa.','votacion','../images/shirt.png',2,'2017-02-02 18:40:00',6);
					
insert into notificaciones values('','Ya puedes elegir la empresa que confeccione tus disenios.','empresas','../images/shirt.png',2,'2017-02-02 18:40:00',7);

select count(id_notificacion) as cant from notificaciones where tipo_notificacion = 5 or tipo_notificacion = 6 or tipo_notificacion = 7 and curso_notificacion = 2;

update notificacion_vista_por set borrada = 0 where id_notificacion = 100;


select id_notificacion,resumen, link, icono, fecha_hora, tipo_notificacion from 
notificaciones where curso_notificacion = 2 and id_notificacion not in(
select id_notificacion from notificacion_vista_por where usuario = 6 
						and curso_notificacion = 2);

select id_actividad from actividad where id_actividad between 2 and 3;

update upd set calificacion = 0.0 where id_upd = 2;

select * from upd where id_curso = 2 and calificacion = (
select max(calificacion) from upd
);

