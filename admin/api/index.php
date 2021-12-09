<?php
    /* Permissões e configurações para a api responder em um seridor de verdade */
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
    header('Access-Control-Allow-Header: Content-Type');
    header('Content-Type: application/json');

    $url = (string) null;

    // Separando a URL
    $url = explode('/', $_GET['url']);

    //Estrutura condicional para encaminhar a API conforme a escolha 
    switch ($url[0]) {
        case 'produto':
            require_once('produtoAPI/index.php');
            break;

        case 'categoria':
            require_once('categoriaAPI/index.php');
            break;
    }
?>