drop database if exists agenda;

create database agenda;

use agenda;

drop table if exists usuarios;

create table usuarios (
    id_usuario int(10) auto_increment,
    email varchar(100) not null,
    nombreCompleto varchar(100) not null,
    password varchar(250) not null,
    fechaNacimiento datetime not null,
    primary key (id_usuario)
);

create table eventos (
    id_evento int(10) auto_increment,
    titulo varchar(50) not null,
    fechaInicio datetime not null,
    horaInicio varchar(8),
    fechaFin datetime,
    horaFin varchar(8),
    diaCompleto BOOLEAN,
    id_usuario int(10) NOT NULL,
    primary key (id_evento)
);

ALTER TABLE usuarios CONVERT TO CHARACTER SET utf8;
ALTER TABLE eventos CONVERT TO CHARACTER SET utf8;


