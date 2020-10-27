<?php
include 'pdf.php';
$arquivo = 'relatorio-consumo.pdf';

$html = '<html lang="ptBR">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
  <link rel="stylesheet" href="/css/main.css">

  <title>Cafeimetro</title>
</head>

<body>';

$html .= $_POST['hide_html'];

$pdf = new Pdf();
$pdf->load_html($html);
$pdf->render();
$pdf->stream($arquivo, ['Attachements' => false]);
