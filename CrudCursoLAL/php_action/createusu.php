<?php
session_start();
require_once 'db_connect.php';
function clear($input) {

	global $connect;
	$var = mysqli_escape_string($connect, $input);
	$var = htmlspecialchars($var);
	return $var;
}

if(isset($_POST['btn-cadastrar'])):
	$nome = clear($_POST['nome']);
	$login = clear($_POST['login']);
    $senha = clear(password_hash($_POST['senha'], PASSWORD_DEFAULT)); 
	$telefone = clear($_POST['telefone']);
  	$foto = clear($_POST['foto']);
	$datanasc = clear($_POST['datanasc']);
	
	$sql = "INSERT INTO tbusuario (nome, login, senha, telefone, foto, datanasc) VALUES ('$nome', '$login', '$senha', '$telefone', '$foto', '$datanasc')";
	if(mysqli_query($connect, $sql)):
		$_SESSION['mensagem'] = "Cadastrado com sucesso!";
		header('Location: ../crudusu.php');
	else:
		$_SESSION['mensagem'] = "Erro ao cadastrar!";
		header('Location: ../crudusu.php');
	endif;
endif;