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


function listaTipoCafe($conn){
    $cafes = array();
$query = 'select c.id, c.nome as nome_cafe, c.descricao, t.nome as nome_tipo from cafe c';
$query =. 'inner join tipo t on (c.tipo_id = t.id)';
$res = mysqli_query($conn, $query);

while($cafe = mysqli_fetch_assc($res)){
    array_push($cafes, $cafe);
    return $cafes;
}



}



?>
