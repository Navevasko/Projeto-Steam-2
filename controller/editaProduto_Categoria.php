<?php

require_once('../functions/config.php');
require_once(SRC . 'bd/listarItens.php');

$idProduto_Categoria = $_GET['idProduto_Categoria'];

$dadosProduto_Categoria = buscarProduto_Categoria($idProduto_Categoria);

    if($rsProduto_Categoria = mysqli_fetch_assoc($dadosProduto_Categoria)) {
        session_start();

        $_SESSION['produto_categoria'] = $rsProduto_Categoria;

        header('location: ../produto_categoria.php');
    }
    else {
        echo("<script>
            alert('". BD_MSG_ERRO ."');
            window.location.href='../produto_categoria.php';
        </script>");
    }

?>