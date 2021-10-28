<?php

session_start();


require_once('functions/config.php');
require_once('bd/conexaoMySQL.php');
require_once(SRC . 'controller/exibeItens.php');

$id = (int) 0;
$nome = (string) null;
$desenvolvedor = (string) null;
$des = (string) null;
$preco = (int) null;
$idCategoria = (int) null;

$modo = (string) 'Salvar';

if(isset($_SESSION['produto'])) {
    $id = $_SESSION['produto']['produto'];
    $nome = $_SESSION['produto']['nome'];
    $desenvolvedor = $_SESSION['produto']['desenvolvedor'];
    $des = $_SESSION['produto']['des'];
    $preco = $_SESSION['produto']['preco'];
    $idCategoria = $_SESSION['produto']['idCategoria'];
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
        <title>Administração de Produtos</title>
    </head>
    <body>
        
        <?php
            require_once('shape/header.php');
        ?>

        <main>
            
            <h1> Administração de Produtos </h1>

            <div id="container-adm">

                <form action="controller/recebeProduto.php?id=<?=$id?>&modo=<?=$modo?>" name="frmCadastro" method="post" >

                    <div id="campo-container">
                        <div class="campo">
                            <div class="nome-campo">
                                <label>Nome:</label>
                            </div>
                            <input type="text" name="txtNome">
                        </div>

                        <div class="campo">
                            <div class="nome-campo">
                                <label>Desenvolvedora:</label>
                            </div>
                            <input type="text" name="txtDesenvolvedor">
                        </div>

                        <div class="campo">
                            <div class="nome-campo">
                                <label>Descrição:</label>
                            </div>
                            <input type="text" name="txtDes">
                        </div>

                        <div class="campo">
                            <div class="nome-campo">
                                <label>Preço:</label>
                            </div>
                            <input type="text" name="txtPreco">
                        </div>

                        <div class="campo">
                            <div class="nome-campo">
                                <label>Gênero:</label>
                            </div>
                            <select name="sltGenero">

                                <option value=""> Selecione Um Item </option>

                                <?php
                                
                                    $dadosCategorias = exibirCategorias();

                                    while($rsCategorias = mysqli_fetch_assoc($dadosCategorias)) {
                                
                                ?>

                                <option value="<?=$rsCategorias['idCategoria']?>">
                                        <?=$rsCategorias['nome']?>
                                </option>

                                <?php
                                    }
                                ?>

                            </select>
                        </div>
                        
                    </div>

                    <input type="submit" value="Salvar" name="btnSubmit">
                </form>

            </div>

            <div id="container-lista">
            <table id="tblConsulta" >
                <tr>
                    <td id="tblTitulo" colspan="5">
                        <h1> Consulta de Dados </h1>
                    </td>
                </tr>
                <tr id="tblLinhas">
                    <td class="tblColunas destaque"> Id </td>
                    <td class="tblColunas destaque"> Nome </td>
                    <td class="tblColunas destaque"> Preço </td>
                    <td class="tblColunas destaque"> Gênero </td>
                    <td class="tblColunas destaque"> Opções </td>
                </tr>

                <?php
                
                    $dadosProdutos = exibirProdutos();

                    while($rsProdutos = mysqli_fetch_assoc($dadosProdutos)) {
                
                ?>
                
                    <tr id="tblLinhas">
                        <td class="tblColunas registros"><?=$rsProdutos['idproduto']?></td>
                        <td class="tblColunas registros"><?=$rsProdutos['nome']?></td>
                        <td class="tblColunas registros"><?=$rsProdutos['preco']?></td>
                        <td class="tblColunas registros"><?=$rsProdutos['idCategoria']?></td>
                        <td class="tblColunas registros">
                            <a href=""> 
                                <img src="img/icons/edit.png" alt="Editar" title="Editar" class="editar">
                            </a>
                            <!-- Encaminhando id para o controller através de um link -->
                            <!-- E confirmando através do evento onclick com a função confirm e return(se True o html executa atarefa solicitada ) -->
                            <a href="#">
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