<?php
	include_once 'php_action/db_connect.php';
	require_once 'includes/header.php';
session_start();
if(!isset($_SESSION['logado'])):
	header('Location: index.php');
endif;

$id = $_SESSION['id_usuario'];
$sql = "SELECT * FROM tbusuario WHERE id = '$id'";
$resultado = mysqli_query($connect, $sql);
$dados = mysqli_fetch_array($resultado);
mysqli_close($connect);
?>

<br> <br> <br> <br> <br> <br> <br>

<div class="center-align">
  <i class="large material-icons" style="font-size: 200px">storage</i>
  <h3 class="light"> Sistema </h3>
</div>

<?php
include_once 'includes/footer.php';
?>
