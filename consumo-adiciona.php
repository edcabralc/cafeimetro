<?php
include 'header.php';
include 'script-db/connect.php';
include 'script-db/consumo-banco.php';
include 'util.php';

//coletando os dados
$data =
    array_key_exists('data', $_POST) && $_POST['data'] != ''
        ? $_POST['data']
        : date('Y-m-d');

$hora =
    array_key_exists('hora', $_POST) && $_POST['hora'] != ''
        ? $_POST['hora']
        : date('H:i');

$cafe_id = $_POST['cafe_id'];

$qtd =
    array_key_exists('qtd', $_POST) && $_POST['qtd'] != '' ? $_POST['qtd'] : 0;
$preco =
    array_key_exists('preco', $_POST) && $_POST['preco'] != ''
        ? $_POST['preco']
        : 0;

$dia_semana = diaSemana($data);

//inserindo os dados na função que chama a query
$consumoConfirma = adicionaConsumo(
    $conn,
    $data,
    $hora,
    $cafe_id,
    $qtd,
    $preco,
    $dia_semana
);
if ($consumoConfirma) {
    include 'rodape.php';
    header('Location: consumo-lista.php');
    die();
} else {
     ?>
<div class="container alert alert-danger" role="alert">
  <p>Erro ao adicionar registro!</p>
  <p><?= mysqli_error($conn) ?>!</p>
</div>

<?php
}
?>
<?php include 'footer.php'; ?>
