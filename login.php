<?php

$usuario = (string) null;
$senha = (string) null;

if(isset($_POST['btnLogin'])) {
    $usuario = $_POST['txtUsuario'];
    $senha = $_POST['txtSenha'];
}

?>

<html>

    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/login.css">
        <link rel="shortcut icon" type="image/jpg" href="img/logo.png"/>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;400&family=Lora&family=Nanum+Gothic:wght@400;700&family=PT+Sans:ital@0;1&family=Rubik:wght@300&display=swap" rel="stylesheet">
        <title> Login </title>
    </head>

    <body>
    
        <div id="login">
        
            <form method="post" name="frmLogin">
            
                <div class="caixa-input">
                <label> Usuário </label>
                <input type="text" name="txtUsuario" value="">
                </div>
                
                <div class="caixa-input">
                <label> Senha </label>
                <input type="password" name="txtSenha">
                </div>
                
                <input type="submit" name="btnLogin" value="Login">
            
            </form>
        
        </div>
    
    </body>

</html>