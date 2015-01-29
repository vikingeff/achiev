<?php
	$mail = $_SESSION["loggued_on_user"];
	$reponse = mysql_query("SELECT * FROM student WHERE mail_student='$login'");
	while ($donnees = mysql_fetch_array($reponse))
	{
		//$ville = $donnees['ville'];
		//$info
		$domaine = $donnees['domaine_student'];
		$ecole = $donnees['school_student'];
	//	$complement = 
	}
?>

<h1>Profil</h1>

<p>
	Pour changer l'une de vos informations, modifiez un des champs puis cliquez sur "modifier les informations".
	<h2>Information du compte :</h2>
	<form method="post" action="includes/new_mailopass.php">
		<label for="mail">Votre mail :</label>
		<input type="text" name="mail" value="<?php echo $mail; ?>"/><br/>
		<label for="pass">Votre mot de passe:</label>
		<input type="password" name="pass" /><br/>
		<label for="rpass">Repetez le mot de passe:</label>
		<input type="password" name="rpass" /><br/>
		<input type="submit" value="Modifier les information"/>
	<form>

	<h2>Informations personnelles</h2>
	<form method="post" action="includes/new_infoperso.php">
		<label for="ville">Votre lieu de residence</label>
		<input type="text" name="ville" value="<?php echo $ville; ?>"/><br/>
		<label for="mouv">Pouvez-vous de vous deplacer pour vos missions ?</label>
		<select name="mouv" size="1"><option value="1">oui<option value="2">non</select><br/>
		<label for="info">Vous pouvez rediger ici un message a l'attention des entreprises qui visiterons votre profil</label><br/>
		<textarea name="info" rows="6" cols="60"></textarea><br/>
		<input type="submit" value="Modifier les information"/>
	</form>

	<h2>Votre formation</h2>
	<form method="post" action="includes/new_formation.php">
		<label for="domaine">Votre domaine de competence :</label>
		<select name="domaine">
			<option value="1" <?php if ($domaine  == 1) {?>selected<?php }?>>Informatique
			<option value="2" <?php if ($domaine  == 2) {?>selected<?php }?>>Art applique
			<option value="2" <?php if ($domaine  == 3) {?>selected<?php }?>>Business
		</select><br/>
		//Modifier pour aller chercher dans la base de donnee<br/>
		<label for="ecole">Votre ecole:</label>
		<input type="text" name="ecole" value="<?php echo $ecole; ?>"/><br/>
		<label for="comp_form">Complement d'information sur votre formation</label>
		<input type="text" name="comp_form" value="<?php echo $comp_form; ?>"/><br/>
		<input type="submit" value="Modifier les information"/>
	</form>
</p>
