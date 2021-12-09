<?php

session_start();


require_once('functions/config.php');
require_once('bd/conexaoMySQL.php');
require_once(SRC . 'controller/exibeItens.php');

$id = (int) 0;
$nome = (string) null;
$usuario = (string) null;
$senha = (string) null;
$modo = (string) 'Salvar';
$tipoSenha = (string) 'password';

if(isset($_POST['btnSenha'])) {
    $tipoSenha = "text";
}

if(isset($_SESSION['usuario'])) {
    $id = $_SESSION['usuario']['idUsuario'];
    $nome = $_SESSION['usuario']['nome'];
    $usuario = $_SESSION['usuario']['usuario'];
    $senha = $_SESSION['usuario']['senha'];
    $modo = 'Atualizar';
    unset($_SESSION['usuario']);
}

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" type="image/jpg" href="../img/logo.png"/>
        <link rel="stylesheet" type="text/css" href="../css/dashboard.css">
        <title>Administração de Usuários</title>
    </head>
    <body>
        
        <?php
            require_once('shape/header.php');
        ?>

        <main>
            
        <div id="titulo">

            <h1>Gerenciamento de Usuarios</h1>

        </div>

            <div id="container-adm">

                <form action="controller/recebeUsuario.php?id=<?=$id?>&modo=<?=$modo?>" name="frmCadastro" method="post" >

                    <div id="campo-container">
                        <div class="campo">
                            <div class="nome-campo">
                                <label>Nome:</label>
                            </div>
                            <input type="text" name="txtNome" value="<?=$nome?>">
                        </div>

                        <div class="campo">
                            <div class="nome-campo">
                                <label>Usuário:</label>
                            </div>
                            <input type="text" name="txtUsuario" value="<?=$usuario?>">
                        </div>

                        <div class="campo">
                            <div class="nome-campo">
                                <label>Senha:</label>
                            </div>
                            <input class="senha" type="password" name="txtSenha" value="">
                        </div>

                    </div>

                    <input type="submit" value="<?=$modo?>" name="btnSubmit">
                </form>

            </div>

            <div id="container-lista">
            <table id="tblConsulta" >
                <tr>
                    <td id="tblTitulo" colspan="4">
                        <h1> Consulta de Dados </h1>
                    </td>
                </tr>
                <tr id="tblLinhas">
                    <td class="tblColunas destaque"> Id </td>
                    <td class="tblColunas destaque"> Nome </td>
                    <td class="tblColunas destaque"> Opções </td>
                </tr>
                
                <?php
                
                    $dadosUsuarios = exibirUsuarios();

                    while($rsUsuarios = mysqli_fetch_assoc($dadosUsuarios)) {
                
                ?>
                    <tr id="tblLinhas">
                        <td class="tblColunas registros"><?=$rsUsuarios['idUsuario']?></td>
                        <td class="tblColunas registros"><?=$rsUsuarios['nome']?></td>
                        <td class="tblColunas registros">
                            <a href="controller/editaUsuario.php?id=<?=$rsUsuarios['idUsuario']?>"> 
                                <img src="../img/icons/edit.png" alt="Editar" title="Editar" class="editar">
                            </a>

                            <a onclick="return confirm('Tem certeza que deseja excluir?')" href="controller/excluirUsuario.php?id=<?=$rsUsuarios['idUsuario']?>">
                                <img src="../img/icons/trash.png" alt="Excluir" title="Excluir" class="excluir">
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