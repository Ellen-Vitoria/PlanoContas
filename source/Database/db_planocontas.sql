create database db_planocontas;
use db_planocontas;

create table tb_client (
	cd_register int not null auto_increment,
    nm_client varchar(70) not null,
    cd_email varchar(50) not null,
    cd_password varchar(10) not null,
    constraint pk_cd_register
		primary key (cd_register)
);