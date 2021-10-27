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



?>