<?php

session_start();


require_once('functions/config.php');
require_once('bd/conexaoMySQL.php');
require_once(SRC . 'controller/exibeItens.php');

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" type="image/jpg" href="img/logo.png"/>
        <link rel="stylesheet" type="text/css" href="css/dashboard.css">
        <title>Administração de Contatos</title>
    </head>
    <body>
        
        <?php
            require_once('shape/header.php');
        ?>

        <main>
            
            <h1> Administração de Contatos </h1>

            <div id="container-lista">
            <table id="tblConsulta" >
                <tr>
                    <td id="tblTitulo" colspan="4">
                        <h1> Consulta de Dados </h1>
                    </td>
                </tr>
                <tr id="tblLinhas">
                    <td class="tblColunas destaque"> Nome </td>
                    <td class="tblColunas destaque"> Email </td>
                    <td class="tblColunas destaque"> Celular </td>
                    <td class="tblColunas destaque"> Opções </td>
                </tr>

                <?php
                    
                        $dadosContatos = exibirContatos();

                        while($rsContatos = mysqli_fetch_assoc($dadosContatos)) {
                    
                    ?>
                
                    <tr id="tblLinhas">
                        <td class="tblColunas registros"><?=$rsContatos['nome']?></td>
                        <td class="tblColunas registros"><?=$rsContatos['email']?></td>
                        <td class="tblColunas registros"><?=$rsContatos['celular']?></td>
                        <td class="tblColunas registros">
                        <a onclick="return confirm('Tem certeza que deseja excluir?');" href="controller/excluirContato.php?id=<?=$rsContatos['idContato']?>">
                                <img src="img/icons/trash.png" alt="Excluir" title="Excluir" class="excluir">
                            </a>
                        </td>
                    </tr>

                    <?php
                        }
                    ?>

            </table>
            
        </main>

        <?php
            require_once('shape/footer.php');
        ?>

    </body>
</html>