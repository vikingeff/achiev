<html>
<head>
	<title>Achievr</title>
	<link rel="stylesheet" href="style.css" />
	<meta charset="UTF-8">
</head>

<body>
	<div id="header"> <!-- header present que sur la page index -->
	<?php session_start();
	if (!($_SESSION['loggued_on_user']))
	{ ?>
		<div class="bouton" id="inscription">
			INSCRIPTION
			<div class="deroulant">
				<p>
				<a href="inscription_etudiant.php">Etudiant</a>
				<br/><br/>
				<a href="#">Entreprise</a></p>
			</div>
		</div>
	<?php }
	else
	{ ?>
		<a href="#"><div class="bouton" id="inscription">MON ESPACE</div></a>
	<?php } ?>

	<a href="index.php"><img src="img/Logo.png" width=200px; /></a>

	<?php if ($_SESSION['loggued_on_user'])
	{?>
		<a href="includes/signout.php"><div class="bouton" id="codeco">DECONNEXION</div></a>
	<?php }
	else
	{ ?>
		<a href="login.php"><div class="bouton" id="codeco">CONNEXION</div></a>
	<?php } ?>
		<br/>
		<br/>
		<img src="img/Business-clair.png" width=20px; />
		<img src="img/Design-clair.png" width=20px; />
		<img src="img/Info-clair.png" width=20px; />
		<p>VOS MISSIONS RÉALISÉES<br/>PAR DES ÉTUDIANTS</p>
		<a href="etudiant.php"><div class="choix">ÉTUDIANTS</div></a>
		<a href="client.php"><div class="choix">ENTREPRISES</div></a>
	</div>
	<div id="subheader">
		<div class="schoix">GAGNEZ DE L'EXPÉRIENCE</div>
		<div class="schoix">GAGNEZ DU TEMPS</div>
		<br/><br/><br/>
		<img src="img/trait.png" width=30px; /><br /><br/>
		10 524 <p>OFFRES</p>
		<br/><br/>
		<img src="img/trait.png" width=30px; /><br />
	</div>



	<div class="content">
		<h1>Exemple de mission</h1>
		<div class="exmission">
			<h2>Informatique</h2>
			<img src="img/logo.png" width="100px"/>
			<ul>
				<li>Creer un site internet</li>
				<li>Developper une application mobile</li>
				<li>Accompagnement d'infrastructure reseau</li>
				<li>...</li>
			</ul>
		</div>
		<div class="exmission">
			<h2>Business</h2>
			<img src="img/logo.png" width="100px"/>
			<ul>
				<li>Questionnaire pour etude de marchee</li>
				<li>Visits mystere</li>
				<li>Enquete google</li>
				<li>...</li>
			</ul>
		</div>
		<div class="exmission">
			<h2>Design et Graphisme</h2>
			<img src="img/logo.png" width="100px"/>
			<ul>
				<li>Creatin de maquette pour un site web</li>
				<li>Creation d'affiche publicitaire</li>
				<li>Realisation de faire-part</li>
				<li>...</li>
			</ul>
		</div>
	</div>

<?php include("includes/footer.php"); ?>
