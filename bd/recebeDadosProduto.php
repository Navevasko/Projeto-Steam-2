<?php

require_once('../functions/config.php');

require_once(SRC . '/bd/inserirCliente.php');


if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $nome = (String) $_POST['txtNome'];
    $desenvolvedora = (String) $_POST['txtDesenvolvedora'];
    $ano = (String) $_POST['txtDate'];
    $preco = (String) $_POST['txtPreco'];
    

    if($nome == null || $preco == null){
        echo("<script>
                alert('" . ERRO_CAIXA_VAZIA . "') 
                window.history.back()
            </script>");
    }
    else if(strlen($nome) > 100 || strlen($ano) > 4 || strlen($desenvolvedora) > 100){
        echo("<script> 
                alert('". ERRO_MAXLENGTH . "')
                window.history.back()
            </script>");
    }
    else{
        $produto = array (
            "nome" => $nome,
            "desenvolvedor" => $desenvolvedora,
            "ano" => $ano,
            "preco" => $preco,
        );

        if(insertProduto($produto)){
            echo("<script>
                    alert('".BD_INSERIDO."')
                    window.location.href = '../index.php';
                </script>");
        }
        else{
            echo("<script>
                    alert('".BD_ERRO."')
                    window.history.back()
                </script>");
        }
    }
}
?>