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

insert into comentario_upd(comentario,fecha_hora,id_usuario,id_lugar,id_curso) 
values('No puede ser',now(),6,1,2);
select last_insert_id();
-- select cu.id_comentario,u.nombre from comentario_upd cu join usuario u on cu.id_usuario = u.id_usuario where id_usuario = '$usuario'";

alter table info_viaje drop foreign key info_viaje_ibfk_2;
alter table info_viaje drop foreign key info_viaje_ibfk_3;
alter table info_viaje add constraint info_viaje_ibfk_2 foreign key(id_actividad) references actividad(id_actividad);
alter table info_viaje add constraint info_viaje_ibfk_3 foreign key(id_usuario) references usuario(id_usuario) on delete cascade on update cascade;

 alter table info_viaje add column imagen1 varchar(45) NOT NULL;
 alter table info_viaje add column imagen2 varchar(45) NOT NULL;
 alter table info_viaje add column imagen3 varchar(45) NOT NULL;
 alter table info_viaje add column descripcion1 varchar(250) NOT NULL;
 alter table info_viaje add column descripcion2 varchar(250) NOT NULL;
 alter table info_viaje add column descripcion3 varchar(250) NOT NULL;


INSERT INTO `info_viaje` (`id_info_viaje`, `nombre_lugar`, `descripcion`, 
`id_actividad`, `id_usuario`, `imagen`, `imagen1`, `imagen2`, `imagen3`, 
`descripcion1`, `descripcion2`, `descripcion3`) VALUES (1,'Bariloche',
'Se encuentra en la provincia de Rio negro',5,1,'Bariloche.jpg','cerro_catedral.jpg',
'rafting_bariloche.jpg','cerebro_bariloche.jpg','Cerros: el cerro catedral es el centro 
de esquÃ­ mÃ¡s grande del hemisferio sur y ofrece una amplia infraestructura de 
servicios para la prÃ¡ctica de deportes invernales. EstÃ¡ abierto todo el aÃ±o 
y cuenta con 40 medios de elevaciÃ³n (entre aerosill','Rafting RÃ­o Limay: 
una propuesta ideal para compartir en familia o con amigos, navegando un rÃ­o 
tranquilo y de aguas cristalinas, con remansos y corrientes suaves, a pocos
 kilÃ³metros de la ciudad de Bariloche.','Discos: Cerebro fue inaugurada en el 
aÃ±o 1980 siendo la mÃ¡s tradicional e innovadora de las discotecas de Bariloche, 
con su decoraciÃ³n de vanguardia y sus 1500 m2 alberga a 1600 personas, cuenta con 
salÃ³n vip, equipamiento tecnolÃ³gico de vanguar'),
(2,'Dique San Roque','Se encuentra en la provincia de Cordoba',5,1,'
dique_sanroque2.jpg','dique_sanroque.jpg','pekos_cordoba.jpg','reloj-cucu_.JPG',
'El Dique San Roque es considerado uno de los mÃ¡s grandes del mundo, debido a la 
capacidad de su Embalse que puede contener 250 millones de metros cÃºbicos de agua, 
se puede acceder a Ã©l con una travesÃ­a fluvial o transitando el camino â€œDe las ci'
,'Pekoâ€™s ofrece a sus visitantes una experiencia Ãºnica, que combina el disfrute y 
aprendizaje de la naturaleza con la emociÃ³n de las mÃ¡s divertidas atracciones y 
juegos Un lugar especialmente diseÃ±ado para brindar esparcimiento, recreaciÃ³n y 
seg','El principal atractivo del reloj cucÃº es el pÃ¡jaro de madera articulado que 
cada media hora sale de su cÃ¡lida guarida para anunciar el paso de otra media hora. 
Para contemplar esta apariciÃ³n es necesario seguir la Av. Uruguay y atravesar el puent')
,(3,'Camboriu','Se encuentra en Brasil',5,1,'brasil_RioDeJaneiro.jpg',
'balneario_camboriu.jpg','cristo_luz_camboriu.jpg','waterplay_camboriu.jpg',
'El Balneario de CamboriÃº posee exuberantes y hermosas playas, las cuÃ¡les se 
destacan por ser un agradable atractivo para el turismo tanto nacional como 
internacional. Si bien vale la pena visitarlas a todas, la Playa Central logra imponerse
 por sob','Cristo Luz: dos de sus mayores privilegios son las increÃ­bles vistas que 
permite obtener de toda la ciudad y el espectÃ¡culo de luces de 86 tonos que se inicia 
todos los dÃ­as a las 20hs. Este show, que puede divisarse desde hasta 15 kilÃ³metros 
de ','Water Play: el complejo dispone de 7 piscinas, 5 cinco toboganes de agua todo 
incluido y la parte de actividades de barro, trecking hasta un mirador sobre el morro, 
circuito de supervivencia, tirolesa, metegol humano, football mixto, mareados, ring h'),
(4,'San Rafael','Se encuentra en la provincia de Mendoza',5,1,'San Rafael.jpg',
'Canon del Atuel.jpg','Embalse valle grande.jpg','Bodega la abeja.jpg','El caÃ±Ã³n 
del Atuel es un estrecho caÃ±Ã³n a travÃ©s del cual fluye el rÃ­o Atuel. 
Se encuentra en el Valle Grande, perteneciente al departamento San Rafael, en la 
provincia de Mendoza.','El Embalse Valle Grande es un cuerpo de agua en el centro 
de la provincia de Mendoza, en Argentina. Situado a unos 30 km al sur de San Rafael, 
constituye uno de los destinos turÃ­sticos mÃ¡s importantes del departamento homÃ³nimo 
y de la provincia.','Finca y bodega La Abeja, se trata de la primera bodega de San 
Rafael, construida en 1883 por Rodolfo Iselin.'),(5,'Mar del plata','Se encuentra en 
la provincia de Bs As',5,1,'mardelplata.jpg','balnearios_mardelplata.jpg','Aquarium.jpg',
'Aquasol.jpg','Entre otras playas marplatenses, se encuentran las siguientes:las 
populares que estÃ¡n en el centro (Bristol, Popular, Punta Iglesia, Las Toscas); 
las tradicionales de La Perla; las frecuentadas por surfistas (Playa Grande) y las 
mÃ¡s amplias (Punta ','Es uno de los parques marinos mÃ¡s importantes de Argentina, 
situado junto al Faro de Punta Mogotes. Posee una esplendida coleccion de pinguinos
, peces, mamiferos marinos y aves exoticas y autoctonas, los visitantes disfrutan 
de los magnificos','Aquasol Parque Acuatico, ubicado en la Costa AtlÃ¡ntica. 
Con increÃ­bles y siempre renovadas atracciones. LÃ­der en recreacion participativa
, elegido por el publico de todas las edades desde hace 25 años. Viva­ una jornada 
unica, sorprendente e '),(6,'Cancun','Se encuentra en Mexico',5,1,'Cancun.jpg',
'islamujeres_mexico.jpg','jungletour_cancun.jpg','playadelcarmen_cancun.jpg',
'La zona costera de Isla Mujeres se distingue por contar con aguas cristalinas,
 calmadas y de poca profundidad. Otra parte popular de la insula es el Parque Nacional
 El Garrafon, que cuenta con comodas instalaciones y atractivos como el templo de I',
'Una inolvidable experiencia que no debes perderte en Cancun es la de conducir tu 
propia embarcacion en el Jungle Tour Sunrise Marina. ¿Imagina llegar hasta el 
segundo arrecife de coral mas grande del mundo? Sera una extraodinaria aventura, 
donde','Las playas de Playa del Carmen se caracterizan por ser accesibles 
practicamente desde cualquier punto de la Quinta Avenida, asi como por 
su suave oleaje y arena blanca. Mientras de dia son el espacio predilecto para 
tomar el sol y descansar, de no');


insert into comentario_infoviaje(comentario,id_info_viaje,id_usuario,fecha) values('el comentario',1,7,now());


select count(id_disenio) from disenio as di join usuario u on di.id_usuario_subio = u.id_usuario 
where u.id_curso = 2 and di.codigo_tipo = 1 and di.votos_segunda_instancia in(
select max(d.votos_segunda_instancia) from disenio as d where d.codigo_tipo = 1);


select id_disenio,id_usuario,id_curso,codigo_tipo from disenio as d join usuario as u on d.id_usuario_subio = u.id_usuario 
where u.id_curso = 2 and d.codigo_tipo = 1;


select id_disenio from disenio where codigo_tipo = 3;
alter table fiesta drop column calificacion;
alter table upd drop column calificacion;

alter table fiesta add column calificacion decimal(2,1) not null after id_curso;

alter table upd add column calificacion decimal(2,1) not null after id_curso;
alter table disenio add column cantidad_votos int not null default 0 after id_usuario_subio;
alter table disenio add column votos_segunda_instancia int not null default 0 after cantidad_votos;

