<?php

if(session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}

if(!isset($_SESSION['statusLogin']) || !$_SESSION['statusLogin']) {
    header('location: login.php');
}

$nomeUsuario = $_SESSION['nomeUsuario'];

?>
        <header>

            <div id="container-nome-projeto">

                <div id="nome-projeto">
                    <div id="nome-cms">
                        <p class="cms">CMS</p>
                        <p class="nome">Garden Of Games</p>
                    </div>
                    <div id="desc">
                        <p>Gerenciamento de conteúdo do site</p>
                    </div>
                </div>

                <div id="logo">
                    <img src="img/logo.png" alt="">
                </div>

            </div>

            <nav>
                <div id="container-categorias">
                        <div class="categoria">
                            <img src="img/icons/product.png" alt="">
                            <a href="produtos.php">
                                Adm. de Produtos
                            </a>
                        </div>

                        <div class="categoria">
                            <img src="img/icons/category.png" alt="">
                            <a href="categorias.php">
                                Adm. de Categorias
                            </a>
                        </div>

                        <div class="categoria">
                            <img src="img/icons/contact.png" alt="">
                            <a href="contatos.php">
                                Contatos
                            </a>
                        </div>

                    
                        <div class="categoria">
                            <img src="img/icons/user.png" alt="">
                            <a href="usuarios.php">
                                Usuarios
                            </a>
                        </div>
                    
                </div>
                
                <div id="container-usuario">
                    <p>Bem vindo <?=$nomeUsuario?></p>
                    <img src="img/icons/user-icon.png" alt="">
                    <a href="login.php">Logout</a>
                </div>
            </nav>
            
        </header>


