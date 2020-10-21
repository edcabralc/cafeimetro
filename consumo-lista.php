<?php
include 'header.php';
include 'script-db/connect.php';
include 'script-db/consumo-banco.php';
?>

<div class="container">
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Data</th>
        <th scope="col">Hora</th>
        <th scope="col">Dia</th>
        <th scope="col">Nome</th>
        <th scope="col">Quantidade</th>
        <th scope="col">Preço</th>
        <th scope="col">Excluir</th>
      </tr>
    </thead>
    <tbody>
<?php
$consumos = listaConsumo($conn);
foreach ($consumos as $consumo): ?>      
        <tr>
          <td><?= $consumo['data_consumo'] ?></td>
          <td><?= $consumo['hora_consumo'] ?></td>
          <td><?= $consumo['dia_semana'] ?></td>
          <td><?= $consumo['cafe_nome'] ?></td>
          <td><?= $consumo['qtd'] ?> ml</td>
          <td>R$ <?= number_format($consumo['preco'], 2, ',', '.') ?></td>
          
          <td>
            <form name="" method="post" action="consumo-exclui.php">
          <input type="hidden" value="<?= $consumo[
              'consumo_id'
          ] ?>" name="id" />
          <button class="btn btn-danger">Excluir</button>
          </form>
          </td>
        </tr>
    
     <?php endforeach;
?>


</tbody>
  </table>
  <button class="btn btn-primary" onclick="window.location.href='consumo-form-adiciona.php'">Adicionar consumo</button>
</div>

<?php include "footer.php";
?>
