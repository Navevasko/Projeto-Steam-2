<?php

    require_once("../functions/config.php");
    require_once(SRC . "bd/inserirItem.php");
    require_once(SRC . "bd/atualizarItem.php");

    $nome = (string) null;

if(isset($_GET['id'])) {
    $id = (int) $_GET['id'];
}
else {
    $id = (int) 0;
}


if($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $nome = $_POST['txtNome'];
    
    if($nome == null) {
        echo("<script>
                alert('". ERRO_CAIXA_VAZIA ."');
                window.location.href='../categorias.php';
                </script>");
    }
    elseif(strlen($nome) > 100) {
        echo("<script>
        alert('". ERRO_MAXLENGHT ."');
        window.location.href='../categorias.php';
        </script>");
    }
    else {
        $categoria = array (
            'nome'      =>      $nome,
            'id'        =>      $id
        );

        if(strtolower($_GET['modo']) == 'salvar') {
            if(inserirCategoria($categoria)) {
                echo("<script>
                alert('". BD_MSG_INSERIR ."');
                window.location.href='../categorias.php';
                </script>");
            }
            else {
                echo("<script>
                alert('". BD_MSG_ERRO ."');
                window.location.href='../categorias.php';
                </script>");
            }
        }
        elseif(strtolower($_GET['modo']) == 'atualizar') {
            if(editarCategoria($categoria)) {
                echo("<script>
                alert('". BD_MSG_INSERIR ."');
                window.location.href='../categorias.php';
                </script>");
            }
            else {
                echo("<script>
                alert('". BD_MSG_ERRO ."');
                window.location.href='../categorias.php';
                </script>");
            }
        }
    }
}

?>