<?php
	// define variables and set to empty 
	session_start();
	include("modif.php");
	$nom = $prenom = $passwd = $passwd2 = $email = "";
	$nameErr = $emailErr = $passwdErr = $passwd2Err = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		if (empty($_POST["nom"]))
			$nameErr = "Name is required";
		else
		{
			$nom = test_input($_POST["nom"]);
			if (!preg_match("/^[a-zA-Z \-]*$/",$nom))
				$nameErr = "Only letters, white space and - are allowed";
		}					
		$prenom = test_input($_POST["prenom"]);
		if (empty($_POST["passwd"]))
			$passwdErr = "You must specify a password";
		else if (empty($_POST["passwd"]))
			$passwd2Err = "Passwords don't match";
		else
		{
			$passwd = test_input($_POST["passwd"]);
			$passwd2 = test_input($_POST["passwd2"]);
			if (strcmp($passwd, $passwd2) !== 0)
				$passwd2Err = "Passwords don't match";
			else
			{
				$passwd = hash("whirlpool", test_input($_POST["passwd"]));
				$passwd2 = hash("whirlpool", test_input($_POST["passwd2"]));
			}
			if (!preg_match("/^[a-zA-Z0-9]*$/",$passwd))
				$passwdErr = "Password can only contain letters and number, yes i know life sucks";
		}
		if (empty($_POST["email"]))
			$emailErr = "E-mail is required";
		else
		{
			$email = test_input($_POST["email"]);
			if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email))
				$emailErr = "Invalid email format";
		}
		if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($nameErr) && empty($emailErr) && empty($passwdErr) && empty($passwd2Err))
		{
			include ("modif.php");
			include ("validation.php");
			mysqli_close($con);
			echo "account created"."\n";
			//header("location:index.php?page=account_ok");
			exit();
		}
	}
	function test_input($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
?>
<h2>Formulaire d'inscription</h2>
<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])."?page=register";?>">
	<label>Nom: </label><input type="text" name="nom" value="<?php echo $nom;?>"/>
		<span class="error">* <?php echo $nameErr;?></span>
	<label>Prénom: </label><input type="text" name="prenom"value="<?php echo $prenom;?>"/>
	<label>Password: </label><input type="password" name="passwd" value="<?php echo $passwd;?>"/>
		<span class="error">* <?php echo $passwdErr;?></span>
	<label>Confirm password: </label><input type="password" name="passwd2" value="<?php echo $passwd2;?>"/>
		<span class="error">* <?php echo $passwd2Err;?></span>
	<label>E-mail: </label><input type="text" name="email" value="<?php echo $email;?>"/>
		<span class="error">* <?php echo $emailErr;?></span>
	<input type="submit" value="M'inscrire"/>
</form>
