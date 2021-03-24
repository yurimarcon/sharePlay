<?php

	include("scripts/conexao.php");
	session_start();

	// print_r($_GET);
	// exit;

	// $idUsuario = $_SESSION['_idUsuario'];
	$idProduto = $_GET['i'];

	$sql_code = "SELECT * FROM anuncios WHERE _idAnuncio = '$idProduto'";
	$sql_query = $mysqli->query($sql_code) or die ($mysqli->error);
	$count = mysqli_num_rows($sql_query);//CALCULA A QUANTIDADE DE LINHAS NO RETORNO;

	$produto = $sql_query->fetch_assoc();
	$foto = "images/imgAnuncios/".$produto['imgAnuncio'];
	$titulo = $produto['tituloanuncio'];
	$descricao = $produto['descricaoAnuncio'];
	$valor = $produto['valorAnuncio'];
	$idAnunciante = $produto['_idAnunciante'];

	// print_r($produto);
	// exit;

	$sql_code = "SELECT * FROM usuarios WHERE _idUsuario = '$idAnunciante'";
	$sql_query = $mysqli->query($sql_code) or die ($mysqli->error);
	$count = mysqli_num_rows($sql_query);//CALCULA A QUANTIDADE DE LINHAS NO RETORNO;

	$anunciane = $sql_query->fetch_assoc();
	// print_r($anunciane);
	$whatsapp = $anunciane['whatsapp'];
	$nomeAnunciante = $anunciane['Nome'];
	$cidade = $anunciane['cidade'];
	$estado = $anunciane['uf'];

?>

<!DOCTYPE HTML>
<!--
	Verti by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html lang="pt-br">
	<head>
		<title>Share play - Meu Ambiente</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	</head>
	<body class="is-preload homepage">
		<div id="page-wrapper">

			<!-- Header -->
			<style type="text/css">
				#cabecalho{
					width: 100%; 
					height: 60px;
					box-shadow: 
					position: relative;
				}

				.anuncioImg{
					margin-top: 10px;
					border-radius: 2%;
					width: 100%;
					height: auto;
				}

				@media screen and (min-width: 680px){
					#cabecalho{
						height: 100px; 
					}

				}

			</style>
				<img id="cabecalho" src="images/3941023.jpg">
				<!-- <div id="header-wrapper"> -->
				<div id="">
					<header id="header" class="container">
						<!-- Nav -->
							<nav id="nav">
								<ul>
									<li><a href="#">Início</a></li>
									<li><a href="index.php">Anúncios</a></li>
									<?php 
										if(isset($_SESSION['email'])){
											echo	'<li><a href="#">Meus dados</a></li>'.
													'<li><a href="meuAmbiente.php">Meu ambiente</a></li>'.
												    '<li><a href="scripts/processaLogout.php">Sair</a></li>';
										}else{
											echo    '<li><a href="cadastro.php">Cadastrar</a></li>'.
													'<li><a href="login.php">Login</a></li>';
										}
									?>
								</ul>
							</nav>

					</header>
				</div>

				<?php
					include('carrousel.php');
					// print_r($produto);
				?>
				
				<div class="container">
					<!-- BOTÃO VOLTAR -->
					<div style="height: 10px;"></div>
					<a style="cursor: pointer;" onClick="history.go(-1)"><b>< Voltar aos anúncios</b></a>
					<hr>

					<div class="row">
						<div class="col-12 col-md-6">
							<img class="anuncioImg" src=<?php echo $foto?>>							
							<small>Nome do proprietário: <b><?php echo $nomeAnunciante ?></b></small><br>
							<small>Cidade: <b><?php echo $cidade ?></b></small>
							<small>Estado: <b><?php echo $estado ?></b></small>
						</div>
						<div class="col-12 col-md-6">
							<h2 class="h3 m-3"><?php echo $titulo ?></h2>
							<p class="px-4"><?php echo $descricao ?></p>
							<h4 class="h5 px-3 mb-5"> R$<?php echo $valor ?>,00 /dia</h4>
							
							<a href="https://api.whatsapp.com/send?phone=+55<?php echo $whatsapp ?>&text=Olá, vi seu anúncio na plataforma Share Play." target="_blank"><button type="button" class="btn btn-success my-3"><i class="fa fa-whatsapp"></i> Entrar em contato</button></a>
						</div>
					</div>

				</div>

				<?php

					include('footer.php');

				?>

	</body>
</html>