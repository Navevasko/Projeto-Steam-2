"use strict"

import { getProdutos, pesquisarProduto } from "./produto.js";
import { getCategorias } from "./categoria.js";

const criarCardProduto = ({foto, nome, descricao, preco}) => {
    const container = document.querySelector("#box-produtos");
    const card = document.createElement('div');
    const arquivo = "/ds2t20212/Guilherme/Projeto/Projeto-Steam-2/admin/arquivos/"
    card.classList = 'card-produto'

    card.innerHTML = `
        <img src="${arquivo + foto}" alt="">
        <div class="texto-produto">
            <h3>${nome}</h3>
            <div class="container-texto">
                ${descricao}
            </div>
        </div>
        <div class="button-preco">
            <div class="saiba-mais">
                <button>
                    <img src="img/icons/bx-cart.svg" alt="">
                    Saiba mais
                </button>
            </div>
            <div class="preco">
                <p>R$ ${preco}</p>
            </div>
        </div>`;

    container.appendChild(card);
}

const limparCardProduto = (elemento) => {
    while(elemento.firstChild) {
        elemento.removeChild(elemento.lastChild)
    }
}

const criarItemCategoria = ({nomeCategoria}) => {
    const container = document.querySelector("#subMenu")
    const itemCategoria = document.createElement("a")

    itemCategoria.innerHTML = `
        <a href="#"><li class="itemSubMenu">${nomeCategoria}</li></a>
    `

    container.appendChild(itemCategoria)
}

const carregarCategorias = generos => generos.forEach(criarItemCategoria)
const carregarProdutos = jogos => jogos.forEach(criarCardProduto);

const showProdutos = async() => {

    document.getElementById("search-box").addEventListener('keypress', pesquisarProduto)

    const produto = await getProdutos();
    carregarProdutos(produto);
}

const showGeneros = async() => {
    const genero = await getCategorias();
    carregarCategorias(genero)
}

showGeneros()
showProdutos()