<?php
	include ('includes/modif.php');
	$mail = $_SESSION["loggued_on_user"];
	$request = "SELECT * FROM student WHERE mail_student='$mail'";
	$reponse = mysqli_query($con, $request);
	$donnees = mysqli_fetch_array($reponse);
		$fname = $donnees['fname_student'];
		$lname = $donnees['lname_student'];
		$ville = $donnees['city_student'];
		$phone = $donnees['phone_student'];
		$mouv = $donnees['mouv_student'];
		$bio = $donnees['bio_student'];
		$domaine = $donnees['domaine_student'];
		$ecole = $donnees['school_student'];
		$year = $donnees['year_student'];
		$spe = $donnees['spe_student'];
		$lv1 = $donnees['lv1_student'];
		$lv2 = $donnees['lv2_student'];
		$photo = $donnees['photo_student'];
?>

<h1>Profil</h1>
<p>
	<h2>Information du compte :</h2>
	<form method="post" action="includes/new_mailopass.php">
		<label for="mail">Votre mail :</label>
		<input type="text" name="mail" value="<?php echo $mail; ?>"/><br/>
		<label for="pass">Votre mot de passe:</label>
		<input type="password" name="pass" /><br/>
		<label for="rpass">Repetez le mot de passe:</label>
		<input type="password" name="rpass" /><br/>
		<input type="submit" value="Modifier les information"/>
	</form>

	<h2>Informations personnelles</h2>
	<form method="post" action="includes/new_infoperso.php">
		<label for="photo">Un lien vers votre photo de profil</label>
		<input type="text" name="photo" value="<?php echo $photo; ?>"/><br/>
		<label for="phone">Votre numero de telephone</label>
		<input type="text" name="phone" value="<?php echo $phone; ?>"/><br/>
		<label for="ville">Votre lieu de residence</label>
		<input type="text" name="ville" value="<?php echo $ville; ?>"/><br/>
		<label for="mouv">Pouvez-vous de vous deplacer pour vos missions ?</label>
		<select name="mouv" size="1">
			<option value="1" <?php if ($mouv  == 1) {?>selected<?php }?>>non
			<option value="2" <?php if ($mouv  == 2) {?>selected<?php }?>>oui
		</select><br/>
		<label for="info">Vous pouvez rediger ici un message a l'attention des entreprises qui visiterons votre profil</label><br/>
		<textarea name="info" rows="6" cols="60" ><?php echo $bio; ?></textarea><br/>
		<input type="submit" value="Modifier les information"/>
	</form>

	<h2>Votre formation</h2>
	<form method="post" action="includes/new_formation.php">

		<label for="domaine">Votre domaine de competence :</label>
		<select name="domaine">
<?php
	$reponse = mysqli_query($con, "select * from subject");
	while ($donnees = mysqli_fetch_array($reponse))
	{
		?>
		<option value="<?php echo $donnees['id_subject']; ?>"
		<?php
			if ($donnees['id_subject'] == $domaine)
			{?>
				selected
			<?php
				}
			?>>
		<?php
		echo $donnees['name_subject'];
	}
?>
		</select><br/>

		<label for="ecole">Votre ecole:</label>
		<select name="ecole">
<?php
	$reponse = mysqli_query($con, "select * from school");
	while ($donnees = mysqli_fetch_array($reponse))
	{
		?>
		<option value="<?php echo $donnees['id_school']; ?>"
		<?php if ($donnees['id_school'] == $ecole)
			{
		?> selected <?php
			}
		?>>
		<?php
		echo $donnees['name_school'];
	}
?>
		</select><br/>
		<label for="year">Votre annee d'etude :</label>
		<input type="text" name="year" value="<?php echo (int)$year; ?>"/><br/>
		<label for="spe">Specialite :</label>
		<input type="text" name="spe" value="<?php echo $spe; ?>"/><br/>
		<label for="lv1">Langues maitrises:</label><br/>
		<input type="text" name="lv1" value="<?php echo $lv1; ?>"/><br/>
		<input type="text" name="lv2" value="<?php echo $lv2; ?>"/><br/>
		<input type="submit" value="Modifier les information"/>
	</form>
</p>
