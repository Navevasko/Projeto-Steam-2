<?php

session_start();


require_once('functions/config.php');
require_once('bd/conexaoMySQL.php');
require_once(SRC . 'controller/exibeItens.php');

$id = (int) 0;
$nome = (string) null;

$modo = (string) 'Salvar';

if(isset($_SESSION['categoria'])) {
    $id = $_SESSION['categoria']['idcategoria'];
    $nome = $_SESSION['categoria']['nome'];
    $modo = 'Atualizar';
    unset($_SESSION['categoria']);
}

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

                <form action="controller/recebeCategoria.php?id=<?=$id?>&modo=<?=$modo?>" name="frmCadastro" method="post" >

                    <div id="campo-container">
                        <div class="campo">
                            <div class="nome-campo">
                                <label>Nome:</label>
                            </div>
                            <input type="text" name="txtNome" value="<?=$nome?>">
                        </div>
                    </div>

                    <input type="submit" value="<?=$modo?>" name="btnSubmit">
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

                    <?php
                    
                        $dadosCategorias = exibirCategorias();

                        while($rsCategorias = mysqli_fetch_assoc($dadosCategorias)) {
                    
                    ?>
                
                    <tr id="tblLinhas">
                        <td class="tblColunas registros"><?=$rsCategorias['idcategoria']?></td>
                        <td class="tblColunas registros"><?=$rsCategorias['nome']?></td>
                        <td class="tblColunas registros">
                            <a href="controller/editaCategoria.php?id=<?=$rsCategorias['idcategoria']?>"> 
                                <img src="img/icons/edit.png" alt="Editar" title="Editar" class="editar">
                            </a>
                            <a onclick="return confirm('Tem certeza que deseja excluir?');" href="controller/excluiCategoria.php?id=<?=$rsCategorias['idcategoria']?>">
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