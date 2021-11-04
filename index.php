<?php
require_once('functions/config.php');
require_once('bd/conexaoMySQL.php');
require_once(SRC . 'controller/exibeItens.php');

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css">
        <link rel="shortcut icon" type="image/jpg" href="img/logo.png"/>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;400&family=Lora&family=Nanum+Gothic:wght@400;700&family=PT+Sans:ital@0;1&family=Rubik:wght@300&display=swap" rel="stylesheet">
        <script src="js/script.js" defer></script>
        <title>Projeto</title>
    </head>
    <body>
        <header>
            <nav class="nav-menu">
                <div id="logo">
                    <a href="#logo"><img src="img/logo.png" alt=""></a>
                </div>

                <ul class="menu">
                    <li><a href="#"> A empresa </a></li>
                    <li><a href="#"> Lojas </a></li>
                    <li><a href="#"> Promoções </a></li>
                    <li><a href="#"> Destaques </a></li>
                    <li><a href="#"> Contatos </a></li>
                </ul>

                <div class="nav-burguer">
                    <div class="linha"></div>
                    <div class="linha"></div>
                    <div class="linha"></div>
                </div>

                <ul id="social-icons">
                    <li><a href="#">
                        <img src="img/icons/facebook.svg" alt="">
                    </a></li>
                    <li><a href="#">
                        <img src="img/icons/instagram.svg" alt="">
                    </a></li>
                    <li><a href="#">
                        <img src="img/icons/twitter.svg" alt="">
                    </a></li>
                </ul>
            </nav>
            <div id="banner"></div>
        </header>

        <main>
            <div id="container-produtos">
                <div id="search-bar">

                    <div id="caixaMenu"> 
        
                        <p>Menu</p>
    
                        <div id="caixaSubMenu">
    
                            <ul id="subMenu">

                                <?php
                                
                                $dadosCategorias = exibirCategorias();

                                while($rsCategorias = mysqli_fetch_assoc($dadosCategorias)) {

                                ?>
    
                                <a href="#"><li class="itemSubMenu"><?=$rsCategorias['nomeCategoria']?></li></a>

                                <?php
                                    }
                                ?>
    
                            </ul>
    
                        </div>  
                    
                    </div>

                    <div id="search">
                        <form action="">
                            <button> <img src="img/icons/bx-cart.svg" alt=""> </button>
                            <input type="text">
                        </form>
                    </div>
                </div>
                <div id="card-produtos">

                <?php
                    $dadosProdutos = exibirProdutos();

                    while($rsProdutos = mysqli_fetch_assoc($dadosProdutos)) {
                ?>
                    <div class="produto">
                        <img src="<?=NOME_DIRETORIO_FILE.$rsProdutos['foto']?>" alt="">
                        <div class="texto-produto">
                            <h3><?=$rsProdutos['nome']?></h3>
                            <p>Genero: <?=$rsProdutos['idCategoria']?> </p>
                            <p>Desenvolvedora: <?=$rsProdutos['desenvolvedor']?> </p>
                        </div>
                        <div class="button-preco">
                            <div class="saiba-mais">
                                <button>
                                    <img src="img/icons/bx-cart.svg" alt="">
                                    Saiba mais
                                </button>
                            </div>
                            <div class="preco">
                                <p><?=$rsProdutos['preco']?></p>
                            </div>
                        </div>
                    </div>

                <?php
                    }
                ?>
                    
                </div>
            </div>

            <div id="container-empresa">
                <div id="nome-empresa">
                    <h2> Sobre nós </h2>
                </div>
                <div id="empresa-text">
                    <div id="sobre-empresa">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam sequi animi quis. Doloribus culpa voluptatem laborum beatae commodi, nam asperiores minima, eveniet esse dolor laudantium. Sapiente explicabo corrupti impedit maxime! Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam sequi animi quis. Doloribus culpa voluptatem laborum beatae commodi, nam asperiores minima, eveniet esse dolor laudantium.</p>
                    </div>
                        <img src="img/logo.png" alt="">
                </div>
            </div>

            <div id="container-promocoes">
                <h2> Nossas Promoções </h2>
                <div id="card-produtos">
                    <div class="produto">
                        <img src="img/game-img/dishonored2.jpg" alt="">
                        <div class="texto-produto">
                            <h3>Dishonored 2</h3>
                            <p>Genero: Furtividade Ação Aventura </p>
                                <p>Data de Lançamento: 11 de novembro de 2016 </p>
                                <p>Desenvolvedora: Arkane Studios </p>
                        </div>
                        <div class="button-preco">
                            <div class="saiba-mais">
                                <button>
                                    <img src="img/icons/bx-cart.svg" alt="">
                                    Saiba mais
                                </button>
                            </div>
                            <div class="diferenca-preco">
                                <div class="preco-antigo">
                                    <p>R$999,99</p>
                                </div>

                                <div class="preco">
                                    <p>R$999,99</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="produto">
                        <img src="img/game-img/dishonored2.jpg" alt="">
                        <div class="texto-produto">
                            <h3>Dishonored 2</h3>
                            <p>Genero: Furtividade Ação Aventura </p>
                                <p>Data de Lançamento: 11 de novembro de 2016 </p>
                                <p>Desenvolvedora: Arkane Studios </p>
                        </div>
                        <div class="button-preco">
                            <div class="saiba-mais">
                                <button>
                                    <img src="img/icons/bx-cart.svg" alt="">
                                    Saiba mais
                                </button>
                            </div>

                            <div class="diferenca-preco">
                                <div class="preco-antigo">
                                    <p>R$999,99</p>
                                </div>

                                <div class="preco">
                                    <p>R$999,99</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="produto">
                        <img src="img/game-img/dishonored2.jpg" alt="">
                        <div class="texto-produto">
                            <h3>Dishonored 2</h3>
                            <p>Genero: Furtividade Ação Aventura </p>
                                <p>Data de Lançamento: 11 de novembro de 2016 </p>
                                <p>Desenvolvedora: Arkane Studios </p>
                        </div>
                        <div class="button-preco">
                            <div class="saiba-mais">
                                <button>
                                    <img src="img/icons/bx-cart.svg" alt="">
                                    Saiba mais
                                </button>
                            </div>
                            <div class="diferenca-preco">
                                <div class="preco-antigo">
                                    <p>R$999,99</p>
                                </div>

                                <div class="preco">
                                    <p>R$999,99</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>

            <div id="container-destaques">
                <h2> Destaques da loja </h2>
                <div id="card-destaques">
                    <div class="destaque">
                        <img src="img/game-img/dishonored2.jpg" alt="">
                        <h3> Ação </h3>
                    </div>

                    <div class="destaque">
                        <img src="img/game-img/dishonored2.jpg" alt="">
                        <h3> Furtividade </h3>
                    </div>

                    <div class="destaque">
                        <img src="img/game-img/dishonored2.jpg" alt="">
                        <h3> Corrida </h3>
                    </div>

                    <div class="destaque">
                        <img src="img/game-img/dishonored2.jpg" alt="">
                        <h3> RPG </h3>
                    </div>

                </div>
            </div>

            <div id="container-lojas">
                <h2> Nossas Lojas </h2>
                <div id="container-lojas-contatos">
                    <div id="lojas">
                        <div class="loja">
                            <h3> Unidade Jandira </h3>
                            <div class="loja-local">
                                <img src="img/game-img/residentEvil.jpg" alt="">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos reprehenderit ullam alias sapiente corrupti</p>
                            </div>
                        </div>
                        <div class="loja">
                            <h3> Unidade Jandira </h3>
                            <div class="loja-local">
                                <img src="img/game-img/residentEvil.jpg" alt="">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos reprehenderit ullam alias sapiente corrupti</p>
                            </div>
                        </div>
                    </div>
                    <div id="contatos">
                        <form action="">
                            <label for=""> Nome: </label>
                            <input type="text">
                            <label for=""> Email: </label>
                            <input type="email">
                            <label for=""> Celular: </label>
                            <input type="text">
                            <button> Enviar </button>
                        </form>
                    </div>
                </div>
            </div>

        </main>

        <footer>Copyright © 2021 | Guilherme Navevaiko</footer>
    </body>
</html>