<?php

function listaTipo($conn)
{
    $tipos = [];
    $query = 'SELECT id, nome from tipo';
    $res = mysqli_query($conn, $query);
    while ($tipo = mysqli_fetch_assoc($res)) {
        array_push($tipos, $tipo);
    }

    return $tipos;
}
