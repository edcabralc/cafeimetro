/*
Autor: edcabralc
main file
/*/

function validaForm() {
    const msg = "* Preencha os campos obrigatórios.";
    let vazio = 0;
    let nome = document.querySelectorAll("nome").values;
    let descricao = document.querySelectorAll("descricao").values;
    console.log(nome, descricao, msg, vazio);
}
