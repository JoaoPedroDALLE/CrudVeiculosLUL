<?php
require_once 'includes/headerindex.php';
require_once 'php_action/db_connect.php';
session_start();
if(isset($_POST['btn-entrar'])):
	$erros = array();
	$login = mysqli_escape_string($connect, $_POST['login']);
	$senha = mysqli_escape_string($connect, $_POST['senha']);
   
	if(isset($_POST['lembrar-senha'])):
		setcookie('login', $login, time()+3600);
		setcookie('senha', $senha, time()+3600);
	endif;

	if(empty($login) or empty($senha)):
		$erros[] = "<li> O campo login/senha precisa ser preenchido </li>";
	else:
		
		$sql = "SELECT * FROM tbusuario WHERE login = '$login'";
		$resultado = mysqli_query($connect, $sql);		
		if(mysqli_num_rows($resultado) > 0):
		 $dados = mysqli_fetch_array($resultado);

		        if(password_verify($_POST['senha'],$dados['senha'])){
				mysqli_close($connect);
				$_SESSION['logado'] = true;
				$_SESSION['id_usuario'] = $dados['id'];
				header('Location: home.php');
				}else{
				$erros[] = "<li> Usuário e senha não conferem </li>";
				}
		else:
			$erros[] = "<li> Usuário inexistente </li>";
		endif;
	endif;
endif;

?>

<html>
<head>
	<title>Login</title>
	<meta charset="utf-8">
</head>
<body>

<div class="row">
	<div class="col s12 m6 push-m3">
	<h3 class="light center-align"> Login</h3>
		<?php 
		if(!empty($erros)):
			foreach($erros as $erro):
				echo $erro;
			endforeach;
		endif;
		?>
		
		<form  action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
			
			<div class="input-field col s12">
				<input type="text" name="login" value="<?php echo isset($_COOKIE['login']) ? $_COOKIE['login'] : '' ?>">
				
			</div>
			
			<div class="input-field col s12">
				<input type="password" name="senha" value="<?php echo isset($_COOKIE['senha']) ? $_COOKIE['senha'] : '' ?>"><br>
				
			</div>
			
			<div>
			  <p>
     		  <label>
					  <input type="checkbox" class="filled-in"  name="lembra-senha" />
					  <span >Lembre de mim</span>
      		</label>
    		</p>
			</div>
			
		 		<button class="btn" type="submit" name="btn-entrar"> Entrar </button>
				
		</form>
	</div>
</div>
</body>
</html>