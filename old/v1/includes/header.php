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
			if (isset($_SESSION['loggued_on_user']) && $_SESSION['loggued_on_user'] !== "")
			{
				echo "<ul class=\"deroulant\">";
				echo "<div class=\"bouton\">".$_SESSION['loggued_on_user']."</div></a>";
				echo "<ul>";
				echo "<li><a href=\"./includes/signout.php\">Deconnection</a></li>";
				echo "</ul>";
				echo "</ul>";
			}
			else
			{
				echo "<ul class=\"deroulant\">";
				echo "<a href=\"login.php\"><div class=\"bouton\">Connection</div></a>";
				echo "</ul>";
			}
		?>
<!-- Sinon afficher deconnection -->
		</header>
