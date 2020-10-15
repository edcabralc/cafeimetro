<?php
include 'header.php';
include 'script-db/connect.php';
include 'script-db/cafe-banco.php';

//coletando os dados
$id = $_POST['id'];
$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$tipo_id = $_POST['tipo_id'];
//inserindo os dados na função que chama a query
$alteracaoConfirma = alteraCafe($conn, $id, $nome, $descricao, $tipo_id);
if ($alteracaoConfirma) { ?>
<div class="container alert alert-success" role="alert">
  <p>Registro <?= $nome ?> inserido com sucesso!</p>
  <a href="cafe-lista.php" class="outline-primary">Voltar</a>
</div>
<?php } else { ?>
<div class="container alert alert-danger" role="alert">
  <p>Erro ao inserir registro <?= $nome ?>!</p>
  <p><?= mysqli_error($conn) ?>!</p>
</div>

<?php }
?>
<?php include 'footer.php'; ?>
