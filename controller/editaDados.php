<?php

require_once('../functions/config.php');
require_once(SRC . 'bd/listarItens.php');

$idCategoria = $_Get['id'];

$dadosCategoria = buscarCategoria($idCategoria);

    if($rsCategoria = mysqli_fetch_assoc($dadosCategoria)) {
        session_start();

        $_SESSION['categoria'] = $rsCategoria;

        header('location: ../index.php');
    }
    else {
        echo("<script>
            alert('". BD_MSG_ERRO ."');
            window.history.back();
        </script>");
    }

?>