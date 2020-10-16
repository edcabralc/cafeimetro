<?php

function adicionaCafe($conn, $nome, $descricao, $tipo_id)
{
    $query = "INSERT INTO cafe (nome, descricao, tipo_id) VALUES ('{$nome}','{$descricao}',{$tipo_id})";
    return mysqli_query($conn, $query);
}

function buscaCafeId($conn, $id)
{
    $query = "SELECT id, nome, descricao, tipo_id FROM cafe WHERE id = {$id}";
    $res = mysqli_query($conn, $query);
    return mysqli_fetch_assoc($res);
}

function listaCafe($conn)
{
    $cafes = [];
    $query =
        'SELECT c.id, c.nome AS nome_cafe, c.descricao, t.nome AS nome_tipo FROM cafe c';
    $query .= ' INNER JOIN tipo t ON (c.tipo_id = t.id)';
    $res = mysqli_query($conn, $query);

    while ($cafe = mysqli_fetch_assoc($res)) {
        array_push($cafes, $cafe);
    }
    return $cafes;
}

function alteraCafe($conn, $id, $nome, $descricao, $tipo_id)
{
    $query = "UPDATE cafe SET nome = '{$nome}', descricao = '{$descricao}', tipo_id = {$tipo_id} WHERE id = {$id}";
    return mysqli_query($conn, $query);
}

function removeCafe($conn, $id)
{
    $query = "DELETE FROM cafe WHERE id = {$id}";
    return mysqli_query($conn, $query);
}

?>
