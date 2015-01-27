<html>
	<head>
		<title>Achievr</title>
		<link rel="stylesheet" href="style.css" />
		<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
		<script type="text/javascript" src="js/jquery.leanModal.min.js"></script>
		<meta charset="UTF-8">
	</head>

	<body>

<?php	include("./includes/modif.php");
	$nom = $prenom = $passwd = $passwd2 = $email = "";
	$nameErr = $emailErr = $passwdErr = $passwd2Err = "";
	$name = $siret = $cpasswd = $cpasswd2 = $cmail = "";
	$namecErr = $cmailErr = $cpasswdErr = $cpasswd2Err = "";

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
			if (exist_mail($email))
				$emailErr = "Mail already used.";
		}
		if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($nameErr) && empty($emailErr) && empty($passwdErr) && empty($passwd2Err))
		{
			include ("./includes/modif.php");
			include ("./includes/validation.php");
			mysqli_close($con);
			?>
			<div id="ok"><div id="co_ok">
			<?php echo "Votre compte a bien été créé. Vous pouvez maintenant vous connecter.<br/>
				Cliquez pour fermer la fenetre"."\n"; ?>
			</div></div>
			<?php
			header("location:index.php");
		}
		else
		{
			?>
			<div id="nok"><div id="co_nok">
			<?php echo "Une erreur est survenue."."\n"; ?>
			</div></div>
			<?php
			header("location:index.php");
		}
	}
	function test_input($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	function exist_mail($data)
	{
		include("./includes/modif.php");
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
?>

		<header>
		<div class="bouton" id="inscription">
			<img src="img/menu.png" width=35px; style="position:relative; top:-10px;"/>
			<div class="deroulant">
				<p>
				<a href="index.php">Accueil</a><br/>
				<a href="lst_etudiant.php">Les etudiants</a>
				<a href="#">Les entreprises</a>
				<a href="#">Les annonces</a>
				</p>
			</div>
		</div>

		<a href="index.php"><img src="img/Logo.png" width=275px; /></a>

		<?php session_start();
			if ($_SESSION['loggued_on_user'])
			{
		?>
			<a href="includes/signout.php"><div class="bouton" id="codeco">DECONNEXION</div></a>
		<?php }
			else
			{
		?>
			<a id="modal_trigger" href="#modal"><div class="bouton" id="codeco">CONNEXION</div></a>
			<div id="modal" class="popupContainer" >
					<header class="popupHeader">
						<span class="header_title">Connexion</span>
						<span class="modal_close"><i class="fa fa-times">x</i></span>
					</header>

					<section class="popupBody">
						<!-- Username & Password Login form -->
						<div class="user_login">
							<form>
								<label>Email</label>
								<input type="text" name="login" id="login" autofocus/>
								<br />
								<label>Mot de passe</label>
								<input type="password" name="passwd" id="passwd"/>
								<br />
								<div class="action_btns">
									<a href="#" id="validate" class="btn_red">Connexion</a>
								</div>
							</form>
							<a href="#" class="forgot_password">Mot de passe oublié ?</a>
						</div>

						<div class="user_reg">
							<label>Pas encore inscrit ?</label><br/>
							<a href="#" id="register_form" class="btn">Inscription<br/>Etudiant</a>
							<a href="#" id="cregister_form" class="btn">Inscription<br/>Entreprise</a>
							<br/><br/>
							<label style="font-size:14px; font-family:'din medium';">Prochainement : <br/>inscription via </label>
							<img src="img/fb.png" width=35px />
							<img src="img/lkdin.png" width=35px />
						</div>

						<!-- Register Form -->
						<div class="user_register">
							<form method="post" action="#">
								<p>
								<label for="nom" >Votre nom :
								<span class="error">* <?php echo $nameErr;?></span></label>
								<input type="text" name="nom" value="<?php echo $nom;?>" />
								<br/>
								<label for="prenom" >Votre prenom : </label>
								<input type="text" name="prenom" value="<?php echo $prenom;?>"/>
								<br/>
								<label for="email" >Votre email :
								<span class="error">* <?php echo $emailErr;?></span></label>
								<input type="text" name="email" value="<?php echo $email;?>"/>
								<br/>
								<label for="passwd" >Mot de passe :
								<span class="error">* <?php echo $passwdErr;?></span> </label>
								<input type="password" name="passwd" value=""/>
								<br/>
								<label for="passwd2" >Confirmez le mot de passe :
								<span class="error">* <?php echo $passwd2Err;?></span></label>
								<input type="password" name="passwd2" value=""/>
								<br/>
								<p style="font-size:14px; text-align: right;">
								<span class="error">* required field.</span>
								</p>
								<div class="action_btns">
									<div class="one_half"><a href="#" class="btn back_btn"> Retour</a></div>
									<div class="one_half"><input type="submit" class="btn_red" value="Inscription" /></div>
								</div>
							</form>
						</div>

						<!-- Register Form -->
						<div class="company_register">
							<form method="post" action="#">
								<p>
								<label for="nom" >Nom de votre société :
								<span class="error">* <?php echo $nameErr;?></span></label>
								<input type="text" name="name" value="<?php echo $nom;?>" />
								<br/>
								<label for="prenom" >Votre numéro de Siret : </label>
								<input type="text" name="siret" value="<?php echo $prenom;?>"/>
								<br/>
								<label for="email" >Votre email :
								<span class="error">* <?php echo $emailErr;?></span></label>
								<input type="text" name="cmail" value="<?php echo $email;?>"/>
								<br/>
								<label for="passwd" >Mot de passe :
								<span class="error">* <?php echo $passwdErr;?></span> </label>
								<input type="password" name="cpasswd" value=""/>
								<br/>
								<label for="passwd2" >Confirmez le mot de passe :
								<span class="error">* <?php echo $passwd2Err;?></span></label>
								<input type="password" name="cpasswd2" value=""/>
								<br/>
								<p style="font-size:14px; text-align: right;">
								<span class="error">* required field.</span>
								</p>
								<div class="action_btns">
									<div class="one_half"><a href="#" class="btn back_btn"> Retour</a></div>
									<div class="one_half"><input type="submit" class="btn_red" value="Inscription" /></div>
								</div>
							</form>
						</div>
					</section>
				</div>
		<script type="text/javascript">
				$("#modal_trigger").leanModal({top : 200, overlay : 0.6, closeButton: ".modal_close" });

				$(function(){
					// Calling Register Form
					$("#register_form").click(function(){
						$(".user_register").show();
						$(".company_register").hide();
						$(".user_login").hide();
						$(".user_reg").hide();
						$(".header_title").text('Inscription etudiant');
						return false;
					});

					// Calling Company Register Form 
					$("#cregister_form").click(function(){
						$(".company_register").show();
						$(".user_register").hide();
						$(".user_login").hide();
						$(".user_reg").hide();
						$(".header_title").text('Inscription entreprise');
						return false;
					});

					// Going back to Social Forms
					$(".back_btn").click(function(){
						$(".user_login").show();
						$(".user_reg").show();
						$(".company_register").hide();
						$(".user_register").hide();
						$(".header_title").text('Connexion');
						return false;
					});

					//Account creation ok
					$("#ok").click(function(){
						$("#co_ok").hide();
						$("#ok").hide();
						return false;
					});

					//Account creation nok
					$("#nok").click(function(){
						$("#co_nok").hide();
						$("#nok").hide();
						$(".user_register").show();
						$(".user_login").hide();
						$(".user_reg").hide();
						$(".header_title").text('Inscription etudiant');
						return false;
					});

					//validate login
					$("#validate").click(function(){

						location.reload();
						$(".user_login").hide();
						$(".user_register").hide();
						$(".company_register").hide();
						$(".social_login").hide();
						$.post('includes/signing.php', {login:$("#login").val(), passwd:$("#passwd").val()});
						$("#modal").hide();
						$("#lean_overlay").fadeOut(200);
			                $(modal_id).css({
			                    "display": "none"
			                })
						return false;
					});

				})
			</script>
		<?php } ?>
		</header>
