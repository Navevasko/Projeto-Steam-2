<?php

    define ('SRC', $_SERVER['DOCUMENT_ROOT'] . '/ds2t20212/Guilherme/Projeto/Projeto-Steam-2/');

    const BD_SERVER = 'localhost';
    const BD_USER = 'root';
    const BD_PASSWORD = 'bcd127';
    const BD_DATABASE = 'dbprojeto20212t';

    //mensagens de erro
    const ERRO_CONEXAO_BD = "<script>alert('Não foi possivel realizar a conexão com o Banco de Dados, entre em contato com o Administrador do sistema.'); window.location.href='../dashboard.php';</script>";

    const ERRO_CAIXA_VAZIA = "<script>alert('Não foi possivel realizar a operação, pois existem campos obrigatorios que não foram preenchidos'); window.location.href='../dashboard.php';</script>";

    const ERRO_MAXLENGHT = "<script>alert('Não foi possível realizar a operação, pois a quantidade de cartacteres ultrapassa o permitido no banco de dados'); window.location.href='../dashboard.php';</script>";

    //Mensagens de aceitação e validação de dados no banco    
    const BD_MSG_INSERIR = "Registro salvo com sucesso";

    const BD_MSG_ERRO = "<script>alert('Não foi possivel manipular os dados no Banco de Dados'); window.location.href='../dashboard.php';</script>";

    const BD_MSG_EXCLUIR = "<script>alert('Registro excluido com sucesso'); window.location.href='dashboard.php';</script>";


?>