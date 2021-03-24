<?php

	include_once("conexao.php");
	session_start();

	// print_r($_POST);
	// exit;

	if($_POST && $_POST['email']){
		$_SESSION['email'] = $_POST['email'];
	}else{
		$_SESSION['email']="";
	}

	if(!empty($_POST['email']) && !empty($_POST['senha'])){

		if(isset($_POST['email'])){

			$email = $_SESSION['email'] = $_POST['email'];
			$senha = $_SESSION['senha'] = md5($_POST['senha']);

			// print_r($senha);

			$sql_code = "SELECT * FROM `usuarios` WHERE email = '$email'";
			$sql_query = $mysqli->query($sql_code) or die($mysqli->error);
			$total = $sql_query->num_rows;
			$dado = $sql_query->fetch_assoc();

			if($total == 0){


				$erro[] = "Esse login é inválido.";
				$_SESSION['erroLogin'] = 'E-mail não cadastrado.';

				header('Location: ../login.php');

			}else{

				if($dado['senha'] == $_SESSION['senha']){

					// $_SESSION['nivelDeAcesso'] = $dado['nivelDeAcesso'];
					// $_SESSION['nome'] = $dado['nome'];
					// $_SESSION['_id'] = $dado['_id'];
					// $_SESSION['foto'] = $dado['foto'];
					$_SESSION = $dado;

				}else{

					$erro[] = "senha incorreta.";
					$_SESSION['erroSenha'] = "Senha incorreta.";
					header('Location: ../login.php');

				}
			}

		}

		//ENTRA NESSE IF CASO TENHA SUCESOS AO PROCESSAR LOGIN E SENHA;
		if(!isset($erro) || count($erro) == 0 ){
			echo "<script>location.href='../index.php';</script>"; 
			unset($_SESSION['senha']);
		}

	}else if($_POST && empty($_POST['email'])){
		$_SESSION['erroLogin'] = 'Insira um e-mail';
		header('Location: ../hrefLogin.php');
	}else if($_POST && empty($_POST['senha'])){
		$_SESSION['erroSenha'] = 'Insira uma senha';
		header('Location: ../hrefLogin.php');
	}

?>