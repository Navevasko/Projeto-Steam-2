<?php
    require_once("vendor/autoload.php");
    $app = new \Slim\App();
    $app->get('/produto', function($request, $response, $args){

        return $response   ->   withStatus(200)
                            ->   withHeader('Content-Type', 'application/json')
                            ->   write('{"message":"Não existem dados para essa requisição"}');

     });

     //$app->run();
?>