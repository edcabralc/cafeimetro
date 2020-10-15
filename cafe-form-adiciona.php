<?php
include 'header.php';
include 'script-db/connect.php';
include 'script-db/cafe-banco.php';
include 'script-db/tipo-banco.php';
?>

<div class="container">
  <h1>Inserir café</h1>
  
<form action="cafe-adiciona.php" method="POST">
    <div class="form-group">
    <label for="nome">Nome</label>
    <input type="text" class="form-control" id="nome" name="nome" placeholder="Insira o nome" value="">
  </div>
  
  <div class="form-group">
    <label for="descricao">Descrição</label>
    <textarea class="form-control" id="descricao" rows="3" name="descricao" placeholder="Insira uma descrição" value="">
    </textarea>
  </div>
          <div class="form-group">
            <label for="tipo">Tipo</label>
            
            <select class="form-control" id="tipo_id" name="tipo_id">
            <?php
            $tipos = listaTipo($conn);
            foreach ($tipos as $tipo) { ?>
            <option value="<?= $tipo['id'] ?>"><?= $tipo['nome'] ?></option>
            
            <?php }
            ?>
            </select>
          </div>
     <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary btn-lg">Salvar</button>
      <a href="cafe-lista.php" class="btn btn-outline-danger btn-lg">Cancelar</a>
    </div>
</form>

</div>


<?php include "footer.php";
?>
