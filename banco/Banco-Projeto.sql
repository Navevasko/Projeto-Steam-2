/*Cria um novo database*/
create database dbprojeto20212t;

/*Permite selecionar o database a ser utilizado*/
use dbprojeto20212t;
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
			add column desconto varchar(5),
            add column destaque boolean;
            
            desc tblProduto;

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
                        
                        

select idProduto_Categoria from tblProduto_Categoria;

update tblProduto_Categoria set
                idProduto = 11,
                idCategoria = 29

            where idProduto_Categoria = 7;

select * from tblCategoria;

select * from tblUsuarios;

alter table tblproduto
            add column destaque boolean not null,
            add column desconto int not null,
            add column descricao text not null;
            
desc tblproduto;

select * from tblUsuarios;
insert into tblProduto (nome, destaque, desconto, desenvolvedor, descricao, foto, preco, idCategoria ) values ('a', true, 2, 'a', 'a', 'a', 2, 21);
insert into tblproduto (
                nome,
                desenvolvedor,
                descricao,
                destaque,
                desconto,
                preco,
                idCategoria,
                foto
            )

            values (
                'aa',
                'aa',
                'ads',
                 true,
                 50,
                 50,
                 21,
                'a'
            );
            
            
select * from tblCategoria;

delete from tblProduto
                    where idproduto = 12;
                    
drop table tblProduto_Categoria;

select * from tblContatos;