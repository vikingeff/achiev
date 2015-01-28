<?php
	header('Location: ../etudiant.php?menu=1');
	session_start();
	include ('modif.php');
	$mail = $_SESSION['loggued_on_user'];
	$domaine = $_POST['domaine'];
	$ecole = $_POST['ecole'];
	$year = $_POST['year'];
	$spe = $_POST['spe'];
	$request = "UPDATE student SET domaine_student ='$domaine', school_student ='$ecole', year_student = '$year', spe_student = '$spe' where mail_student='$mail'";
	mysqli_query($con, $request) or die('Erreur SQL !'.$request.'<br />'.mysqli_error($con));
	exit();
?>
