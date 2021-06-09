<?php
// Sessão
session_start();
// Conexão
require_once 'db_connect.php';
// Clear
function clear($input) {
	global $connect;
	// sql
	$var = mysqli_escape_string($connect, $input);
	// xss
	$var = htmlspecialchars($var);
	return $var;
}

if(isset($_POST['btn-editar'])):
	$nome = clear($_POST['nome']);
	$login = clear($_POST['login']);
	//$senha = clear($_POST['senha']);
    $senha = clear(password_hash($_POST['senha'], PASSWORD_DEFAULT)); //-- Criptografia, so funcina com o clear()
	$telefone = clear($_POST['telefone']);
  	$foto = clear($_POST['foto']);
	$datanasc = clear($_POST['datanasc']);

	$id = mysqli_escape_string($connect, $_POST['id']);

	$sql = "UPDATE tbusuario SET nome = '$nome', login = '$login', senha = '$senha', telefone = '$telefone', foto = '$foto', datanasc = '$datanasc' WHERE id = '$id'";

	if(mysqli_query($connect, $sql)):
		$_SESSION['mensagem'] = "Atualizado com sucesso!";
		header('Location: ../crudusu.php');
	else:
		$_SESSION['mensagem'] = "Erro ao atualizar";
		header('Location: ../crudusu.php');
	endif;
endif;