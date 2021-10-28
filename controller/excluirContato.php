<?php

require_once('../functions/config.php');
require_once(SRC . 'bd/excluirItem.php');

$idContato = $_GET['id'];

    if(deletarContato($idContato)) {
        echo("<script>
                    alert('". BD_MSG_EXCLUIR ."');
                    window.location.href='../contatos.php';
                </script>");
    }
    else {
        echo("<script>
                    alert('". BD_MSG_ERRO ."');
                    window.location.href='../contatos.php';
                </script>");
    }

?>