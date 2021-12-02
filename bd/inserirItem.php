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
    
    $sql = "insert into tblproduto (
                nome,
                desenvolvedor,
                descricao,
                destaque,
                desconto,
                preco,
                idCategoria,
                foto
            )

            values (
                '" . $produto['nome'] . "',
                '" . $produto['desenvolvedor'] . "',
                '" . $produto['descricao'] . "',
                 " . $produto['destaque'] . ",
                 " . $produto['desconto'] . ",
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

function inserirProdutoCategoria ($produto) {
    $sql = "insert into tblProduto_Categoria (
                idProduto,
                idCategoria
            )
            
            values (
                " . $produto['idproduto'] . ",
                " . $produto['idCategoria'] . "
                )";

    $conexao = conexaoMySQL();
    
    if(mysqli_query($conexao, $sql)) {
        return true;
    }
    else {
        return false;
    }
}

function inserirContato ($contato) {
    $sql = "insert into tblContatos (
        nome,
        email,
        celular
    )
    
    values (
        '" . $contato['nome'] . "',
        '" . $contato['email'] . "',
        '" . $contato['celular'] . "'
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