<?php
include 'header.php';
include 'script-db/connect.php';
include 'script-db/tipo-banco.php';

$id = $_POST['id'];
$tipo = buscaTipoId($conn, $id);
?>

<div class="container">
  <h1>Quer realmente excluir?</h1>
  
<form action="tipo-exclui.php" method="POST">
  <input type="hidden" name="id" value="<?= $tipo['id'] ?>">
  <input type="hidden" name="nome" value="<?= $tipo['nome'] ?>">

  <div class="form-group">
    <label for="nome">Nome</label>
    <input type="text" class="form-control" id="nome" name="nome" placeholder="" disabled value="<?= $tipo[
        'nome'
    ] ?>">
  </div>
  
    
     <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-danger btn-lg">Remover</button>
      <a href="tipo-lista.php" class="btn btn-outline-danger btn-lg">Cancelar</a>
    </div>
</form>

</div>


<?php include "footer.php";
?>
