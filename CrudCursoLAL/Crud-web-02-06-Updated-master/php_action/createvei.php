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

if(isset($_POST['btn-cadastrar'])):
	$marca = clear($_POST['marca']);
	$modelo = clear($_POST['modelo']);
	$ano = clear($_POST['ano']);
	$cor = clear($_POST['cor']);
  	$placa = clear($_POST['placa']);
    $motor = clear($_POST['motor']);
    $km = clear($_POST['km']);
	$valor = clear($_POST['valor']);
	
	$sql = "INSERT INTO tbveiculo (marca, modelo, ano, cor, placa, motor, km, valor) VALUES ('$marca', '$modelo', '$ano', '$cor', '$placa', '$motor', '$km', '$valor')";

	if(mysqli_query($connect, $sql)):
		$_SESSION['mensagem'] = "Cadastrado com sucesso!";
		header('Location: ../crudvei.php');
	else:
		$_SESSION['mensagem'] = "Erro ao cadastrar";
		header('Location: ../crudvei.php');
	endif;
endif;