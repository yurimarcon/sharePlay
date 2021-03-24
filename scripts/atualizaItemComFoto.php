<?php

	include_once("conexao.php");
	session_start();
	// print_r($_SESSION);
	// print_r($_FILES);
	// print_r($_POST);
	// exit;

	$id = $_POST['id'];	
	$nome = $_POST['nome'];
	$descricao = $_POST['descricao'];
	$valor = $_POST['valor'];

	if(!empty($_FILES['imagem'])){

		if(!empty($_FILES['imagem']['name'])){

			$extensao = strtolower(substr($_FILES['imagem']['name'], -4));
			// $nomeArquivo = $_SESSION['_idCrip'] .$extensao;
			$nomeArquivo = time() .$extensao;
			$diretorio = "../images/imgAnuncios/";


			move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio.$nomeArquivo);

            $sql_insert = "UPDATE `anuncios` SET `imgAnuncio`='$nomeArquivo',`tituloanuncio`='$nome',`descricaoAnuncio`='$descricao',`valorAnuncio`='$valor' WHERE _idAnuncio ='$id'";

		}else{
			$nomeArquivo = "no-image.png";

            $sql_insert = "UPDATE `anuncios` SET `tituloanuncio`='$nome',`descricaoAnuncio`='$descricao',`valorAnuncio`='$valor' WHERE _idAnuncio ='$id'";

		}

	}

	$sql_query = $mysqli->query($sql_insert)or die($mysqli->error);

	header("Location: ../meuAmbiente.php");

?>