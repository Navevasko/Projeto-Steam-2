<?php
require_once("conexaoMysql.php");

function exibirProduto($idProduto){
    
    $sql = "select * from tbl_produto where id_produto=" . $idProduto;
    $conexao = conexaoMysql();

    $selectInstancia = mysqli_query($conexao, $sql);

    return $selectInstancia;
     
}
?>