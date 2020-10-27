<?php

function listaConsumo($conn)
{
    $consumos = [];
    $query =
        'SELECT co.id AS consumo_id, DATE_FORMAT(co.data, "%d/%m/%Y") AS data_consumo, DATE_FORMAT(co.hora, "%h:%i") AS hora_consumo, co.dia_semana, co.preco, co.qtd, ca.nome AS cafe_nome from consumo co ';
    $query .= 'INNER JOIN cafe ca ON (ca.id = co.cafe_id) WHERE 1=1';
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $res = $stmt->get_result();
    while ($consumo = $res->fetch_assoc()) {
        array_push($consumos, $consumo);
    }

    return $consumos;
}

function listaConsumoSemana($conn)
{
    $consumos = [];
    $query =
        'SELECT dia_semana, count(id) AS qtd FROM consumo GROUP BY dia_semana';

    $stmt = $conn->prepare($query);
    $stmt->execute();
    $res = $stmt->get_result();
    while ($consumo = $res->fetch_assoc()) {
        array_push($consumos, $consumo);
    }

    return $consumos;
}

function removeConsumo($conn, $id)
{
    $query = "DELETE FROM consumo WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id);
    return $stmt->execute();
}

function adicionaConsumo(
    $conn,
    $data,
    $hora,
    $cafe_id,
    $qtd,
    $preco,
    $dia_semana
) {
    $query =
        'INSERT INTO consumo (data, hora, cafe_id, qtd, preco, dia_semana) VALUES (?,?,?,?,?,?)';
    $stmt = $conn->prepare($query);
    $stmt->bind_param(
        'ssiids',
        $data,
        $hora,
        $cafe_id,
        $qtd,
        $preco,
        $dia_semana
    );
    return $stmt->execute();
}
