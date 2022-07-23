create table usuarios(
iduser int not null primary key auto_increment,
nome varchar(150) not null,
email varchar(150) not null,
telefone varchar(150) not null,
nascimento date not null,
cidade varchar(150) not null
);
