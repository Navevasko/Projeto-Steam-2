<?php

require_once('../bd/conexaoMySQL.php');

function editarCategoria($arrayCategoria) {
    $sql = "update tblCategoria set 
                nome = '" . $arrayCategoria['nome'] . "'
                
                where idCategoria = " . $arrayCategoria['id'];

    $conexao = conexaoMySQL();
    
    if(mysqli_query($conexao, $sql)) {
        return true;
    }
    else {
        return false;
    }
}

function editarUsuario($arrayUsuario) {
    $sql = "update tblUsuarios set 
                nome = '" . $arrayUsuario['nome'] . "',
                usuario = '" . $arrayUsuario['usuario'] . "',
                senha = '" . $arrayUsuario['senha'] . "'

                where idUsuario = " . $arrayUsuario['idUsuario'];

    $conexao = conexaoMySQL();
    
    if(mysqli_query($conexao, $sql)) {
        return true;
    }
    else {
        return false;
    }
}

function editarProduto($arrayProduto) {
    $sql = "update tblProduto set 
                nome = '" . $arrayProduto['nome'] . "',
                foto = '" . $arrayProduto['foto'] . "',
                desenvolvedor = '" . $arrayProduto['desenvolvedor'] . "',
                des = '" . $arrayProduto['des'] . "',
                preco = " . $arrayProduto['preco'] . ",
                idCategoria = " . $arrayProduto['idCategoria'] . "

                where idproduto = " . $arrayProduto['idproduto'];

    $conexao = conexaoMySQL();
    
    if(mysqli_query($conexao, $sql)) {
        return true;
    }
    else {
        return false;
    }
}
?>