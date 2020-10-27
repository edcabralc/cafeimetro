<?php
include 'script-db/connect.php';
include 'script-db/consumo-banco.php';

$arquivo = 'meu-consumo.xls';

$html = "<meta charset='utf-8'>";
$html .= '<table>
          <tr>
          <td>Data Consumo</td>
          <td>Hora Consumo</td>
          <td>Dia da Semana</td>
          <td>Café</td>
          <td>Quantidade (ml)</td>
          <td>R$ Preço</td>
          </tr>';

$consumos = listaConsumo($conn);
foreach ($consumos as $consumo) {
    $html .= "<tr>
          <td>{$consumo["data_consumo"]}</td>
          <td>{$consumo["hora_consumo"]}</td>
          <td>{$consumo["dia_semana"]}</td>
          <td>{$consumo["cafe_nome"]}</td>
          <td>{$consumo["qtd"]}</td>
          <td>{$consumo["preco"]}</td>
          </tr>";
}

$html .= '</table>';
header("Content-Type: application/xls");
header("Content-Disposition:attachement; filename=" . $arquivo);
header("Content-Descripiton: Dados gerados via PHP");
echo $html;
?>

