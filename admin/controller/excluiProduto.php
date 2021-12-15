<?php

require_once('../functions/config.php');
require_once(SRC . 'bd/excluirItem.php');

$foto =(string) $_GET['foto'];
$idProduto = $_GET['id'];

    if(deletarProduto($idProduto)) {

        unlink(SRC.NOME_DIRETORIO_FILE.$foto);

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