<?php

require_once(SRC . 'bd/listarItens.php');

function exibirCategorias() {
    $dadosCategoria = listarCategorias();
    return $dadosCategoria;
}

function exibirContatos() {
    $dadosContato = listarContatos();
    return $dadosContato;

}

function exibirUsuarios() {
    $dadosUsuarios = listarUsuarios();
    return $dadosUsuarios;
}

function exibirProdutos() {
    $dadosProdutos = listarProdutos();
    return $dadosProdutos;
}

?>