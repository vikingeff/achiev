<?php
	include ('includes/modif.php');
	if ($mail == "")
		$mail = $_SESSION['loggued_on_user'];
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

<div class="head_profil">
	<h1><?php echo $fname." ".$lname ;?></h1>
	<div class="contact blk">
		<span class="wtr"></span><br/>
		<?php echo $mail."<br/>".$ville ;?>
	</div>
	<div class="formation blk">
		<span class="wtr"></span><br/>
		<?php
			$reponse = mysqli_query($con, "select * from subject");
			while ($donnees = mysqli_fetch_array($reponse))
			{
				if ($domaine == $donnees['id_subject'])
				{
					echo $donnees['name_subject'];
					break;
				}
			}
		?>
		<br/>
		<?php
			$reponse = mysqli_query($con, "select * from school");
			while ($donnees = mysqli_fetch_array($reponse))
			{
				if ($ecole == $donnees['id_school'])
				{
					echo "<strong style='font-size=18px'>".$donnees['name_school']."</strong>";
					break;
				}
			}
		?>
	</div>
	<div class="perso blk">
		<span class="wtr"></span><br/>
		<!-- 18 ans<br/>Ne le 20 juin 1996 -->
		<br/>
	</div>
</div>

<div class="content_profil">
	<div class="photo">
		<img src="<?php echo $photo ;?>" id="photo" /><br/><br/>
		<a href="etudiant.php?menu=1">Modifier les informations 
		<img src="img/Design-clair.png" width="15px"/></a>
	</div>

	<div class="info">
		<div class="info_formation case">
			<h1>Formation</h1>
			<img src="img/trait.png"/><br/>
			<?php echo $spe."<br/>Annees :".$year; ?>
		</div>
		<div class="info_exp case">
			<h1>Experiences</h1>
			<img src="img/trait.png"/><br/>
			<?php if ($_SESSION['loggued_on_user']!=="apingaud@free.fr")
			{
				echo "Identite visuelle pour iko<br/>";
				echo "stage chez milk";
			}
			else
			{
				echo " - <br/>";
				echo " - ";}?>
		</div>
		<div class="info_competence case">
			<h1>Residence</h1>
			<img src="img/trait.png"/><br/>
			<?php echo $ville."<br/>";
			if ($mouv == 1)
				echo "Ne peux pas se deplacer";
			else
				echo "-";
			?>
		</div>
		<div class="case">
			<h1>Linguistique</h1>
			<img src="img/trait.png" /><br/>
			<?php
				if ($lv1)
					echo $lv1;
				else
					echo "_";
				echo "<br/>";
				if ($lv2)
					echo $lv2;
				else
					echo "_";
			?>
		</div>
	</div>
</div>

