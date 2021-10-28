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
  preco float NOT NULL,
  idCategoria int not null
);

alter table tblProduto
			add constraint FK_CATEGORIA_PRODUTO
						foreign key (idCategoria)
                        references tblCategoria(idCategoria);

CREATE TABLE tblcategoria (
	idcategoria int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome varchar(100) NOT NULL
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

insert into tblProduto (
                    nome,
                    desenvolvedor,
                    des,
                    preco,
                    idCategoria
            )
            values (
                'Dishnored 2',
                'A',
                'A',
                 69.90,
				23
                 );
                 
delete from tblProduto where idProduto = 2;
/*Permite visualizar a estrutura criada da tabela*/
desc tblproduto;

delete from tblUsuarios
                    where idUsuario = 1;

/*Seleciona todos os dados de uma tabela*/
select * from tblCategoria;
select * from tblProduto;

insert into tblContatos (nome, email, celular) values ('teste','teste','teste');

/*Insere dados em uma tabela*/
insert into tblcategoria ( nome ) values ( 'Ação' );