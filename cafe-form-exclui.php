<?php
include 'header.php';
include 'script-db/connect.php';
include 'script-db/cafe-banco.php';
include 'script-db/tipo-banco.php';

$id = $_POST['id'];
$cafe = buscaCafeId($conn, $id);
?>

<div class="container">
  <h1>Quer realmente exluir?</h1>
  
<form action="cafe-exclui.php" method="POST">
  <input type="hidden" name="id" value="<?= $cafe['id'] ?>">
  <input type="hidden" name="nome" value="<?= $cafe['nome'] ?>">

  <div class="form-group">
    <label for="nome">Nome</label>
    <input type="text" class="form-control" id="nome" name="nome" disabled value="<?= $cafe[
        'nome'
    ] ?>">
  </div>
  
  <div class="form-group">
    <label for="descricao">Descrição</label>
    <textarea class="form-control" id="descricao" rows="3" disabled name="descricao"><?= $cafe[
        'descricao'
    ] ?>
    </textarea>
  </div>
          <div class="form-group">
            <label for="tipo">Tipo</label>
            
            <select class="form-control" disabled id="tipo_id" name="tipo_id">
            <?php
            $tipos = listaTipo($conn);
            foreach ($tipos as $tipo) {
                $opcaoSelecionada =
                    $cafe['tipo_id'] == $tipo['id']
                        ? "selected='select'"
                        : ""; ?>
            <option value="<?= $tipo[
                'id'
            ] ?>" <?= $opcaoSelecionada ?>><?= $tipo['nome'] ?></option>
            
            <?php
            }
            ?>
            </select>
          </div>
     <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-danger btn-lg">Remover</button>
      <a href="cafe-lista.php" class="btn btn-outline-danger btn-lg">Cancelar</a>
    </div>
</form>

</div>


<?php include "footer.php"; ?>

