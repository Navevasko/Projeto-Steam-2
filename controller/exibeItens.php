<?php

require_once(SRC . 'bd/listarItens.php');

function exibirCategorias() {

    $dadosCategoria = listarCategorias();

    return $dadosCategoria;
}

?>