<html>
	<head>
		<title>Achievr</title>
		<link rel="stylesheet" href="style.css" />
	</head>

	<body>
		<header>

<!-- Si pas connecter : -->
			<ul class="deroulant" id="inscription">
			<div class="bouton">Inscription</div>
				<ul>
					<li><a href="inscription_etudiant.php">Etudiant</a></li>
					<li><a href="#">Particulier ou entreprise</a></li>
				</ul>
			</ul>

			<a href="index.php"><img src="img/logo.png" height="40px"/></a>
<!-- Voir pourquoi le lien change la taille-->

<!-- Si pas connecter : -->
		<?php
		session_start(); 
			if (isset($_SESSION['loggued_on_user']))
			{
				echo "<ul class=\"deroulant\">";
				echo "<div class=\"bouton\">Deconnection</div></a>";
				echo "</ul>";
				//session_unset();
				//session_destroy();
			}
			else
			{
				echo "<ul class=\"deroulant\">";
				echo "<a href=\"./includes/login.php\"><div class=\"bouton\">Connection</div></a>";
				echo "</ul>";
			}
		?>
<!-- Sinon afficher deconnection -->
		</header>
