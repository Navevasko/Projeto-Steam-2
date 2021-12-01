<?php

session_start();


require_once('functions/config.php');
require_once('functions/compararCategoria.php');
require_once('bd/conexaoMySQL.php');
require_once(SRC . 'controller/exibeItens.php');

$id = (int) 0;
$nome = (string) null;
$desenvolvedor = (string) null;
$descricao = (string) null;
$preco = (int) null;
$desconto = (int) null;
$idCategoria = (int) null;
$nomeCategoria = (string) 'Selecione um Genero';

$modo = (string) 'Salvar';

if(isset($_SESSION['produto'])) {
    $id = $_SESSION['produto']['idproduto'];
    $nome = $_SESSION['produto']['nome'];
    $desenvolvedor = $_SESSION['produto']['desenvolvedor'];
    $descricao = $_SESSION['produto']['descricao'];
    $desconto = $_SESSION['produto']['desconto'];
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
            
        <div id="titulo">

            <h1>Gerenciamento de Produtos</h1>

        </div>

            <div id="container-adm">

                <form enctype="multipart/form-data" action="controller/recebeProduto.php?id=<?=$id?>&modo=<?=$modo?>" name="frmCadastro" method="POST" >

                    <div id="campo-container">
                        <div class="campo">
                            <div class="nome-campo">
                                <label>Nome:</label>
                            </div>
                            <input type="text" name="txtNome" value="<?=$nome?>">
                        </div>

                        <div class="campo">
                            <div class="nome-campo">
                                <label for="txtNome">
                                    Foto:
                                </label>
                            </div>
                            <label for="fleFoto" id="input-file"></label>
                            <input type="file" name="fleFoto" id="fleFoto" accept="image/jpeg,image/png,image/jpg">
                        </div>

                        <div class="campo">
                            <div class="nome-campo">
                                <label>Desenvolvedora:</label>
                            </div>
                            <input type="text" name="txtDesenvolvedor" value="<?=$desenvolvedor?>">
                        </div>

                        <div class="campo">
                            <div class="nome-campo">
                                <label>Desconto:</label>
                            </div>
                            <input type="text" name="txtDesconto" value="<?=$desconto?>">
                        </div>

                        <div class="campo">
                            <div class="nome-campo">
                                <label>Preço:</label>
                            </div>
                            <input type="text" name="txtPreco" value="<?=$preco?>">
                        </div>

                        <div class="campo">
                            <div class="nome-campo">
                                <label>Destaque:</label>
                            </div>
                            <input type="checkbox" name="destaque" value="<?=$desconto?>">
                        </div>
                        
                    </div>

                    <div id="container-campos">
                        <div id="box-categoria">

                            <label id="titulo-categoria"> Categorias: </label>

                            <select name="sltGenero">
                                <option value="<?=$idCategoria?>"><?=$nomeCategoria?></option>
                                
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
                        <div id="descricao">
                            <label> Descrição: </label>
                            <textarea name="txtDescricao" cols="50" rows="7"><?=$descricao?></textarea>
                        </div>
                    </div>

                    <input type="submit" value="Salvar" name="btnSubmit">
                </form>

            </div>

            <div id="container-lista">
            <table id="tblConsulta" >
                <tr>
                    <td id="tblTitulo" colspan="6">
                        <h1> Consulta de Dados </h1>
                    </td>
                </tr>
                <tr id="tblLinhas">
                    <td class="tblColunas destaque"> Id </td>
                    <td class="tblColunas destaque"> Foto </td>
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
                        <td class="tblColunaImg"><img src="arquivos/<?=$rsProdutos['foto']?>"></td>
                        <td class="tblColunas registros"><?=$rsProdutos['nome']?></td>
                        <td class="tblColunas registros"><?=$rsProdutos['preco']?></td>
                        <td class="tblColunas registros"><?=$rsProdutos['nomeCategoria']?></td>
                        <td class="tblColunas registros">
                            <a href="controller/editaProduto.php?id=<?=$rsProdutos['idproduto']?>"> 
                                <img src="img/icons/edit.png" alt="Editar" title="Editar" class="editar">
                            </a>
                            
                            <a onclick="return confirm('Tem certeza que deseja excluir?');" href="controller/excluiProduto.php?id=<?=$rsProdutos['idproduto']?>&foto=<?=$rsProdutos['foto']?>">
                                <img src="img/icons/trash.png" alt="Excluir" title="Excluir" class="excluir">
                            </a>
                            </td>
                        </tr>

                    <?php
                        }
                    ?>

                </table>
            </div>
        </main>

        <?php
            require_once('shape/footer.php');
        ?>

    </body>
</html>