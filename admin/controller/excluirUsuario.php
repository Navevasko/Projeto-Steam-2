<?php

require_once('../functions/config.php');
require_once(SRC . 'bd/excluirItem.php');

$idUsuario = $_GET['id'];

    if(deletarUsuario($idUsuario)){
        echo("<script>
                    alert('". BD_MSG_EXCLUIR ."');
                    window.location.href='../usuarios.php';
                </script>");
    }
    else {
        echo("<script>
                    alert('". BD_MSG_ERRO ."');
                    window.location.href='../usuarios.php';
                </script>");
    }

?>