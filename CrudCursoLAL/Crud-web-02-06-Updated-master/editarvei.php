<?php
include_once 'php_action/db_connect.php';
include_once 'includes/header.php';
if(isset($_GET['id'])):
	$id = mysqli_escape_string($connect, $_GET['id']);
	$sql = "SELECT * FROM tbveiculo WHERE id = '$id'";
	$resultado = mysqli_query($connect, $sql);
	$dados = mysqli_fetch_array($resultado);
endif;
?>

<div class="row">
	<div class="col s12 m6 push-m3">
		<h3 class="light"> Editar Cliente </h3>
		<form action="php_action/updatevei.php" method="POST">
			<input type="hidden" name="id" value="<?php echo $dados['id'];?>">
			<div class="input-field col s12">
				<input type="text" name="marca" id="marca" value="<?php echo $dados['marca'];?>">
				<label for="marca">Marca</label>
			</div>

			<div class="input-field col s12">
				<input type="text" name="modelo" value="<?php echo $dados['modelo'];?>" id="modelo">
				<label for="modelo">Modelo</label>
			</div>

			<div class="input-field col s12">
				<input type="text" name="ano" value="<?php echo $dados['ano'];?>" id="ano">
				<label for="ano">Ano</label>
			</div>

			<div class="input-field col s12">
				<input type="text" name="cor" value="<?php echo $dados['cor'];?>" id="cor">
				<label for="cor">Cor</label>
			</div>

            <div class="input-field col s12">
				<input type="text" name="placa" value="<?php echo $dados['placa'];?>" id="placa">
				<label for="placa">Placa</label>
			</div>

            <div class="input-field col s12">
				<input type="text" name="motor" value="<?php echo $dados['motor'];?>" id="motor">
				<label for="motor">Motor</label>
			</div>
            <div class="input-field col s12">
				<input type="text" name="km" value="<?php echo $dados['km'];?>" id="km">
				<label for="km">KM</label>
			</div>

            <div class="input-field col s12">
				<input type="text" name="valor" value="<?php echo $dados['valor'];?>" id="valor">
				<label for="valor">Valor</label>
			</div>

			<button type="submit" name="btn-editar" class="btn"> Atualizar</button>
			<a href="crudvei.php" class="btn green"> Lista de Veículos </a>
		</form>
		
	</div>
</div>

<?php
include_once 'includes/footer.php';
?>