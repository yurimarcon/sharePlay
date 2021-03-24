<?php

	include("scripts/conexao.php");
	session_start();

	// print_r($_SESSION);
	// exit;

	$idUsuario = $_SESSION['_idUsuario'];

	$sql_code = "SELECT * FROM anuncios WHERE _idAnunciante = '$idUsuario'";
	$sql_query = $mysqli->query($sql_code) or die ($mysqli->error);
	$count = mysqli_num_rows($sql_query);//CALCULA A QUANTIDADE DE LINHAS NO RETORNO;

	$linha = $sql_query->fetch_assoc();

?>

<!DOCTYPE HTML>
<!--
	Verti by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Share play - Meu Ambiente</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
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
											echo	'<li><a href="MeusDados.php">Meus dados</a></li>'.
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

				?>
				
				<?php

					include('modalAnunciar.php');

				?>

				<div class="container">
					<!-- ANÚNCIOS ATIVOS DO USUÁRIO -->
					<h3 class="mt-3">Meus anúncios ativos</h3>

				</div>
				
				<?php

					include('cardMeuAnuncio.php');

				?>

				<?php

					include('footer.php');

				?>

	</body>
</html>