<?php
include_once 'includes/header.php';
?>
<div class="row">
	<div class="col s12 m6 push-m3">
		<h3 class="light"> Novo Usuario </h3>
		<form action="php_action/createusu.php" method="POST">
			<div class="input-field col s12">
				
				<input type="text" name="nome" id="nome">
				<label for="nome">Nome</label>
			</div>

			<div class="input-field col s12">
				<input type="text" name="login" id="login">
				<label for="login">Login</label>
			</div>

			<div class="input-field col s12">
				<input type="text" name="senha" id="senha">
				<label for="senha">Senha</label>
			</div>

			<div class="input-field col s12">
				<input type="text" name="telefone" id="telefone">
				<label for="telefone">Telefone</label>
			</div>

      		<div class="input-field col s12">
				<input type="text" name="foto" id="foto">
				<label for="foto">Foto</label>
			</div>

      		<div class="input-field col s12">
				<input type="text" name="datanasc" id="datanasc">
				<label for="datanasc">Data de Nascimento</label>
			</div>

			<button type="submit" name="btn-cadastrar" class="btn"> Cadastrar </button>
			<a href="crudusu.php" class="btn green"> Lista de Usuários </a>
		</form>
		
	</div>
</div>

<?php
include_once 'includes/footer.php';
?>