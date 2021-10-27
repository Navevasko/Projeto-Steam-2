/*Cria um novo database*/
create database dbprojeto20212t;

/*Permite selecionar o database a ser utilizado*/
use dbprojeto20212t;

/*Cria uma nova tabela*/
CREATE TABLE tblproduto (
  idproduto int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nome varchar(100) NOT NULL,
  desenvolvedor varchar(100) NOT NULL,
  des text NOT NULL,
  preco float NOT NULL
);

CREATE TABLE tblcategoria (
	idcategoria int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome varchar(100) NOT NULL
);

drop table tblproduto;

/*Permite visualizar a estrutura criada da tabela*/
desc tblproduto;

/*Seleciona todos os dados de uma tabela*/
select * from tblcategoria;

/*Insere dados em uma tabela*/
insert into tblcategoria ( nome ) values ( 'Ação' );