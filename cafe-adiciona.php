<?php
include 'header.php';
include 'script-db/connect.php';
include 'script-db/cafe-banco.php';

//coletando os dados
$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$tipo_id = $_POST['tipo_id'];

//inserindo os dados na função que chama a query
$adicionaConfirma = adicionaCafe($conn, $nome, $descricao, $tipo_id);
if ($adicionaConfirma) { ?>
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
