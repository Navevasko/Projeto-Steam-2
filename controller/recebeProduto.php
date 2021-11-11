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

if(isset($_GET['tipo'])) {
    $tipoPagina = (string) $_GET['tipo'];
}
else {
    $tipoPagina = (string) null;
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    if($tipoPagina != "Produto_Categoria") { 
        $nome = $_POST['txtNome'];
        $desenvolvedor = $_POST['txtDesenvolvedor'];
        $des = $_POST['txtDes'];
        $preco = $_POST['txtPreco'];
        $idCategoria = $_POST['sltGenero'];
        $foto = uploadFile($_FILES['fleFoto']);

        if($nome == null || $desenvolvedor == null || $des == null || $preco == null || $idCategoria == null) {
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

         $produto = array (
            'idproduto'     =>      $id,
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