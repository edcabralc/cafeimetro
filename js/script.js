/*
Autor: edcabralc
main file
/*/

function validaForm(destino) {
    msg = "* Preencha os campos obrigatórios.";
    vazio = 0;

    document.getElementById("msg-erro").innerHTML = "";

    nome = document.getElementById("nome").value;
    descricao = document.getElementById("descricao").value;

    if (nome == "") vazio++;
    if (descricao == "") vazio++;

    if (vazio > 0) {
        document.getElementById("msg-erro").innerHTML = msg;
        return false;
    }

    document.formcafe.action = destino;
    document.formcafe.submit();
}
