<?php

require_once('../functions/config.php');
require_once(SRC . 'bd/listarItens.php');

$idProduto = $_GET['id'];

$dadosProduto = buscarProdutos($idProduto);

    if($rsProduto = mysqli_fetch_assoc($dadosProduto)) {
        session_start();

        $_SESSION['produto'] = $rsProduto;

        header('location: ../produto_categoria.php');
    }
    else {
        echo("<script>
            alert('". BD_MSG_ERRO ."');
            window.location.href='../produto_categoria.php';
        </script>");
    }

?>