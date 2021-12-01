/*Cria um novo database*/
create database dbprojeto20212t;

/*Permite selecionar o database a ser utilizado*/
use dbprojeto20212t;

/*Cria uma nova tabela*/
CREATE TABLE tblproduto (
  idproduto int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nome varchar(100) NOT NULL,
  foto varchar(100) NOT NULL,
  desenvolvedor varchar(100) NOT NULL,
  descricao text NOT NULL,
  desconto boolean NOT NULL,
  preco float NOT NULL,
  idCategoria int NOT NULL
);

alter table tblProduto
			add constraint FK_CATEGORIA_PRODUTO
						foreign key (idCategoria)
                        references tblCategoria(idcategoria);

CREATE TABLE tblcategoria (
	idcategoria int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nomeCategoria varchar(100) NOT NULL
);

create table tblProduto_Categoria (
			idProduto_Categoria int NOT NULL AUTO_INCREMENT PRIMARY KEY,
            idProduto int not null,
            idCategoria int not null
);

create table tblContatos (
		idContato int not null auto_increment primary key,
        nome varchar(100) not null,
        email varchar(50) not null,
        celular varchar(15) not null
);

create table tblUsuarios (
		idUsuario int not null auto_increment primary key,
        nome varchar(100) not null,
        usuario varchar(15) not null,
        senha varchar(25) not null
);

insert into tblCategoria (nomeCategoria) values ('Ação');

insert into tblProduto (nome, foto, desenvolvedor, desconto, descricao, preco, idCategoria) values ('A', 'A', 'A', 50, 'A', 50, 1);
                 
delete from tblProduto where idProduto = 2;
/*Permite visualizar a estrutura criada da tabela*/
desc tblproduto;

drop table tblCategoria;

/*Seleciona todos os dados de uma tabela*/
select * from tblCategoria;
select * from tblProduto;

insert into tblContatos (nome, email, celular) values ('teste','teste','teste');

/*Insere dados em uma tabela*/
insert into tblcategoria ( nomeCategoria ) values ( 'Luta' );

select tblProduto.*, tblCategoria.nome from tblProduto
                        inner join tblCategoria
                        on tblCategoria.idCategoria = tblProduto.idCategoria
                        where tblProduto.idproduto = 2;
                        
                        
select * from tblCategoria;