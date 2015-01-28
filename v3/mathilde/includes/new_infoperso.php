<?php
	header('Location: ../etudiant.php?menu=1');
	session_start();
	include ('modif.php');
	$phone = $_POST['phone'];
	$ville = $_POST['ville'];
	$mouv = $_POST['mouv'];
	$info = $_POST['info'];
	$mail = $_SESSION['loggued_on_user'];
	$request = "UPDATE student SET phone_student ='$phone', city_student ='$ville', mouv_student = '$mouv', bio_student = '$info' where mail_student='$mail'";
	mysqli_query($con, $request) or die('Erreur SQL !'.$request.'<br />'.mysqli_error($con));
	exit();
?>
