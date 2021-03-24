<?php

$host = "localhost";
$usuario = "root";
$senha = "";
$bd = "sharePlay";

$mysqli =  mysqli_connect($host, $usuario, $senha, $bd);
mysqli_set_charset($mysqli, "utf8");

if(!$mysqli)
	echo "Falha na conexão com BD, se possível, avise o suporte da plataforma";
?>