<?php

    define ('SRC', $_SERVER['DOCUMENT_ROOT']. '/Back-end/Projeto-Steam-2/produtos.php/');

    const BD_SERVER = 'localhost';
    const BD_USER = 'root';
    const BD_PASSWORD = 'bcd127';
    const BD_DATABASE = 'db_projeto_2021_2t';

    const ERRO_CONEXAO = 'Não foi possivel realizar a conexão com o Banco de Dados, por favor entre em contato com o administrador do sistemas';
    const ERRO_CAIXA_VAZIA = 'Não foi possível realizar a operação, pois existem campos obrigatórios a serem preenchidos';
    const ERRO_MAXLENGTH = 'Não foi possível realizar a operação, pois a quantidade de caracteres ultrapassou o limite.';

    const BD_INSERIDO = 'Registro salvo com sucesso no Banco de Dados!!';
    const BD_ERRO = 'ERRO: Não foi possivel manipular os dados no Banco de Dados';
    const BD_EXCLUIDO = 'Registro excluído com sucesso!!';

?>