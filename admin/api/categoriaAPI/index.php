<?php
    require_once("vendor/autoload.php");
    require_once('../functions/config.php');

    $app = new \Slim\App();


    $app->get('/categoria', function($request, $response, $args){

        require_once('../controller/exibeItens.php');

        if(isset($request->getQueryParams()['nome'])){

            $nome = (string) null;

            $nome = $request->getQueryParams()['nome'];

            if($listDados = buscarNomeClientes($nome)){
                if($listDadosArray = criarArray($listDados)){
                    $listDadosJSON = criarJSON($listDadosArray);
                }
            }
           
        }

         if($listCategorias = exibirCategorias()) {
             if($listCategoriasArray = criarArrayCategoria($listCategorias)) {
                 $listCategoriasJSON = criarJSON($listCategoriasArray);
             }
        }

        if($listCategoriasArray){
            return $response    ->   withStatus(200)
                                ->   withHeader('Content-Type', 'application/json')
                                ->   write($listCategoriasJSON);
        }
        else {
            return $response    ->  withStatus(204)
                                ->  withHeader('Content-Type', 'application/json')
                                ->  write('{"message":"Não existem dados para essa requisição"}');
        }

    });

    $app->get('/categoria/{id}', function($request, $response, $args) {

        require_once('../controller/exibeItens.php');

        $idCategoria = $args['id'];
        
        //Chama a função (na pasta controles) que vai requisitar os dados no BD
        if($listProduto = buscarProdutoCategoria($idCategoria)){
            if($listProdutoArray = criarArrayProduto($listProduto)){
                $listProdutoJSON = criarJSON($listProdutoArray);
            }
        }

        //Tratativa pra ver se existem dados
        if($listProdutoArray){
            return $response    ->   withStatus(200)
                                ->   withHeader('Content-Type', 'application/json')
                                ->   write($listProdutoJSON);
        }
        else {
           return $response     ->  withStatus(204)
                                ->  withHeader('Content-Type', 'application/json')
                                ->  write('{"message":"Não existem dados para essa requisição"}');
        }

    });

    $app->run();
?>