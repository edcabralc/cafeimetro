<?php
include 'header.php';
include 'script-db/connect.php';
include 'script-db/tipo-banco.php';

//coletando os dados
$id = $_POST['id'];
$nome = $_POST['nome'];

//inserindo os dados na função que chama a query
$excluirTipo = removeTipo($conn, $id);
if ($excluirTipo) { ?>
<div class="container alert alert-success" role="alert">
  <p>Registro <?= $nome ?> removido com sucesso!</p>
  <a href="tipo-lista.php" class="outline-primary">Voltar</a>
</div>
<?php } else { ?>
<div class="container alert alert-danger" role="alert">
  <p>Erro ao remover registro <?= $nome ?>!</p>
  <p><?= mysqli_error($conn) ?>!</p>
</div>

<?php }
?>
<?php include 'footer.php'; ?>
