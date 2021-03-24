<?php

	include_once("conexao.php");
	session_start();

	// print_r($_GET);
	// exit;

	$id = $_GET['id'];
	
	$sql_delete = "DELETE FROM anuncios WHERE _idAnuncio = '$id'";
	$sql_query = $mysqli->query($sql_delete)or die($mysqli->error);

	header("Location: ../meuAmbiente.php");

?>