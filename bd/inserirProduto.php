<?php

require_once('../bd/conexaoMysql.php');

function insertProduto($arrayProduto){
    $sql = "insert into tbl_produto(
                nome,
                desenvolvedor, 
                ano,
                preco
            )
            values('". $arrayProduto['nome']."',
                    '".$arrayProduto['desenvolvedor']."',
                    '".$arrayProduto['ano']."',
                    '".$arrayProduto['preco']."',
            )";
    $conexao = conexaoMysql();
    
    if(mysqli_query($conexao, $sql)){
        return true;
    }
    else{
        return false;
    }
}

?>