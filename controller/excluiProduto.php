<?php

require_once('../functions/config.php');
require_once(SRC . 'bd/excluirItem.php');

$idProduto = $_GET['id'];

    if(deletarProduto($idProduto)) {
        echo("<script>
                    alert('". BD_MSG_EXCLUIR ."');
                    window.location.href='../produtos.php';
                </script>");
    }
    else {
        echo("<script>
                    alert('". BD_MSG_ERRO ."');
                    window.location.href='../produtos.php';
                </script>");
    }

?>