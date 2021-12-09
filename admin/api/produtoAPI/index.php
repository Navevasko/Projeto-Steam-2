<?php
    require_once("vendor/autoload.php");
    require_once('../functions/config.php');

    $app = new \Slim\App();


    $app->get('/produto', function($request, $response, $args){

        require_once('../controller/exibeItens.php');

        
        if(isset($request->getQueryParams()['nome'])){

            $nome = (string) null;

            $nome = $request->getQueryParams()['nome'];

            if($listProdutos = buscarNomeProduto($nome)) {
                if($listProdutosArray = criarArrayProduto($listProdutos)) {
                    $listProdutosJSON = criarJSON($listProdutosArray);
                }
           }
           
        }

        else {
            if($listProdutos = exibirProdutos()) {
                if($listProdutosArray = criarArrayProduto($listProdutos)) {
                    $listProdutosJSON = criarJSON($listProdutosArray);
                }
           }
        }

        if($listProdutosArray){
            return $response    ->   withStatus(200)
                                ->   withHeader('Content-Type', 'application/json')
                                ->   write($listProdutosJSON);
        }
        else {
            return $response    ->  withStatus(204)
                                ->  withHeader('Content-Type', 'application/json')
                                ->  write('{"message":"Não existem dados para essa requisição"}');
        }

    });

    $app->get('/produto/{id}', function($request, $response, $args) {

        require_once('../controller/exibeItens.php');

        $id = $args['id'];
        
        //Chama a função (na pasta controles) que vai requisitar os dados no BD
        if($listProdutos = searchProduto($id)){
            if($listProdutosArray = criarArrayProduto($listProdutos)){
                $listProdutosJSON = criarJSON($listProdutosArray);
            }
        }

        //Tratativa pra ver se existem dados
        if($listProdutosArray){
            return $response    ->   withStatus(200)
                                ->   withHeader('Content-Type', 'application/json')
                                ->   write($listProdutosJSON);
        }
        else {
            return $response    ->  withStatus(204)
                                ->  withHeader('Content-Type', 'application/json')
                                ->  write('{"message":"Não existem dados para essa requisição"}');
        }

    });

    $app->run();
?>