<?php

	include_once("conexao.php");
	session_start();

	$nome = $_POST['nome'];
	$whatsapp = $_POST['whatsapp'];
	$endereco = $_POST['endereco'];
	$cidade = $_POST['cidade'];
	$uf = $_POST['uf'];
	$contaTipo = '1';
	$id = $_SESSION['_idUsuario'];

	if(!empty($_POST['nome']))$_SESSION['nome'] = $nome;
	if(!empty($_POST['whatsapp']))$_SESSION['whatsapp'] = $whatsapp;
	// if(!empty($_POST['email']))$_SESSION['email'] = $email;
	if(!empty($_POST['endereco']))$_SESSION['endereco'] = $endereco;
	if(!empty($_POST['cidade']))$_SESSION['cidade'] = $cidade;
	if(!empty($_POST['uf']))$_SESSION['uf'] = $uf;

	// print_r($_SESSION);
	// print_r($_POST);
	// exit;

	//VERIFICA SE EXISTE ALGUM CAMPO VASIO;
	if( empty($_POST['nome']) ||
		empty($_POST['whatsapp']) ||
		empty($_POST['endereco']) ||
		empty($_POST['cidade'])||
		empty($_POST['uf']) ){

		echo "<script> alert('Você esqueceu de preencher algum campo do formulário.'); location.href='../cadastro.php';</script>";
		exit;
	}

	$sql_code = "UPDATE `usuarios` SET `nome`='$nome',`whatsapp`='$whatsapp',`endereco`='$endereco',`cidade`='$cidade',`uf`='$uf' WHERE _idUsuario = '$id'";

	$sql_query = $mysqli->query($sql_code)or die($mysqli->error);


	if($sql_query){
		$_SESSION['contaTipo'] = $contaTipo;
		echo "<script>location.href='../meuAmbiente.php';</script>";
		exit;
	}

?>