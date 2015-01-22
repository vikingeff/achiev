<?php
	session_start();
	unset($_SESSION['loggued_on_user']);
	session_destroy();
	header("Location: ../index.php");
	die();
	exit("OK\n");
?>