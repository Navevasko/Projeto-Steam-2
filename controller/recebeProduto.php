<?php

require_once("../functions/config.php");
require_once(SRC . "bd/inserirItem.php");
require_once(SRC . "bd/atualizarItem.php");
require_once(SRC . 'functions/upload.php');

$idProduto = (int) null; 
$nome = (string) null;
$desenvolvedor = (string) null;
$desconto = (int) null;
$descricao = (string) null;
$preco = (int) null;
$destaque = (string) 'false';
$idCategoria = (int) 0;
$foto = (string) null;

if(isset($_GET['id'])) {
    $id = (int) $_GET['id'];
}
else {
    $id = 0;
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['txtNome'];
    $desenvolvedor = $_POST['txtDesenvolvedor'];
    $descricao = $_POST['txtDescricao'];
    if(isset($_POST['destaque'])){$destaque = 'true';}
    $foto = uploadFile($_FILES['fleFoto']);
    $preco = $_POST['txtPreco'];
    $idCategoria = $_POST['sltGenero'];
    $desconto = $_POST['txtDesconto'];

    var_dump($_POST);
    

    if($nome == null || $desenvolvedor == null || $descricao == null || $preco == null) {
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
            'descricao'           =>      $descricao,
            'preco'         =>      $preco,
            'destaque'      =>      $destaque,
            'desconto'      =>      $desconto,
            'idCategoria'   =>      $idCategoria,
            'foto'          =>      $foto
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
                window.location.href='../produtos.php';
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