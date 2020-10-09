<?php

include('header.php');



$user = 'root';
$pass = '';
$host = 'localhost';
$db = 'cafeimetrodb';

include('script-db/connect.php');

$query = 'select id, nome, descricao, tipo_id from cafe';

$res = mysqli_query($conn, $query);
?>

<div class="container">
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">Descrição</th>
        <th scope="col">Handle</th>
      </tr>
    </thead>
    <tbody>
      <?php
      while ($cafe = mysqli_fetch_assoc($res)) {

      ?>


        <tr>
          <td><?= $cafe['id']; ?></td>
          <td><?= $cafe['nome']; ?> </td>
          <td><?= $cafe['descricao']; ?></td>
          <td><?= $cafe['tipo_id']; ?></td>
        </tr>

    </tbody>

  <?php
      }
  ?>
  </table>




</div>