"use strict"

const getCategorias = async() => {
    const url = 'http://localhost/ds2t20212/Guilherme/Projeto/Projeto-Steam-2/admin/api/categoria';
    const response = await fetch(url);
    const categoria = await response.json();
    return categoria;
}

export {
    getCategorias
}