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
        <th scope="col">Alterar</th>
        <th scope="col">Excluir</th>
      </tr>
    </thead>
    <tbody>
<?php
$cafes = listaCafe($conn);
foreach ($cafes as $cafe): ?>      
        <tr>
          <td><?= $cafe['id'] ?></td>
          <td><?= $cafe['nome_cafe'] ?></td>
          <td><?= $cafe['descricao'] ?></td>
          <td><?= $cafe['nome_tipo'] ?></td>
          <td><form name="" method="post" action="cafe-form-edita.php">
          <input type="hidden" value="<?= $cafe['id'] ?>" name="id" />
          <button class="btn btn-primary">Alterar</button>
          </form>
          </td>
          <td><form name="" method="post" action="cafe-form-exclui.php">
          <input type="hidden" value="<?= $cafe['id'] ?>" name="id" />
          <button class="btn btn-danger">Excluir</button>
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
