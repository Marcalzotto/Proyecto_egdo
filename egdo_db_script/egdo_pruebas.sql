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