<?php

	session_start();
	// print_r($_SESSION);

?>

<!DOCTYPE HTML>

<html>
	<head>
		<title>Login</title>
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
													'<li class="current"><a href="login.php">Login</a></li>';
										}
									?>
								</ul>
							</nav>

					</header>
				</div>

				<center>
					<div class="card" style="width: 18rem; margin-top: 50px; background-color: rgba(0,0,0,.5);">
					  	<img src="images/login.jpg" style="height: 170px;" class="card-img-top" alt="Imagem de apresentação do processo.">
					  	<div class="card-body">
					    	<form method="POST" action="scripts/processaLogin.php">

								<?php
									if(empty($_SESSION['erroSenha']) || empty($_SESSION['erroLogin'])){
								?>
									<div style="background-color: rgba(255,0,0,0.6); border-radius: 10px;">
										<?php 
											if(!empty($_SESSION['erroLogin'])){
										?>
											<h3><?php echo $_SESSION['erroLogin'] ?></h3>
										<?php
											}
										?>
										<?php 
											if(!empty($_SESSION['erroSenha'])){
										?>
											<h3><?php echo $_SESSION['erroSenha'] ?></h3>	
										<?php
											}
										?>
									</div>
								<?php
									}
										// print_r($_SESSION);
										unset($_SESSION['erroSenha']);
										unset($_SESSION['erroLogin']);
								?>

					    		<div class="m-3">
						    		<small style="color: white">Login</small>
						    		<input type="email" name="email" value="<?php if(isset($_SESSION['email'])) echo $_SESSION['email'] ?>">
					    		</div>
					    		<div class="m-2">
						    		<small style="color: white">Senha</small>
						    		<input type="password" name="senha">
					    		</div>
					    		<br>
					    		<button class="btn btn-primary" >Entrar</button>
					    	</form>
					  	</div>
					</div>
				</center>
			
			

				<?php

					include('footer.php');

				?>

	</body>
</html>