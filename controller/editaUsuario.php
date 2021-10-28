<?php

require_once('../functions/config.php');
require_once(SRC . 'bd/listarItens.php');

$idUsuario = $_GET['id'];

$dadosUsuario = buscarUsuario($idUsuario);

        if($rsUsuario = mysqli_fetch_assoc($dadosUsuario)) {
            session_start();

            $_SESSION['usuario'] = $rsUsuario;

            header('location: ../usuarios.php');
        }
        else{
            echo("<script>
            alert('". BD_MSG_ERRO ."');
            window.location.href='../categorias.php';
            </script>");
        }

?>