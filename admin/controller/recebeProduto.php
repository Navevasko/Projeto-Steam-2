<?php

require_once("../functions/config.php");
require_once(SRC . "bd/inserirItem.php");
require_once(SRC . "bd/atualizarItem.php");
require_once(SRC . 'functions/upload.php');
require_once(SRC . 'bd/listarItens.php');

$idProduto = (int) null; 
$nome = (string) null;
$desenvolvedor = (string) null;
$desconto = (int) null;
$descricao = (string) null;
$preco = (int) null;
$destaque = (string) 'false';
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

var_dump($arrayCategorias);

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['txtNome'];
    $desenvolvedor = $_POST['txtDesenvolvedor'];
    $descricao = $_POST['txtDescricao'];
    if(isset($_POST['destaque'])){$destaque = 'true';}
    $foto = uploadFile($_FILES['fleFoto']);
    $preco = $_POST['txtPreco'];
    $desconto = $_POST['txtDesconto'];
    

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
            'idProduto'     =>      $id,
            'nome'          =>      $nome,
            'desenvolvedor' =>      $desenvolvedor,
            'descricao'           =>      $descricao,
            'preco'         =>      $preco,
            'destaque'      =>      $destaque,
            'desconto'      =>      $desconto,
            'foto'          =>      $foto
        );

        if(strtolower($_GET['modo']) == 'salvar') {
            if(inserirProduto($produto)) {
                $ultimoProduto = buscarUltimoProduto();
                $rsProduto = mysqli_fetch_assoc($ultimoProduto);
                $idUltimoProduto = $rsProduto['idproduto'];

                if(inserirProdutoCategoria($idUltimoProduto, $arrayCategorias)){
                    echo("<script>
                            alert('".BD_MSG_INSERIR."');
                            window.location.href='../produtos.php';  
                        </script>");
                }
                else{
                    echo("<script>
                        alert('".BD_MSG_ERRO."');
                        window.location.href='../produtos.php';
                    </script>");
                }

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