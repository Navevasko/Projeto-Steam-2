<?php

require_once('../functions/config.php');
require_once(SRC . 'bd/excluirItem.php');

$idCategoria = $_GET['id'];

    if(deletarCategoria($idCategoria)) {
        echo("<script>
                    alert('". BD_MSG_EXCLUIR ."');
                    window.location.href='../categorias.php';
                </script>");
    }
    else {
        echo("<script>
                    alert('". BD_MSG_ERRO ."');
                    window.location.href='../categorias.php';
                </script>");
    }

?>


mano como que passa o id na do contato sendo que não tem nem form pra ele