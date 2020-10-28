<?php
date_default_timezone_set('Brazil/East');
include 'script-db/connect.php';
include 'script-db/consumo-banco.php';

$valorTotal = 0;
$mlTotal = 0;
$cafeTotal = 0;
$dataHoje = date('d/m/Y H:m:s');
?>

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
  <link rel="stylesheet" href="/css/main.css">

  <title>Cafeimetro</title>
</head>
<body>
  
  
  <div class="container" id="div-report">
    <h4 class="text-center">Relatorio de Consumo em <?= $dataHoje ?></h4>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Data</th>
          <th scope="col">Hora</th>
          <th scope="col">Dia</th>
          <th scope="col">Nome</th>
          <th scope="col">Quantidade</th>
          <th scope="col">Preço</th>
          
        </tr>
      </thead>
      <tbody>
        <?php
        $consumos = listaConsumo($conn);
        foreach ($consumos as $consumo):

            $valorTotal += $consumo['preco'];
            $mlTotal += $consumo['qtd'];
            $cafeTotal++;
            ?>      
        <tr>
          <td><?= $consumo['data_consumo'] ?></td>
          <td><?= $consumo['hora_consumo'] ?></td>
          <td><?= $consumo['dia_semana'] ?></td>
          <td><?= $consumo['cafe_nome'] ?></td>
          <td><?= $consumo['qtd'] ?> ml</td>
          <td>R$ <?= number_format($consumo['preco'], 2, ',', '.') ?></td>
        </tr>
        <?php
        endforeach;
        ?>

</tbody>
</table>
<h4 class="text-center">Totais</h4>
<table class="table text-center">
  <thead>
    <tr>
      <th scope="col">Total Cafés</th>
      <th scope="col">Quantidade total em ml</th>
      <th scope="col">Custo total</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><?= $cafeTotal ?></td>
      <td><?= $mlTotal ?> ml</td>
      <td>R$ <?= number_format($valorTotal, 2, ',', '.') ?></td>
    </tr>
  </table>
 <h3 class="text-center">Gráficos</h3>
   <div id="piechart" style="width: 900px; height: 500px;"></div>
  
</div>

<div class="container text-center">
  <form name="formPDF" action="" method="POST">
    <input type="hidden" name="hide_html" id="hide_html" value="">
    <button type="button" name="btn-criaPdf" class="btn btn-primary" onclick="gerarPDF()">Gerar PDF</button>
  </form>
</div>

</body>
</html>

<!-- google chart -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],

          <?php
          $consumosDiaSemana = listaConsumoSemana($conn);
          foreach ($consumosDiaSemana as $consumo) {
              $dia = $consumo['dia_semana'];
              $qtd = $consumo['qtd'];
              echo "['{$dia} ({$qtd})', {$qtd}],";
          }
          ?>
        ]);

        var options = {
          title: 'Meu consumo'
        };

        var chart_area = document.getElementById('piechart');
      var chart = new google.visualization.PieChart(chart_area);

      // Wait for the chart to finish drawing before calling the getImageURI() method.
      google.visualization.events.addListener(chart, 'ready', function () {
        chart_area.innerHTML = '<img src="' + chart.getImageURI() + '">';
        
      });

        chart.draw(data, options);
      }
    </script>
<!-- end google chart -->

<script>

function gerarPDF() {
    document.getElementById("hide_html").value = document.getElementById(
        "div-report"
    ).innerHTML;
    document.formPDF.action = "gerador-pdf.php";
    document.formPDF.submit();
    
}

</script>

<?php include "footer.php";
?>
