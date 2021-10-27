<?php

require_once('../bd/conexaoMySQL.php');

function editarCategoria($arrayCategoria) {
    $sql = "update tblCategoria set 
                nome = '" . $arrayCategoria['nome'] . "'
                
                where idCategoria = " . $arrayCategoria['idCategoria'];

    $conexao = conexaoMySQL();
    
    //Envia o script SQL para o Banco de Dados
    if(mysqli_query($conexao, $sql)) {
        return true;
    }
    else {
        return false;
    }
}

?>