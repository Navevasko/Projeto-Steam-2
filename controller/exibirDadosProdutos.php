<?php

require_once(SRC . "/bd/listarCliente.php");


function exibirProdutos(){

   $dados = selectProduto();

   return $dados;
}
?>