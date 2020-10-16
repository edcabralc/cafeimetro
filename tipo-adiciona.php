<?php
include 'header.php';
include 'script-db/connect.php';
include 'script-db/tipo-banco.php';

//coletando os dados
$nome = $_POST['nome'];

//inserindo os dados na função que chama a query
$adicionaTipoConfirma = adicionaTipoCafe($conn, $nome);
if ($adicionaTipoConfirma) { ?>
<div class="container alert alert-success" role="alert">
  <p>Registro <?= $nome ?> adicionado com sucesso!</p>
  <a href="cafe-lista.php" class="outline-primary">Voltar</a>
</div>
<?php } else { ?>
<div class="container alert alert-danger" role="alert">
  <p>Erro ao adicionar registro <?= $nome ?>!</p>
  <p><?= mysqli_error($conn) ?>!</p>
</div>

<?php }
?>
<?php include 'footer.php'; ?>
