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
											echo    '<li class="current"><a href="cadastro.php">Cadastrar</a></li>'.
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
				
				<div class="container py-5">
						
						  <div class="card-body">
						    <h5 class="card-title">Insira seus dados</h5>

						    <form method="POST" action="scripts/cadastroNovoUsuario.php">

							  <div class="form-row">
							    <div class="form-group col-md-12">
							      <label for="inputNome">Nome</label>
							      <input type="text" class="form-control" value="<?php if(isset($_SESSION['nome'])) echo $_SESSION['nome'] ?>" name="nome" placeholder="Seu nome...">
							    </div>
							   <!--  <div class="form-group col-md-6">
							      <label for="inputNome">Telefone para receber ligações: ( DDD + número, apenas números )</label>
							      <input type="number" class="form-control" value="<?php if(isset($_SESSION['celular'])) echo $_SESSION['telefone'] ?>"name="celular" placeholder="11912341234">
							    </div> -->
							    <div class="form-group col-md-6">
							      <label for="inputNome">WhatsApp: ( DDD + número)</label>
							      <input type="number" class="form-control" value="<?php if(isset($_SESSION['whatsapp'])) echo $_SESSION['whatsapp'] ?>"name="whatsapp" placeholder="11912341234">
							    </div>
							    <div class="form-group col-12">
							      <label for="inputEmail">E-mail</label>
							      <input type="email" class="form-control" value="<?php if(isset($_SESSION['email'])) echo $_SESSION['email'] ?>" name="email" placeholder="Seu e-mail...">
							    </div>
							    <!-- <div class="form-group col-12">
							      <label for="inputEmail">Nome do estabelecimento</label>
							      <input type="text" class="form-control" value="<?php if(isset($_SESSION['estabelecimento'])) echo $_SESSION['estabelecimento'] ?>" name="estabelecimento" placeholder="Nome do seu negócio...">
							    </div> -->
							  </div>
							  <div class="form-row">
							    <div class="form-group col-md-6">
							      <label for="inputSenha">Senha</label>
							      <input type="password" class="form-control" name="senha1" id="inputSenha1">
							    </div>
							    <div class="form-group col-md-6">
							      <label for="inputReSenha">Repita a senha</label>
							      <input type="password" class="form-control" name="senha2" id="inputSenha2">
							    </div>
							  </div>
							  <div class="form-group">
							    <label for="inputAddress">Endereço</label>
							    <input type="text" class="form-control" value="<?php if(isset($_SESSION['endereco'])) echo $_SESSION['endereco'] ?>" name="endereco" id="inputEndereco" placeholder="Rua/Av. Pereira Neves, 18 - Jd. Utinga">
							  </div>
							  <div class="form-row">
							    <div class="form-group col-md-6">
							      <label for="inputCity">Cidade</label>
							      <input type="text" class="form-control" value="<?php if(isset($_SESSION['cidade'])) echo $_SESSION['cidade'] ?>" name="cidade" placeholder="Município...">
							    </div>
							    <div class="form-group col-md-6">
							      <label for="inputState">Estado</label>
							      <select id="inputUF" value="<?php if($_SESSION['uf']) echo $_SESSION['uf'] ?>" name="uf" class="form-control">
							        <option selected><?php if($_SESSION && $_SESSION['estado']){echo $_SESSION['estado'];}else{ echo 'Selecione...';} ?></option>
									<option value="AC">Acre</option>
									<option value="AL">Alagoas</option>
									<option value="AP">Amapá</option>
									<option value="AM">Amazonas</option>
									<option value="BA">Bahia</option>
									<option value="CE">Ceará</option>
									<option value="DF">Distrito Federal</option>
									<option value="ES">Espírito Santo</option>
									<option value="GO">Goiás</option>
									<option value="MA">Maranhão</option>
									<option value="MT">Mato Grosso</option>
									<option value="MS">Mato Grosso do Sul</option>
									<option value="MG">Minas Gerais</option>
									<option value="PA">Pará</option>
									<option value="PB">Paraíba</option>
									<option value="PR">Paraná</option>
									<option value="PE">Pernambuco</option>
									<option value="PI">Piauí</option>
									<option value="RJ">Rio de Janeiro</option>
									<option value="RN">Rio Grande do Norte</option>
									<option value="RS">Rio Grande do Sul</option>
									<option value="RO">Rondônia</option>
									<option value="RR">Roraima</option>
									<option value="SC">Santa Catarina</option>
									<option value="SP">São Paulo</option>
									<option value="SE">Sergipe</option>
									<option value="TO">Tocantins</option>
							      </select>
							    </div>
							  </div>
							  <div class="form-group">
							    <!-- <div class="form-check">
							      <input class="form-check-input" type="checkbox" id="checkBox" required>
							      <label class="form-check-label" for="gridCheck">
							        Conferiu seus dados?
							      </label>
							    </div> -->
							  </div>
							  <button type="submit" class="btn btn-primary">Cadastrar</button>
							</form>
						  </div>
					</div>		
			

				<?php

					include('footer.php');

				?>

	</body>
</html>