<?php
date_default_timezone_set('Brazil/East');

function diaSemana($data)
{
    $diasSemana = [
        'Domingo',
        'Segunda',
        'Terça',
        'Quarta',
        'Quinta',
        'Sexta',
        'Sábado',
    ];
    $a_data = date($data);
    $diasSemanaNumero = date('w', strtotime($a_data));
    return $diasSemana[$diasSemanaNumero];
}
