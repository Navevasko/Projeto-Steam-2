<?php

require_once("../functions/config.php");
require_once(SRC . "bd/inserirItem.php");
require_once(SRC . "bd/atualizarItem.php");

$nome = (string) null;
$desenvolvedor = (string) null;
$des = (string) null;
$preco = (int) null;
$idCategoria = (int) null;

if(isset($_GET['id'])) {
    $id = (int) $_GET['id'];
}
else {
    $id = 0;
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['txtNome'];
    $desenvolvedor = $_POST['txtDesenvolvedor'];
    $des = $_POST['txtDes'];
    $preco = $_POST['txtPreco'];
    $idCategoria = $_POST['sltGenero'];

    if($nome == null || $desenvolvedor == null || $des == null || $preco == null) {
        echo("<script>
                alert('". ERRO_CAIXA_VAZIA ."');
                window.location.href='../produtos.php';
                </script>");
    }
    elseif(strlen($nome) > 100 || strlen($desenvolvedor) > 100) {
        echo("<script>
        alert('". ERRO_MAXLENGHT ."');
        window.location.href='../produtos.php';
        </script>");
    }
    else {
        $produto = array (
            'nome'          =>      $nome,
            'desenvolvedor' =>      $desenvolvedor,
            'des'           =>      $des,
            'preco'         =>      $preco,
            'idCategoria'   =>      $idCategoria
        );

        if(strtolower($_GET['modo']) == 'salvar') {
            if(inserirProduto($produto)) {
                echo("<script>
                alert('". BD_MSG_INSERIR ."');
                window.location.href='../produtos.php';
                </script>");
            }
            else {
                echo("<script>
                alert('". BD_MSG_ERRO ."');
              
                </script>");
            }
        }
        elseif(strtolower($_GET['modo']) == 'atualizar') {
            if(editarProduto($produto)) {
                echo("<script>
                alert('". BD_MSG_INSERIR ."');
                window.location.href='../produtos.php';
                </script>");
            }
            else {
                echo("<script>
                alert('". BD_MSG_ERRO ."');
                window.location.href='../produtos.php';
                </script>");
            }
        }
    }
}

?>