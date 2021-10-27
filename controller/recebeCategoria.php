<?php

    require_once(SRC . "functions/config.php");
    require_once(SRC . "bd/inserirCategoria.php");

    $categoria = (string) null;

if(isset($_GET['id'])) {
    $id = (int) $_GET['id'];
}
else {
    $id = (int) 0;
}


if($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $categoria = $_POST['txtNome'];
    
    if($categoria == null) {
        echo(ERRO_CAIXA_VAZIA);
    }
        elseif(strlen($categoria) > 100) {
            echo(ERRO_MAXLENGHT);
        }

            if(strtolower($_GET['modo']) == 'salvar') {
            if(inserirCategoria($categoria)) {
                echo("<script>alert('" . BD_MSG_INSERIR . "'); window.location.href='categorias.php';</script>");
            }
            else {
                echo(BD_MSG_ERRO);
            }
        }
        elseif(strtolower($_GET['modo']) == 'atualizar') {

            if(editar($categoria)) {
                echo(BD_MSG_INSERIR);
            }
            else {
                echo(BD_MSG_ERRO);
            }

        }
}

?>