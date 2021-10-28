<?php

require_once(SRC . 'bd/conexaoMySQL.php');

function inserirCategoria($categoria) {
    $sql = "insert into tblcategoria
            (
                nome
            )
            
            values
            (
                '" . $categoria['nome'] . "'
            )";
    
    $conexao = conexaoMySQL();
    
    if(mysqli_query($conexao, $sql)) {
        return true;
    }
    else {
        return false;
    }
}

function inserirUsuario($usuario) {
    $sql = "insert into tblUsuarios (
                nome,
                usuario,
                senha
            )

            values (
                '" . $usuario['nome'] . "',
                '" . $usuario['usuario'] . "',
                '" . $usuario['senha'] . "'
            )";

    $conexao = conexaoMySQL();
    
    if(mysqli_query($conexao, $sql)) {
        return true;
    }
    else {
        return false;
    }
}

function inserirProduto($produto) {
    echo($produto['nome']);
    echo($produto['desenvolvedor']);
    echo($produto['des']);
    echo($produto['preco']);
    echo($produto['idCategoria']);

  

}


?>