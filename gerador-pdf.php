<?php
include 'pdf.php';
$arquivo = 'relatorio-consumo.pdf';

$html = '<html lang="ptBR">

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
  <link rel="stylesheet" href="/css/main.css">

  <title>Cafeimetro</title>
</head>

<body> ';

$html .= $_POST['hide_html'];

$pdf = new Pdf();
$pdf->loadHtml($html);
$pdf->render();
$pdf->stream($arquivo, ['Attachements' => false]);
