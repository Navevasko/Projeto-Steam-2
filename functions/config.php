<?php

    define ('SRC', $_SERVER['DOCUMENT_ROOT'] . '/Back-end/Projeto-Steam-2/');

    const BD_SERVER = 'localhost';
    const BD_USER = 'root';
    const BD_PASSWORD = 'bcd127';
    const BD_DATABASE = 'dbprojeto20212t';

    //mensagens de erro
    const ERRO_CONEXAO_BD = "Não foi possivel realizar a conexão com o Banco de Dados, entre em contato com o Administrador do sistema.'); window.location.href='../dashboard.php';</script>";

    const ERRO_CAIXA_VAZIA = "Não foi possivel realizar a operação, pois existem campos obrigatorios que não foram preenchidos";

    const ERRO_MAXLENGHT = "Não foi possível realizar a operação, pois a quantidade de cartacteres ultrapassa o permitido no banco de dados";

    //Mensagens de aceitação e validação de dados no banco    
    const BD_MSG_INSERIR = "Registro salvo com sucesso";

    const BD_MSG_ERRO = "Não foi possivel manipular os dados no Banco de Dados";

    const BD_MSG_EXCLUIR = "Registro excluido com sucesso";

    define('NOME_DIRETORIO_FILE' , 'arquivos/');
    $extensoesPermitidasFile = array ("image/png", "image/jpg", "image/jpeg");
    define('EXTENSOES_PERMITIDAS', $extensoesPermitidasFile);
    const TAMANHO_FILE = "5120";

?>