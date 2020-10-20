<?php
include 'header.php';
include 'script-db/connect.php';
include 'script-db/tipo-banco.php';
?>

<div class="container">
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">Alterar</th>
        <th scope="col">Excluir</th>
      </tr>
    </thead>
    <tbody>
        <?php
        $tipos = listaTipo($conn);
        foreach ($tipos as $tipo): ?>      
        <tr>
          <td><?= $tipo['id'] ?></td>
          <td><?= $tipo['nome'] ?></td>
          <td><form name="" method="post" action="tipo-form-edita.php">
          <input type="hidden" value="<?= $tipo['id'] ?>" name="id" />
          <button class="btn btn-primary">Alterar</button>
          </form>
          </td>

          <?php
          $temVinculo = temVinculoComCafe($conn, $tipo['id']);
          $statusBotao = $temVinculo == 0 ? "" : "disabled";
          ?>


          <td><form name="" method="post" action="tipo-form-exclui.php">
          <input type="hidden" value="<?= $tipo['id'] ?>" name="id" />
          <button class="btn btn-danger" <?= $statusBotao ?> >Excluir</button>
          </form>
          </td>
        </tr>
    
     <?php endforeach;
        ?>
</tbody>
  </table>
</div>

<?php include "footer.php";
?>
