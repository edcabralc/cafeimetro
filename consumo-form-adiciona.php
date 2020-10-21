<?php
include 'header.php';
include 'script-db/connect.php';
include 'script-db/cafe-banco.php';
include 'script-db/consumo-banco.php';
?>

<div class="container">
  <h1>Inserir Consumo</h1>
  
<form action="consumo-adiciona.php" method="POST">
    <div class="form-group">
    <label for="nome">Data</label>
    <input type="date" class="form-control" id="data" name="data" >
  </div>
  
  <div class="form-group">
    <label for="descricao">Hora</label>
    <input type="time" class="form-control" id="hora" name="hora" >
    
  </div>
          <div class="form-group">
            <label for="tipo">Café</label>
            
            <select class="form-control" id="cafe_id" name="cafe_id">
            <?php
            $cafes = listaCafe($conn);
            foreach ($cafes as $cafe) { ?>
            <option value="<?= $cafe['id'] ?>"><?= $cafe['nome_cafe'] ?>
            </option>
            <?php }
            ?>
            </select>
          </div>

          <div class="form-group">
            <label for="qtd">Quantidade</label>
            <input type="number" min="0" class="form-control" id="qtd" name="qtd" >
          </div>

        <div class="form-group">
            <label for="preco">Preço</label>
            <input type="number"  class="form-control" min="0.00" max="999.00" step="0.01" name="preco" id="preco" >
        </div>
     <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary btn-lg">Adicionar</button>
      <a href="consumo-lista.php" class="btn btn-outline-danger btn-lg">Cancelar</a>
    </div>
</form>



</div>

<div id="msg-erro"><p class="text-danger"></p></div>


<?php include "footer.php";
?>
