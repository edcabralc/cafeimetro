<?php
include 'header.php';
include 'script-db/connect.php';
include 'script-db/cafe-banco.php';
include 'script-db/tipo-banco.php';

$id = $_POST['id'];
$cafe = buscaCafeId($conn, $id);
?>

<div class="container">
  <h1>Alterar café</h1>
  
<form action="" method="POST" name="formcafe">
  <input type="hidden" name="id" value="<?= $cafe['id'] ?>">

  <div class="form-group">
    <label for="nome">Nome</label>
    <input type="text" class="form-control" id="nome" name="nome" placeholder="" value="<?= $cafe[
        'nome'
    ] ?>">
  </div>
  
  <div class="form-group">
    <label for="descricao">Descrição</label>
    <textarea class="form-control" id="descricao" rows="3" name="descricao"><?= $cafe[
        'descricao'
    ] ?>
    </textarea>
  </div>
          <div class="form-group">
            <label for="tipo">Tipo</label>
            
            <select class="form-control" id="tipo_id" name="tipo_id">
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
      <button type="button" onclick="validaForm('cafe-edita.php')" class="btn btn-primary btn-lg">Salvar</button>
      
      <a href="cafe-lista.php" class="btn btn-outline-danger btn-lg">Cancelar</a>
    </div>
</form>
<div class="container" id="msg-erro">
   <p class="text-danger text-center"></p></div>
</div>
</div>


<?php include "footer.php";
?>
