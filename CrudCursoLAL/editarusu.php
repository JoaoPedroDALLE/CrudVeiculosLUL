<?php
include_once 'php_action/db_connect.php';
include_once 'includes/header.php';
if(isset($_GET['id'])):
	$id = mysqli_escape_string($connect, $_GET['id']);

	$sql = "SELECT * FROM tbusuario WHERE id = '$id'";
	$resultado = mysqli_query($connect, $sql);
	$dados = mysqli_fetch_array($resultado);
endif;
?>

<div class="row">
	<div class="col s12 m6 push-m3">
		<h3 class="light"> Editar Cliente </h3>
		<form action="php_action/updateusu.php" method="POST">
			<input type="hidden" name="id" value="<?php echo $dados['id'];?>">
			<div class="input-field col s12">
				<input type="text" name="nome" id="nome" value="<?php echo $dados['nome'];?>">
				<label for="nome">Nome</label>
			</div>

			<div class="input-field col s12">
				<input type="text" name="login" value="<?php echo $dados['login'];?>" id="login">
				<label for="login">Login</label>
			</div>

			<div class="input-field col s12">
				<input type="text" name="senha" value="<?php echo $dados['senha'];?>" id="senha">
				<label for="senha">Senha</label>
			</div>

			<div class="input-field col s12">
				<input type="text" name="telefone" value="<?php echo $dados['telefone'];?>" id="telefone">
				<label for="telefone">Telefone</label>
			</div>

      <div class="input-field col s12">
				<input type="text" name="foto" value="<?php echo $dados['foto'];?>" id="foto">
				<label for="foto">Foto</label>
			</div>

      <div class="input-field col s12">
				<input type="text" name="datanasc" value="<?php echo $dados['datanasc'];?>" id="datanasc">
				<label for="datanasc">Data de Nascimento</label>
			</div>

			<button type="submit" name="btn-editar" class="btn"> Atualizar</button>
			<a href="crudusu.php" class="btn green"> Lista de Usuários </a>
		</form>
		
	</div>
</div>

<?php
include_once 'includes/footer.php';
?>