<?php
require_once(SRC."/bd/listarItens.php");


function compararCategoria($idProduto,$idCategoria){
    if($idProduto != null){
       $produtoCategoria = selectProdutoCategoria($idProduto);
        while($rsProduto = mysqli_fetch_assoc($produtoCategoria)){
            if(strpos($idCategoria, $rsProduto['idCategoria']) !== false){
                return "checked";   
            }
        }    
    } 
    else{
        return "";
    }
}
?>