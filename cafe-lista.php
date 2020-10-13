<?php
include 'header.php';
include 'script-db/connect.php';
include 'script-db/cafe-banco.php';
?>

<div class="container">
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">Descrição</th>
        <th scope="col">Tipo</th>
      </tr>
    </thead>
    <tbody>
<?php
$cafes = listaCafe($conn);
foreach ($cafes as $cafe): ?>      
        <tr>
          <td><?= $cafe['id'] ?></td>
          <td><?= $cafe['nome'] ?> </td>
          <td><?= $cafe['descricao'] ?></td>
          <td><?= $cafe['tipo_id'] ?></td>
        </tr>
    
     <?php endforeach;
?>
</tbody>
  </table>
</div>

<?php include "footer.php";
?>
