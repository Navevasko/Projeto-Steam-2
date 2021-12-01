<?php

require_once("../functions/config.php");
require_once(SRC . "bd/inserirItem.php");
require_once(SRC . "bd/atualizarItem.php");
require_once(SRC . 'functions/upload.php');

$idProduto_Categoria = (int) null;
$idProduto = (int) null; 
$nome = (string) null;
$desenvolvedor = (string) null;
$des = (string) null;
$preco = (int) null;
$idCategoria = (int) null;
$foto = (string) null;

if(isset($_GET['id'])) {
    $id = (int) $_GET['id'];
}
else {
    $id = 0;
}

$arrayCategorias = array();
foreach($_POST as $array){
    if(strpos($array,"#categoria") !== false){
        $arrayCategorias[] = substr($array,11);
    }
}

$destaque = (int) 0;

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['txtNome'];
    $desenvolvedor = $_POST['txtDesenvolvedor'];
    $descricao = $_POST['txtDescricao'];
    if(isset($_POST['destaque'])){$destaque = $_POST['destaque'];}
    $foto = uploadFile($_FILES['fleFoto']);
    $preco = $_POST['txtPreco'];
    $idCategoria = $_POST['sltGenero'];

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
            'des'           =>      $des,
            'preco'         =>      $preco,
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

    else {
        $idProduto = $_POST['sltProduto'];
        $idCategoria = $_POST['sltGenero'];

        if(isset($_GET['id'])) {
            $idProduto_Categoria = $_GET['id'];
        }
        else {
            $idProduto_Categoria = 0;
        }

        $produto = array (
            'idProduto_Categoria'   =>      $idProduto_Categoria,
            'idproduto'             =>      $idProduto,
            'idCategoria'           =>      $idCategoria
        );

        if(strtolower($_GET['modo']) == 'salvar') {
            if(inserirProdutoCategoria($produto)) {
                echo("<script>
                alert('". BD_MSG_INSERIR ."');
                window.location.href='../produto_categoria.php';
                </script>");
            }
            else {
                echo("<script>
                alert('". BD_MSG_ERRO ."');
                window.location.href='../produto_categoria.php';
                </script>");
            }
        }
        elseif(strtolower($_GET['modo']) == 'atualizar') {
            if(editarProduto_Categoria($produto)) {
                echo("<script>
                alert('". BD_MSG_INSERIR ."');
                window.location.href='../produto_categoria.php';
                </script>");
            }
            else {
                echo("<script>
                alert('". BD_MSG_ERRO ."');
                
                </script>");
            }
        }

    }

        
    }

?>