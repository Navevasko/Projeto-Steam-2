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
			add column desconto varchar(5),
            add column destaque boolean;
            
            desc tblProduto;

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
                 
create table tblProduto_Categoria (
	idProduto_Categoria int not null auto_increment primary key,
        idProduto int not null,
        idCategoria int not null,
        
        constraint FK_Categoria_Filme_Categoria
			foreign key (idCategoria)
            references tblCategoria(idCategoria),
            
		constraint FK_Produto_Produto_Categoria
			foreign key (idProduto)
            references tblProduto(idProduto),
            
		unique index(idProduto_Categoria)
);

show tables;
                 
delete from tblProduto where idProduto = 3;
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

select * from tblProdutos order by idProduto desc;

select tblProduto.*, tblCategoria.nome from tblProduto
                        inner join tblCategoria
                        on tblCategoria.idCategoria = tblProduto.idCategoria
                        where tblProduto.idproduto = 1;
                        
                        
alter table tblCategoria
			change nome nomeCategoria varchar(100) not null;
            
select * from tblUsuarios;

alter table tblProduto 
			add column foto varchar(40) not null;
            
insert into tblProduto_Categoria (
                idProduto,
                idCategoria
            )
            
            values (
                10,
                30
                );
            
select * from tblProduto;
select * from tblCategoria;
select * from tblProduto_Categoria;
delete from tblProduto where idProduto = 1;


select tblProduto_Categoria.*, tblProduto.nome, tblProduto.foto, tblProduto.idProduto, tblCategoria.nomeCategoria, tblCategoria.idCategoria from tblProduto_Categoria

        inner join tblProduto
        on tblProduto.idProduto = tblProduto_Categoria.idProduto
            
        inner join tblCategoria
        on tblCategoria.idCategoria = tblProduto_Categoria.idCategoria
    
        order by idProduto_Categoria desc;
                        
select idProduto_Categoria from tblProduto_Categoria;

update tblProduto_Categoria set
                idProduto = 11,
                idCategoria = 29

            where idProduto_Categoria = 7;
