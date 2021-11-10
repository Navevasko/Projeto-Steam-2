<?php

session_start();


require_once('functions/config.php');
require_once('bd/conexaoMySQL.php');
require_once(SRC . 'controller/exibeItens.php');

$id = (int) 0;
$nome = (string) "Selecione um Item";
$idCategoria = (int) null;
$nomeCategoria = "Selecione um Item";
$tipoPagina = (string) "Produto_Categoria";

$modo = (string) 'Salvar';

if(isset($_SESSION['produto'])) {
    $id = $_SESSION['produto']['idproduto'];
    $nome = $_SESSION['produto']['nome'];
    $idCategoria = $_SESSION['produto']['idCategoria'];
    $nomeCategoria = $_SESSION['produto']['nomeCategoria'];
    $modo = 'Atualizar';
    unset($_SESSION['produto']);
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

                <form action="controller/recebeProduto.php?id=<?=$id?>&modo=<?=$modo?>&tipo=<?=$tipoPagina?>" name="frmCadastro" method="post" >

                    <div id="campo-container">

                        <div class="campo">
                                <div class="nome-campo">
                                    <label>Produto:</label>
                                </div>
                                <select name="sltProduto">

                                    <option value="<?=$idproduto?>"> <?=$nome?> </option>

                                    <?php
                                    
                                        $dadosProdutos = exibirProdutos();

                                        while($rsProdutos = mysqli_fetch_assoc($dadosProdutos)) {
                                    
                                    ?>

                                    <option value="<?=$rsProdutos['idproduto']?>">
                                            <?=$rsProdutos['nome']?>
                                    </option>

                                    <?php
                                        }
                                    ?>

                                </select>
                            </div>

                            <div class="campo">
                                <div class="nome-campo">
                                    <label>Gênero:</label>
                                </div>
                                <select name="sltGenero">

                                    <option value="<?=$idCategoria?>"> <?=$nomeCategoria?> </option>

                                    <?php
                                    
                                        $dadosCategorias = exibirCategorias();

                                        while($rsCategorias = mysqli_fetch_assoc($dadosCategorias)) {
                                    
                                    ?>

                                    <option value="<?=$rsCategorias['idcategoria']?>">
                                            <?=$rsCategorias['nomeCategoria']?>
                                    </option>

                                    <?php
                                        }
                                    ?>

                                </select>
                            </div>
                            
                        </div> 

                    <input type="submit" value="<?=$modo?>" name="btnSubmit">
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
                    <td class="tblColunas destaque"> Foto </td>
                    <td class="tblColunas destaque"> Nome </td>
                    <td class="tblColunas destaque"> Gênero </td>
                    <td class="tblColunas destaque"> Opções </td>
                </tr>

                <?php
                
                    $dadosProdutos = exibirProdutos();

                    while($rsProdutos = mysqli_fetch_assoc($dadosProdutos)) {
                
                ?>
                
                    <tr id="tblLinhas">
                        <td class="tblColunas registros"><?=$rsProdutos['idproduto']?></td>
                        <td class="tblColunas registros"><img class="foto" src="<?=NOME_DIRETORIO_FILE.$rsProdutos['foto']?>" alt=""></td>
                        <td class="tblColunas registros"><?=$rsProdutos['nome']?></td>
                        <td class="tblColunas registros"><?=$rsProdutos['idCategoria']?></td>
                        <td class="tblColunas registros">
                            <a href="controller/editaProduto_Categoria.php?id=<?=$rsProdutos['idproduto']?>"> 
                                <img src="img/icons/edit.png" alt="Editar" title="Editar" class="editar">
                            </a>
                            
                            <a onclick="return confirm('Tem certeza que deseja excluir?');" href="controller/excluiProduto.php?id=<?=$rsProdutos['idproduto']?>">
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