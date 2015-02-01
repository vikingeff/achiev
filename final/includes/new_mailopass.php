<?php
	header('Location: ../etudiant.php?menu=1');
	session_start();
	include ('modif.php');

	$mail = $_SESSION['loggued_on_user'];
	$new_mail = $_POST['mail'];
	$passwd = $_POST['pass'];
	$re_passwd = $_POST['rpass'];
	$passErr = $pass2Err = "";
	$mailErr = "";

	function test_input($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	function exist_mail($data)
	{
		include("modif.php");
		$request = "select mail_student from student where mail_student =\"$data\"";
		$res = mysqli_query($con,$request);
		$row = mysqli_fetch_array($res);
		if ($row['mail_student'] === $data)
		{
			mysqli_close($con);
			return (TRUE);
		}
		mysqli_close($con);
		return (FALSE);
	}

	if (empty($passwd) == FALSE)
	{
		if (empty($re_passwd))
		{
			$pass2Err = "Vous devez confirmer votre mot de passe";
		}
		else
		{
			if (strcmp($passwd, $re_passwd) !== 0)
			{
				$pass2Err = "Les mots de passent ne correspondent pas";
			}
			else
			{
				$passwd = hash("whirlpool", $passwd);
				$request = "UPDATE student set password_student='$passwd' where mail_student='$mail'";
				mysqli_query($con, $request) or die('Erreur SQL !'.$request.'<br />'.mysqli_error($con));
			}
		}
	}

	if (empty($mail))
	{
		$mailErr = "Vous devez laisser un email pour pouvoir vous connecter";
	}
	else
	{
		if (exist_mail($new_mail))
			$mailErr = "Ce mail est deja utilise";
		else
		{
			$request = "UPDATE student set mail_student='$new_mail' where mail_student='$mail'";
			mysqli_query($con, $request) or die('Erreur SQL !'.$request.'<br />'.mysqli_error($con));
			$_SESSION['loggued_on_user'] = $new_mail;
		}
	}
	exit();
?>
