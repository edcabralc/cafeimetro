<?php
include 'header.php'; ?>

<div class="container">
  <h1>Inserir café</h1>
  
<form action="tipo-adiciona.php" method="POST">
    <div class="form-group">
    <label for="nome">Nome</label>
    <input type="text" class="form-control" id="nome" name="nome" placeholder="Insira o nome do tipo de café" value="">
  </div>
  
   <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary btn-lg">Salvar</button>
      <a href="tipo-lista.php" class="btn btn-outline-danger btn-lg">Cancelar</a>
    </div>
</form>

</div>


<?php include "footer.php";
?>
