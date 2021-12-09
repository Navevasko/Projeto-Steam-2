<?php

require_once('../bd/conexaoMySQL.php');

function deletarCategoria($idCategoria) {
    $sql = "delete from tblCategoria
                    where idcategoria = " . $idCategoria;

    $conexao = conexaoMySQL();

    if(mysqli_query($conexao, $sql)) {
        return true;
    }
    else {
        return false;
    }
}

function deletarContato($idContato) {
    $sql = "delete from tblContatos
                    where idContato = " . $idContato;

    $conexao = conexaoMySQL();

    if(mysqli_query($conexao, $sql)) {
        return true;
    }
    else {
        return false;
    }
}

function deletarUsuario($idUsuario) {
    $sql = "delete from tblUsuarios
                    where idUsuario = " . $idUsuario;

    $conexao = conexaoMySQL();

    if(mysqli_query($conexao, $sql)) {
        return true;
    }
    else {
        return false;
    }
}

function deletarProduto($idProduto) {
    $sql = "delete from tblProduto
                    where idproduto = " . $idProduto;

    $conexao = conexaoMySQL();

    if(mysqli_query($conexao, $sql)) {
        return true;
    }
    else {
        return false;
    }
}

?>