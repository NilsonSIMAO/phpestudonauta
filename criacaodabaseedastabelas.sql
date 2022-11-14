create database bd_games  default character set utf8 collate utf8_general_ci;
use bd_games;
create table usuarios(
usuario varchar(10) not null,
nome varchar(30) not null,
senha varchar(60) not null,
tipo varchar(10) not null default 'editor',
primary key(usuario)
) engine= InnoDB default charset =utf8;

create table generos(
cod int(11) not null, /*codigo */
genero varchar(20) not null,
primary key(cod)
) engine= InnoDB default charset=utf8;

create table produtoras(
cod int(11) not null, /*codigo */
produtora varchar(20) not null,
pais varchar(15) not null,
primary key(cod)
)engine = InnoDB default charset=utf8;

create table jogos(
cod int(11) not null,
nome varchar(40) not null,
genero int(11) not null,
produtora int(11) not null,
descricao text not null,
nota decimal(4,2) not null,
capa varchar(40) default null,
primary key(cod),
/*utilizaçao de chaves estrangeira para ligar essa tabela com as outras*/
foreign key (genero) references generos(cod),
foreign key(produtora) references produtoras(cod)
) engine = InnoDB default charset=utf8;


SELECT j.cod, j.nome, g.genero,j.descricao, j.nota, j.capa FROM jogos j
JOIN generos g ON j.genero = g.cod JOIN produtoras p ON j.produtora=p.cod;