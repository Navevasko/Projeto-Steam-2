<?php

    require_once('../functions/config.php');
    require_once(SRC . 'bd/inserirItem.php');
    require_once(SRC . 'bd/atualizarItem.php');

    $nome = (string) null;
    $usuario = (string) null;
    $senha = (string) null;

if(isset($_GET['id'])) {
    $id = (int) $_GET['id'];
}
else {
    $id = (int) 0;
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['txtNome'];
    $usuario = $_POST['txtUsuario'];
    $senha = $_POST['txtSenha'];

    if($nome == null || $usuario == null || $senha == null) {
        echo(ERRO_CAIXA_VAZIA);
    }
    elseif(strlen($nome) > 100 || strlen($usuario) > 15 || strlen($senha) > 25) {
            echo(ERRO_MAXLENGHT);
    }
    else {
        $usuario = array (
            "idUsuario" =>      $id,
            "nome"      =>      $nome,
            "usuario"   =>      $usuario,
            "senha"     =>      $senha
        );

        if(strtolower($_GET['modo']) == 'salvar') {
            if(inserirUsuario($usuario)) {
                echo("<script>
                alert('". BD_MSG_INSERIR ."');
                window.location.href='../usuarios.php';
                </script>");
            }
            else {
                echo("<script>
                alert('". BD_MSG_ERRO ."');
                window.location.href='../usuarios.php';
                </script>");
            }
        }
        elseif(strtolower($_GET['modo']) == 'atualizar') {
            if(editarUsuario($usuario)) {
                echo("<script>
                alert('". BD_MSG_INSERIR ."');
                window.location.href='../usuarios.php';
                </script>");
            }
            else {
                echo("<script>
                alert('". BD_MSG_ERRO ."');
                window.location.href='../usuarios.php';
                </script>");
            }
        }
    }
}


?>