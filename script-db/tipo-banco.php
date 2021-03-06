<?php

function listaTipo($conn)
{
    $tipos = [];
    $query = 'SELECT id, nome from tipo';
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $res = $stmt->get_result();
    while ($tipo = $res->fetch_assoc()) {
        array_push($tipos, $tipo);
    }

    return $tipos;
}

function adicionaTipoCafe($conn, $nome)
{
    $query = "INSERT INTO tipo (nome) VALUES (?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $nome);
    return $stmt->execute();
}

function alteraTipo($conn, $id, $nome)
{
    $query = "UPDATE tipo SET nome = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('si', $nome, $id);
    return $stmt->execute();
}

function buscaTipoId($conn, $id)
{
    $query = "SELECT id, nome FROM tipo WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $res = $stmt->get_result();
    return $res->fetch_assoc();
}

function removeTipo($conn, $id)
{
    $query = "DELETE FROM tipo WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id);
    return $stmt->execute();
    // if (!$stmt->execute()) {
    //     echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
    // }
}

function temVinculoComCafe($conn, $id)
{
    $query = "SELECT COUNT(id) as qtd FROM cafe WHERE tipo_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    // if ($stmt->execute()) {
    //     echo "Execute failed: (" . $stmt->errno . ")" . $stmt->error;
    // }
    $res = $stmt->get_result();
    $count = $res->fetch_assoc();
    return $count['qtd'];
}

function temTipoPorNome($conn, $nome)
{
    $query = "SELECT COUNT(nome) as qtd FROM tipo WHERE nome = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $nome);
    $stmt->execute();
    $res = $stmt->get_result();
    $count = $res->fetch_assoc();
    return $count['qtd'];
}
