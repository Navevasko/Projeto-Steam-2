<?php

require_once('../bd/conexaoMySQL.php');

function editarCategoria($arrayCategoria) {
    $sql = "update tblCategoria set 
                nomeCategoria = '" . $arrayCategoria['nome'] . "'
                
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
                descricao = '" . $arrayProduto['descricao'] . "',
                desconto = " . $arrayProduto['desconto'] . ",
                destaque = " . $arrayProduto['destaque'] . ",
                preco = " . $arrayProduto['preco'] . "

                where idproduto = " . $arrayProduto['idProduto'];

    $conexao = conexaoMySQL();
    
    if(mysqli_query($conexao, $sql)) {
        return true;
    }
    else {
        return false;
    }
}

function editarProduto_Categoria($arrayProduto_Categoria) {
    $sql = "update tblProduto_Categoria set
                idProduto = " . $arrayProduto_Categoria['idproduto'] . ",
                idCategoria = " . $arrayProduto_Categoria['idCategoria'] . "

            where idProduto_Categoria " . $arrayProduto_Categoria['idProduto_Categoria'];

    $conexao = conexaoMySQL();
    
    if(mysqli_query($conexao, $sql)) {
        return true;
    }
    else {
        return false;
    }
}
?>