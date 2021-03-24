<?php
	session_start();
	session_destroy();
	header("Location: ../login.php");
	// print_r($_SESSION);
?>