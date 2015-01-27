<?php 
	session_start();
	function auth($login, $passwd)
	{
		// if (!isset($passwd) && !isset($login))
		// {
		// 	header("Location: index.php?page=signing_entry");
		// 	exit("ERROR\n");
		// }
		include ("modif.php");
		$request = "select id_student, mail_student, password_student from student where mail_student = \"$login\"";
		$res = mysqli_query($con,$request);
		$row = mysqli_fetch_array($res);
		$ret = 1;
		if ($row['mail_student'] !== $login)
			return (exit_ret($con, -1));
		$passwd = hash("whirlpool", $passwd);
		if ($row['password_student'] !== $passwd)
			$ret = -1;
		$_SESSION['backupid']=$row['id_student'];
		return ($ret);
	}

	$login = $_POST['login'];
	$passwd = $_POST['passwd'];
	if (auth($login, $passwd) !== 1)
	{
		$_SESSION['loggued_on_user'] = "";
		//header("Location: index.php?page=signing&user=failed");
		header("Location: ../index.php");
		die();
		exit("ERROR\n");
	}
	else
	{
		// include ("modif.php");
		// $request = "select is_admin from client where login_utilisateur = \"$login\"";
		// $res = mysqli_query($con, $request);
		// $row = mysqli_fetch_array($res);
		$_SESSION['loggued_on_user'] = $login;
		// $_SESSION['is_admin'] = $row['is_admin'];
		header('Location: http://achiev.geffman.fr/mathilde/etudiant.php');
		die();
		exit("OK\n");
	}
	//header("Location: index.php");
?>
