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
                   
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Nome: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="text" maxlength="100" name="txtNome" value="">
                        </div>
                    </div>
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Gêneros: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="text" name="txtRg" value="">
                        </div>
                    </div>
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Desenvolvedor: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="text" maxlength="20" name="txtCpf" value="">
                        </div>
                    </div>
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Data de Lançamento: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="date" name="txtTelefone" value="">
                        </div>
                    </div>
                </form>
            </div>
            
        </main>

        <?php
            require_once('shape/footer.php');
        ?>

    </body>
</html>