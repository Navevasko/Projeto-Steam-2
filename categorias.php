<?php

require_once('bd/conexaoMySQL.php');
require_once('controller/recebeCategoria.php');


?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" type="image/jpg" href="img/logo.png"/>
        <link rel="stylesheet" type="text/css" href="css/dashboard.css">
        <title>Administração de Categorias</title>
    </head>
    <body>
        
        <?php
            require_once('shape/header.php');
        ?>

        <main>
            
            <h1> Administração de Categorias </h1>

            <div id="container-adm">

                <form name="frmCadastro" method="post" >

                    <div id="campo-container">
                        <div class="campo">
                            <div class="nome-campo">
                                <label>Nome:</label>
                            </div>
                            <input type="text" name="txtNome">
                        </div>
                    </div>

                    <input type="submit" value="Salvar" name="btnSubmit">
                </form>

            </div>

            <div id="container-lista">
            <table id="tblConsulta" >
                <tr>
                    <td id="tblTitulo" colspan="3">
                        <h1> Consulta de Dados </h1>
                    </td>
                </tr>
                <tr id="tblLinhas">
                    <td class="tblColunas destaque"> Id </td>
                    <td class="tblColunas destaque"> Nome </td>
                    <td class="tblColunas destaque"> Opções </td>
                </tr>
                
                    <tr id="tblLinhas">
                        <td class="tblColunas registros"></td>
                        <td class="tblColunas registros"></td>
                        <td class="tblColunas registros">
                            <a href=""> 
                                <img src="img/icons/edit.png" alt="Editar" title="Editar" class="editar">
                            </a>
                            <a href="#">
                                <img src="img/icons/trash.png" alt="Excluir" title="Excluir" class="excluir">
                            </a>
                        </td>
                    </tr>

            </table>
            
        </main>

        <?php
            require_once('shape/footer.php');
        ?>

    </body>
</html>