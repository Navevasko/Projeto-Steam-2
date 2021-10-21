<?php

    require_once(SRC . "functions/config.php");
    require_once(SRC . "bd/inserirCategoria.php");

    $categoria = (string) null;


if($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $categoria = $_POST['txtNome'];
    
    if($categoria == null) {
        echo(ERRO_CAIXA_VAZIA);
    }
        elseif(strlen($categoria) > 100) {
            echo(ERRO_MAXLENGHT);
        }
            elseif(inserirCategoria($categoria)) {
                echo("<script>alert('" . BD_MSG_INSERIR . "'); window.location.href='categorias.php';</script>");
            }
            else {
                echo(BD_MSG_ERRO);
            }
}

?>