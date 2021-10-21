<?php

function conexaoMySQL() {
    $server = (string) BD_SERVER;
    $user = (string) BD_USER;
    $password = (string) BD_PASSWORD;
    $database = (string) BD_DATABASE;

    if ($conexao = mysqli_connect($server, $user, $password, $database)) {
        return $conexao;
    }
    else {
        echo(ERRO_CONEXAO);
        return false
    }
}

?>