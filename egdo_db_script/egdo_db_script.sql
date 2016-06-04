create database egdo_db;

use egdo_db;

create table rol(
id_rol int,
descripcion_rol varchar(45)
);

alter table rol drop primary key;
alter table rol drop column id_rol;
alter table rol add column id_rol int primary key not null auto_increment;


create table curso(
id_curso int primary key not null auto_increment,
nombre_escuela varchar(45) null,
numero_escuela int null,
localidad varchar(70) null,
nombre_curso varchar(45) null,
cant_alumnos int null,
fecha_creacion datetime null
);

create table actividad(
id_actividad int primary key not null,
nombre_actividad varchar(45)
);

create table usuario(
id_usuario int primary key not null,
nombre varchar(45) null,
apellido varchar(45) null,
email varchar(45) null,
contrasenia varchar(45) null,
id_rol int,
id_curso int,
foreign key(id_rol) references rol(id_rol),
foreign key(id_curso) references curso(id_curso)
);

alter table usuario drop column id_usuario;
alter table usuario add column id_usuario int primary key not null auto_increment first;

alter table usuario drop foreign key usuario_ibfk_1;
alter table rol drop column id_rol;
alter table rol add column id_rol int primary key not null auto_increment first;
alter table usuario add foreign key (id_rol) references rol(id_rol);

create table notificaciones(
id_notificacion int primary key not null auto_increment,
resumen varchar(50) null,
link varchar(50) null
);


create table usuario_has_actividad(
id_notificacion int not null,
id_actividad int not null,
primary key(id_notificacion,id_actividad),
foreign key (id_notificacion) references notificaciones (id_notificacion),
foreign key (id_actividad) references actividad (id_actividad)
);

alter table usuario_has_actividad drop foreign key usuario_has_actividad_ibfk_2;
alter table actividad drop column id_actividad;
alter table actividad add column id_actividad int primary key not null auto_increment first;
alter table usuario_has_actividad add foreign key(id_actividad) references actividad(id_actividad);

create table comentario(
id_comentario int primary key not null auto_increment,
comentario varchar(45),
fecha_hora datetime,
id_usuario int,
id_actividad int,
foreign key (id_usuario) references usuario(id_usuario),
foreign key (id_actividad) references actividad(id_actividad)
);

create table empresa(
id_empresa int primary key not null auto_increment,
nombre_empresa varchar(45),
telefono varchar(11),
calle varchar(45),
altura int,
localidad varchar(45),
codigo_postal int,
partido varchar(45),
provincia varchar(45),
email varchar(45),
pagina_web varchar(45),
facebook varchar(45),
twitter varchar(45),
instagram varchar(45),
fecha_alta datetime,
cuit varchar(45),
id_usuario int,
foreign key (id_usuario) references usuario(id_usuario)
);

create table calificacion(
id_calificacion int primary key not null auto_increment,
id_usuario int,
id_empresa int,
foreign key (id_usuario) references usuario(id_usuario),
foreign key (id_empresa) references empresa(id_empresa)
);

create table mensajes_privado(
id_mensaje int primary key not null auto_increment,
asunto varchar(45),
mensaje varchar(45),
fecha_hora datetime,
id_emisor int,
id_receptor int,
id_usuario int,
foreign key (id_usuario) references usuario(id_usuario)
);

create table votacion(
id_votacion int primary key not null auto_increment,
fecha_apertura datetime,
estado_votacion varchar(45),
id_actividad int,
id_usuario int,
foreign key (id_actividad) references actividad(id_actividad)
);

create table agenda(
id_agenda int primary key not null auto_increment,
nombre_evento varchar(45),
fecha_hora datetime,
detalle varchar(45),
icono tinyblob,
color varchar(45),
id_usuario int,
id_actividad int,
foreign key (id_usuario) references usuario(id_usuario),
foreign key (id_actividad) references actividad(id_actividad)
);

create table upd(
id_upd int primary key not null auto_increment,
nombre_lugar varchar(45),
calle varchar(45),
altura int,
telefono varchar(11),
localidad varchar(60),
partido varchar(60),
provincia varchar(45),
pagina_web varchar(45),
facebook varchar(100),
twitter varchar(100),
instagram varchar(100),
datelles_adicionales varchar(250),
imagen1 mediumblob,
imagen2 mediumblob,
id_actividad int,
id_votacion int,
id_usuario_propuesta int,
foreign key (id_actividad) references actividad(id_actividad)
);

create table fiesta(
id_fiesta int primary key not null auto_increment,
nombre varchar(45),
calle varchar(45),
altura int,
telefono varchar(11),
facebook varchar(100),
twitter varchar(100),
instagram varchar(100),
pagina_web varchar(45),
datelles_adicionales varchar(250),
imagen1 mediumblob,
imagen2 mediumblob,
id_votacion int,
id_actividad int,
id_usuario_propuesta int,
foreign key (id_actividad) references actividad(id_actividad)
);

create table imagen(
id_imagen int primary key not null auto_increment,
nombre_imagen varchar(45),
tamanio decimal(6,2),
tipo varchar(45),
ancho int,
alto int,
imagen mediumblob,
portada boolean,
id_curso int,
id_usuario int,
id_actividad int,
foreign key(id_actividad) references actividad(id_actividad)
);

create table info_viaje(
id_info_viaje int primary key not null auto_increment,
nombre_lugar varchar(45),
provincia varchar(45),
descripcion varchar(250),
id_actividad int,
foreign key (id_actividad) references actividad(id_actividad)
);

create table evento(
id_evento int primary key not null auto_increment,
imagen1 mediumblob,
imagen2 mediumblob,
id_actividad int,
id_usuario int,
foreign key (id_actividad) references actividad(id_actividad)
);

create table codigo_disenio(
id_codigo_disenio int primary key not null auto_increment,
descripcion varchar(45)
);

create table disenio(
id_disenio int primary key not null auto_increment,
id_codigo_disenio int,
id_actividad int,
disenio mediumblob,
id_usuario int,
id_votacion int,
foreign key(id_codigo_disenio) references codigo_disenio(id_codigo_disenio),
foreign key(id_actividad) references actividad(id_actividad)

);