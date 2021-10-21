<?php

$nome = (string) null;
$desenvolvedora = (string) null;
$data = (string) null;
$preco = (float) null;


if(isset($_POST['btnSubmit'])) {

    if($_POST['txtNome'] != "" && $_POST['txtDes'] != "" && $_POST['txtDate'] != "" && $_POST['txtPreco'] != "") { 

    $nome = $_POST['txtNome'];
    $desenvolvedora = $_POST['txtDes'];
    $data = $_POST['txtDate'];
    $preco = $_POST['txtPreco'];

    echo($nome);
    echo($desenvolvedora);
    echo($data);
    echo($preco);

    }
    else {
        echo("ERRO");
    }

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

            <div id="container-adm-produto">

                <form name="frmCadastro" method="post" >

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
                            <input type="text" name="txtDes">
                        </div>

                        <div class="campo">
                            <div class="nome-campo">
                                <label>Ano Lançamento:</label>
                            </div>
                            <input type="text" name="txtDate">
                        </div>

                        <div class="campo">
                            <div class="nome-campo">
                                <label>Preço:</label>
                            </div>
                            <input type="text" name="txtPreco">
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
                    <td class="tblColunas destaque"> Preço </td>
                </tr>
                <!-- Exibindo tqabela com os dados dos clientes -->
                <?php
                    $dadosProdutos = exibirProduto();
                    // Utilizando fetch_assoc para adiministrar a array
                    while ($rsProdutos=mysqli_fetch_assoc($dadosProdutos)){
                ?>
                    <tr id="tblLinhas">
                        <td class="tblColunas registros"><?=$rsClientes['nome']?></td>
                        <td class="tblColunas registros"><?=$rsClientes['celular']?></td>
                        <td class="tblColunas registros"><?=$rsClientes['email']?></td>
                        <td class="tblColunas registros">
                            <a href="controller/editarDadosCliente.php?id=<?=$rsClientes['id_cliente']?>"> 
                                <img src="img/edit.png" alt="Editar" title="Editar" class="editar">
                            </a>
                            <!-- Encaminhando id para o controller através de um link -->
                            <!-- E confirmando através do evento onclick com a função confirm e return(se True o html executa atarefa solicitada ) -->
                            <a onclick="return confirm('Para excluir clique em OK')" href="controller/excluiDadosCliente.php?id=<?=$rsClientes['id_cliente']?>">
                                <img src="img/trash.png" alt="Excluir" title="Excluir" class="excluir">
                            </a>
                            <!-- Encaminhando id para o controller através de um link  -->
                            <a href="controller/exibirInstanciaCliente.php?id=<?=$rsClientes['id_cliente']?>">
                                <img src="img/search.png" alt="Visualizar" title="Visualizar" class="pesquisar">
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