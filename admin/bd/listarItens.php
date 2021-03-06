<?php

require_once(SRC . 'bd/conexaoMySQL.php');

/*******************PRODUTOS********************/ 

function listarProdutos() {
    $sql = "select * from tblProduto order by idProduto desc";

    $conexao = conexaoMySQL();

    $select = mysqli_query($conexao, $sql);

    return $select;
}

function buscarProdutos($idProduto) {
        $sql = "select * from tblProduto where idproduto = " . $idProduto;
    
        $conexao = conexaoMySQL();
    
        $select = mysqli_query($conexao, $sql);
    
        return $select;
}

function buscarUltimoProduto(){
    $sql= "select * from tblProduto order by idproduto desc limit 1";
    $conexao= conexaoMysql();
    $select = mysqli_query($conexao,$sql);
    return $select;
};

function buscarNomeProduto($nome) {
    $sql = "select * from tblProduto where tblProduto.nome like '" . "%" . $nome . "%'";
    
        $conexao = conexaoMySQL();
    
        $select = mysqli_query($conexao, $sql);
    
        return $select;
}

function buscarDesenvolvedorProduto($desenvolvedor) {
    $sql = "select tblProduto.*, tblCategoria.nomeCategoria from tblProduto
                        inner join tblCategoria
                        on tblCategoria.idCategoria = tblProduto.idCategoria
                        where tblProduto.desenvolvedor like '" . "%" . $desenvolvedor . "%'";
    
        $conexao = conexaoMySQL();
    
        $select = mysqli_query($conexao, $sql);
    
        return $select;
}

/**********************************************/


/*******************CATEGORIAS********************/ 

function listarCategorias() {
    $sql = "select * from tblcategoria order by idcategoria desc";

    $conexao = conexaoMySQL();

    $select = mysqli_query($conexao, $sql);

    return $select;
}

function buscarCategoria($idCategoria) {
    $sql = "select * from tblCategoria where idCategoria = " . $idCategoria;

    $conexao = conexaoMySQL();

    $select = mysqli_query($conexao, $sql);

    return $select;
}

function buscarCategoriaProduto($idCategoria) {
    $sql = "select tblProduto.*, tblCategoria.nomeCategoria as Genero from tblProduto_Categoria 
	inner join tblCategoria
		on tblProduto_Categoria.idCategoria = tblCategoria.idcategoria
        
	inner join tblProduto
		on tblProduto_Categoria.idProduto = tblProduto.idProduto
	
    where tblCategoria.idcategoria = " . $idCategoria . "
	order by tblProduto.nome desc";

    $conexao = conexaoMySQL();

    $select = mysqli_query($conexao, $sql);

    return $select;
}

/************************************************/


/*******************CONTATOS********************/ 

function listarContatos() {
    $sql = "select * from tblContatos order by idcontato desc";

    $conexao = conexaoMySQL();

    $select = mysqli_query($conexao, $sql);

    return $select;
}

/**********************************************/


/*******************USUARIOS********************/ 

function listarUsuarios() {
    $sql = "select * from tblUsuarios order by idUsuario desc";

    $conexao = conexaoMySQL();

    $select = mysqli_query($conexao, $sql);

    return $select;
}

function buscarUsuario($idUsuario) {
    $sql = "select * from tblUsuarios where idUsuario = " . $idUsuario;

    $conexao = conexaoMySQL();

    $select = mysqli_query($conexao, $sql);

    return $select;
}

/**********************************************/


/*******************PRODUTO_CATEGORIA********************/ 

function listarProduto_Categoria () {
    $sql = "select tblProduto.*, tblCategoria.nomeCategoria as Genero from tblProduto_Categoria 
                inner join tblCategoria
                    on tblProduto_Categoria.idCategoria = tblCategoria.idcategoria
                    
                inner join tblProduto
                    on tblProduto_Categoria.idProduto = tblProduto.idProduto
                    
                order by tblProduto.nome desc";

    $conexao = conexaoMySQL();
    
    $select = mysqli_query($conexao, $sql);
    
    return $select;
}

function buscarProduto_Categoria($idProduto_Categoria) {
            $sql = "select tblProduto_Categoria.*, tblCategoria.nomeCategoria, tblProduto.nome from tblProduto_Categoria

                        inner join tblProduto
                        on tblProduto.idProduto = tblProduto_Categoria.idProduto

                        inner join tblCategoria
                        on tblCategoria.idCategoria = tblProduto_Categoria.idCategoria

                        where tblProduto_Categoria.idProduto_Categoria = " . $idProduto_Categoria;
    
        $conexao = conexaoMySQL();
    
        $select = mysqli_query($conexao, $sql);
    
        return $select;
}

function selectProdutoCategoria($idProduto){
    
    $sql= "select * from tblProduto_Categoria where idProduto=".$idProduto;

    $conexao= conexaoMysql();

    $select = mysqli_query($conexao,$sql);
    
    return $select;
}

/*******************************************************/

?>