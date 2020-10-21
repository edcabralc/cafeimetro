<?php
include 'header.php';
include 'script-db/connect.php';
include 'script-db/consumo-banco.php';

//coletando os dados
$id = $_POST['id'];

//inserindo os dados na função que chama a query
$excluirConsumo = removeConsumo($conn, $id);
if ($excluirConsumo) {
    include 'footer.php';
    header('Location: consumo-lista.php');
    die();
} else {
     ?>
  <div class="container alert alert-danger" role="alert">
  <p>Erro ao remover registro <?= $nome ?>!</p>
  <p><?= mysqli_error($conn) ?>!</p>
  <a href="tipo-lista.php" class="outline-primary">Voltar</a>
</div>

<?php
}
?>
<?php include 'footer.php'; ?>
