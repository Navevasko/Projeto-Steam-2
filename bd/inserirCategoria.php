<?php

require_once(SRC . 'bd/conexaoMySQL.php');

function inserirCategoria($categoria) {
    $sql = "insert into tblcategoria
            (
                nome
            )
            
            values
            (
                '" .$categoria. "'
            )";
    
    $conexao = conexaoMySQL();
    
    if(mysqli_query($conexao, $sql)) {
        return true;
    }
    else {
        return false;
    }
}


?>