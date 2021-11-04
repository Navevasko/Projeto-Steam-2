<?php

require_once(SRC . 'bd/conexaoMySQL.php');

function inserirCategoria($categoria) {
    $sql = "insert into tblcategoria
            (
                nomeCategoria
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

    $senhaCript = hash('sha256', $usuario['senha']);
    $sql = "insert into tblUsuarios (
                nome,
                usuario,
                senha
            )

            values (
                '" . $usuario['nome'] . "',
                '" . $usuario['usuario'] . "',
                '" . $senhaCript . "'
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
    echo($produto['foto']);
    echo($produto['desenvolvedor']);
    echo($produto['des']);
    echo($produto['preco']);
    echo($produto['idCategoria']);
    
    $sql = "insert into tblProduto (
                nome,
                desenvolvedor,
                des,
                preco,
                idCategoria,
                foto
            )

            values (
                '" . $produto['nome'] . "',
                '" . $produto['desenvolvedor'] . "',
                '" . $produto['des'] . "',
                 " . $produto['preco'] . ",
                 " . $produto['idCategoria'] . ",
                '" . $produto['foto'] . "'
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