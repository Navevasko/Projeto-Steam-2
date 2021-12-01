<?php
    require_once('functions/config.php');
    require_once('bd/conexaoMySQL.php');

    // Declaração de variáveis
    $login = (string) null;
    $senha = (string) null;

    // Recebe os dados via POST do form do login
    $login = $_POST['txtUsuario'];
    $senha = hash('sha256', $_POST['txtSenha']);

    if($login != "" && $senha != "") {
        $sql = "select * from tblUsuarios 
            where usuario = '" . $login . "' and
                  senha = '" . $senha . "'" ;

        $conexao = conexaoMySQL();

        $select = mysqli_query($conexao, $sql);

        if($rsUsuario = mysqli_fetch_assoc($select)){
            session_start();

            $_SESSION['nomeUsuario'] = $rsUsuario['nome'];
            $_SESSION['statusLogin'] = true;

            header('location: dashboard.php');
        }
        else {
            echo("<script> alert('Login ou senha inválidos');
                  window.location.href='login.php';
                </script>");
        }
    }

?>