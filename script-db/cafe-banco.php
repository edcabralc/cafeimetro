<?php

function adicionaCafe($conn, $nome, $descricao, $tipo_id)
{
    $query = "INSERT INTO cafe (nome, descricao, tipo_id) VALUES (?,?,?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ssi', $nome, $descricao, $tipo_id);
    return $stmt->execute();
}

function buscaCafeId($conn, $id)
{
    $query = "SELECT id, nome, descricao, tipo_id FROM cafe WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $res = $stmt->get_result();
    return $res->fetch_assoc();
}

function listaCafe($conn)
{
    $cafes = [];
    $query =
        'SELECT c.id, c.nome AS nome_cafe, c.descricao, t.nome AS nome_tipo FROM cafe c';
    $query .= ' INNER JOIN tipo t ON (c.tipo_id = t.id)';
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $res = $stmt->get_result();
    while ($cafe = $res->fetch_assoc()) {
        array_push($cafes, $cafe);
    }
    return $cafes;
}

function alteraCafe($conn, $id, $nome, $descricao, $tipo_id)
{
    $query =
        "UPDATE cafe SET nome = ?, descricao = ?, tipo_id = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ssii', $nome, $descricao, $tipo_id, $id);
    return $stmt->execute();
}

function removeCafe($conn, $id)
{
    $query = "DELETE FROM cafe WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id);
    return $stmt->execute();
}

?>
