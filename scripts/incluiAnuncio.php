<?php

	include_once("conexao.php");
	session_start();
	// print_r($_SESSION);
	// print_r($_FILES);
	// print_r($_POST);
	// exit;

	$nomeArquivo = 'no-image.png';
	if(!empty($_FILES['imagem'])){

		if(!empty($_FILES['imagem']['name'])){

			$extensao = strtolower(substr($_FILES['imagem']['name'], -4));
			$nomeArquivo = time() .$extensao;
			$diretorio = '../images/imgAnuncios/';

			move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio.$nomeArquivo);

		}

	}

	$idUsuario = $_POST['id'];
	$nome = $_POST['nome'];
	$descricao = $_POST['descricao'];
	$valor = $_POST['valor'];
	// $idCrip = md5($_SESSION['_idUsuario']);


	//EXECUTA QUERY PARA SABER SE ESSE E-MAIL JÁ ESTÁ CADASTRADO NO BD;
	$sql_insert = "INSERT INTO `anuncios` (`imgAnuncio`, `tituloanuncio`, `descricaoAnuncio`, `valorAnuncio`, `_idAnunciante`)VALUES ('$nomeArquivo','$nome','$descricao','$valor','$idUsuario')";
	$sql_query = $mysqli->query($sql_insert)or die($mysqli->error);

	header("Location: ../meuAmbiente.php");

?>