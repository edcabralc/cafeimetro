<?php

//seleção de todos os item do banco
function listaCafe($conn)
{
    $cafes = [];
    $query = 'select id, nome, descricao, tipo_id from cafe';
    $res = mysqli_query($conn, $query);

    while ($cafe = mysqli_fetch_assoc($res)) {
        array_push($cafes, $cafe);
    }
    return $cafes;
}

function alteraCafe($conn)
{
    $query = 'select id, nome, descricao, tipo_id from cafe';
}

?>
