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
			return (0);
		if ($row['password_student'] !== $passwd)
			$ret = 0;
		$_SESSION['backupid']=$row['id_student'];
		$_SESSION['loggued_on_user'] = $login;
		$_SESSION['user_type'] = 1;
		return ($ret);
	}
	function cauth($login, $passwd)
	{
		include ("modif.php");
		$request = "select id_contact, mail_contact, passwd_contact from contact where mail_contact = \"$login\"";
		$res = mysqli_query($con,$request);
		$row = mysqli_fetch_array($res);
		$ret = 1;
		if ($row['mail_contact'] !== $login)
			return (0);
		if ($row['passwd_contact'] !== $passwd)
			$ret = 0;
		$_SESSION['backupid']=$row['id_contact'];
		$_SESSION['loggued_on_user'] = $login;
		$_SESSION['user_type'] = 2;
		return ($ret);
	}

	$login = $_POST['login'];
	$passwd = hash("whirlpool", $_POST['passwd']);
	if (auth($login, $passwd) === 1 or cauth($login, $passwd) === 1)
	{
		exit();
	}
	else
	{
		$_SESSION['loggued_on_user'] = "";
		$_SESSION['user_type'] = 0; //Error
		//header("Location: index.php?page=signing&user=failed");
		header("Location: ../index.php");
		exit();
	}
	//header("Location: index.php");
?>
