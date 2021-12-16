"use strict"

const getProdutos = async() => {
    const url = 'http://localhost/ds2t20212/Guilherme/Projeto/Projeto-Steam-2/admin/api/produto';
    const response = await fetch(url);
    const produtos = await response.json();
    return produtos;
}

const pesquisarProduto = async(event) => {
    if(pesquisa != "") {
        const pesquisa = event.target.value
        if(event.key == "Enter") {
            const url = `http://localhost/ds2t20212/Guilherme/Projeto/Projeto-Steam-2/admin/api/produto?nome=${pesquisa}`
            const response = await fetch(url);
            const produtos = await response.json()
            return produtos
        }
    }
    else {
        return false
    }
}

export {
    getProdutos,
    pesquisarProduto
}