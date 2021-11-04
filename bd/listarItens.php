<?php

require_once(SRC . 'bd/conexaoMySQL.php');

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

function listarContatos() {
    $sql = "select * from tblContatos order by idcontato desc";

    $conexao = conexaoMySQL();

    $select = mysqli_query($conexao, $sql);

    return $select;
}

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

function listarProdutos() {
    $sql = "select * from tblProduto order by idProduto desc";

    $conexao = conexaoMySQL();

    $select = mysqli_query($conexao, $sql);

    return $select;
}

function buscarProdutos($idProduto) {
        $sql = "select tblProduto.*, tblCategoria.nomeCategoria from tblProduto
                        inner join tblCategoria
                        on tblCategoria.idCategoria = tblProduto.idCategoria
                        where tblProduto.idproduto = " . $idProduto;
    
        $conexao = conexaoMySQL();
    
        $select = mysqli_query($conexao, $sql);
    
        return $select;
}



?>