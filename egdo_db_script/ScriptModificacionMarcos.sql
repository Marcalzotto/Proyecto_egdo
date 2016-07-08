1)crear tabla votos

create table votos(
voto int not null primary key auto_increment,
id_usuario_voto int not null,
disenio_votado int not null,
tipo_disenio int not null,
instancia_voto int not null,
votacion_pertenece int not null,
foreign key (id_usuario_voto) references Usuario(id_usuario),
foreign key (disenio_votado) references Disenio(id_disenio),
foreign key(tipo_disenio) references Disenio(id_codigo_disenio),
foreign key(votacion_pertenece) references Votacion(idVotacion)
);

2)agregar campos a la tabla Disenio

cambiar nombre a columna disenio por disenio_frontal not null 


alter table Disenio add column ancho_frontal smallint(3) not null;
alter table Disenio add column alto_frontal smallint(3) not null;
alter table Disenio add column nombre_imagen varchar(50) not null;
alter table Disenio add column tipo_frontal varchar(20) not null;
alter table Disenio add column disenio_impresion mediumblob not null;
alter table Disenio add column ancho_impresion smallint(3) not null;
alter table Disenio add column alto_impresion smallint(3) not null;
alter table Disenio add column nombre_impresion varchar(50) not null;
alter table Disenio add column tipo_impresion varchar(20) not null;
alter table Disenio add column cantidad_votos int not null;
alter table Disenio add column votos_segunda_instancia int not null;
alter table Disenio add foreign key (id_votacion) references Votacion (idVotacion);
alter table Disenio add foreign key(id_usuario) references Usuario(id_usuario);

3)mdoficaciones en la tabla Votacion

cambiar campo estado_votacion varchar por vigente boolean not null

alter table Votacion add foreign key (id_usuario) references Usuario(id_usuario);
alter table Votacion add column curso_pertenece_votacion int not null;
alter table Votacion add foreign key (curso_pertenece_votacion) references Curso(id_curso);