<?php

    require_once('../functions/config.php');
    require_once(SRC . 'bd/inserirItem.php');
    require_once(SRC . 'bd/atualizarItem.php');

    $nome = (string) null;
    $email = (string) null;
    $celular = (string) null;

if(isset($_GET['id'])) {
    $id = (int) $_GET['id'];
}
else {
    $id = (int) 0;
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['txtNome'];
    $email = $_POST['txtEmail'];
    $celular = $_POST['txtCelular'];

    if($nome == null || $email == null || $celular == null) {
        echo("<script>
                alert('". ERRO_CAIXA_VAZIA ."');
                window.location.href='../index.php';
                </script>");
    }
    elseif(strlen($nome) > 100 || strlen($email) > 50 || strlen($celular) > 15) {
        echo("<script>
        alert('". ERRO_MAXLENGHT ."');
        window.location.href='../index.php';
        </script>");
    }
    else {
        $contato = array (
            "nome"      =>      $nome,
            "email"   =>      $email,
            "celular"     =>      $celular
        );

            if(inserirContato($contato)) {
                echo("<script>
                alert('". BD_MSG_INSERIR ."');
                window.location.href='../index.php';
                </script>");
            }
            else {
                echo("<script>
                alert('". BD_MSG_ERRO ."');
                
                </script>");
            }
    }
}


?>