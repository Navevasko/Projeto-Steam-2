<?php

require_once(SRC . 'bd/listarItens.php');

/*******************PRODUTOS********************/ 

function exibirProdutos() {
    $dadosProdutos = listarProdutos();
    return $dadosProdutos;
}

function searchProduto($id) {
    $dadosProdutos = buscarProdutos($id);
    return $dadosProdutos;
}

function criarArrayProduto($produto) {
    $cont = (int) 0;

    while($rsProduto = mysqli_fetch_assoc($produto)) {
        $arrayProduto[$cont] = array (
            'id'            =>      $rsProduto['idproduto'],
            'nome'          =>      $rsProduto['nome'],
            'desenvolvedor' =>      $rsProduto['desenvolvedor'],
            'preco'         =>      $rsProduto['preco'],
            'idCategoria'   =>      $rsProduto['idCategoria'],
            'foto'          =>      $rsProduto['foto'],
            'destaque'      =>      $rsProduto['destaque'],
            'desconto'      =>      $rsProduto['desconto'],
            'descricao'     =>      $rsProduto['descricao'],
            'nomeCategoria' =>      $rsProduto['nomeCategoria']
        );
        $cont++;
    }

    if(isset($arrayProduto)) {
        return $arrayProduto;
    }
    else {
        return false;
    }
}

/**********************************************/


/*******************CATEGORIAS********************/ 

function exibirCategorias() {
    $dadosCategoria = listarCategorias();
    return $dadosCategoria;
}

function searchCategoria($id) {
    $dadosCategoria = buscarCategoria($id);
    return $dadosCategoria;
}

function criarArrayCategoria($categoria) {
    $cont = (int) 0;

    while($rsCategoria = mysqli_fetch_assoc($categoria)) {
        $arrayCategoria[$cont] = array (
            'id'            =>      $rsCategoria['idcategoria'],
            'nomeCategoria' =>      $rsCategoria['nomeCategoria'],
        );
        $cont++;
    }

    if(isset($arrayCategoria)) {
        return $arrayCategoria;
    }
    else {
        return false;
    }
}

/************************************************/


/*******************CONTATOS********************/ 

function exibirContatos() {
    $dadosContato = listarContatos();
    return $dadosContato;

}

/**********************************************/


/*******************USUARIOS********************/ 

function exibirUsuarios() {
    $dadosUsuarios = listarUsuarios();
    return $dadosUsuarios;
}

/**********************************************/

/*******************JSON**********************/ 

function criarJSON($array) {

    // Espicificando que será gerado um JSON
    header("content-type:application/json");

    // Convertendo o array para JSON
    $listJSON = json_encode($array);

    // Verificando se o JSON foi criado
    if(isset($listJSON)) {
        return $listJSON;
    }
    else {
        return false;
    }
}

?>