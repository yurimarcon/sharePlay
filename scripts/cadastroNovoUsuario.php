<?php

	include_once("conexao.php");
	session_start();

	$nome = $_POST['nome'];
	$whatsapp = $_POST['whatsapp'];
	$email = $_POST['email'];
	$senha = $_POST['senha1'];
	$senha2 = $_POST['senha2'];
	$endereco = $_POST['endereco'];
	$cidade = $_POST['cidade'];
	$uf = $_POST['uf'];
	$contaTipo = '1';

	if(!empty($_POST['nome']))$_SESSION['nome'] = $nome;
	if(!empty($_POST['whatsapp']))$_SESSION['whatsapp'] = $whatsapp;
	if(!empty($_POST['email']))$_SESSION['email'] = $email;
	if(!empty($_POST['endereco']))$_SESSION['endereco'] = $endereco;
	if(!empty($_POST['cidade']))$_SESSION['cidade'] = $cidade;
	if(!empty($_POST['uf']))$_SESSION['uf'] = $uf;

	// print_r($_POST);
	// exit;

	//VERIFICA SE EXISTE ALGUM CAMPO VASIO;
	if( empty($_POST['nome']) ||
		empty($_POST['whatsapp']) ||
		empty($_POST['email'])||
		empty($_POST['senha1'])|| 	
		empty($_POST['senha2'])||
		empty($_POST['endereco']) ||
		empty($_POST['cidade'])||
		empty($_POST['uf']) ){

		echo "<script> alert('Você esqueceu de preencher algum campo do formulário.'); location.href='../cadastro.php';</script>";
		exit;
	}

	// print_r($_POST);
	// exit;

	//EXECUTA QUERY PARA SABER SE ESSE E-MAIL JÁ ESTÁ CADASTRADO NO BD;
	$sql_pesq = "SELECT * FROM usuarios WHERE email = '$email'";
	$sql_query = $mysqli->query($sql_pesq)or die($mysqli->error);

	if(mysqli_num_rows($sql_query)>0){
		echo "<script> alert('Esse e-mail já está cadastrado em nosso sistema.'); location.href='../login.php';</script>";exit;
	}

	if($senha !== $senha2){
		echo "<script> alert('As senhas não coincidem.'); location.href='../cadastro.php';</script>";exit;
	}

	$senha = md5($senha);

	// print_r($senha);exit;

	// include('sendNovoCadastro.php');

	$sql_code = "INSERT INTO `usuarios`(`nome`, `whatsapp`, `email`, `senha`, `endereco`, `cidade`, `estado`, `dataDeCriacao`) VALUES ('$nome','$whatsapp','$email','$senha','$endereco','$cidade','$uf',NOW())";

	//ENVIA E-MAIL DE CONFIRMAÇÃO DE NOVO CADASTRO;	
	// include('sendNovoCadastro.php');

	$sql_query = $mysqli->query($sql_code)or die($mysqli->error);


	if($sql_query){
		$_SESSION['contaTipo'] = $contaTipo;
		echo "<script>location.href='../login.php';</script>";
		exit;
	}

?>