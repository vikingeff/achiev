<?php
	include ('includes/modif.php');
	$req = "SELECT * FROM annonce WHERE id_annonce='$annonce'";
	$reponse = mysqli_query($con, $req);
	$donnees = mysqli_fetch_array($reponse);
		$title = $donnees['title'];
		$company = $donnees['company'];
		$date = $donnees['date'];
		$title = $donnees['title'];
		$domaine = $donnees['domaine'];
		$description = $donnees['description'];
		$prix = $donnees['prix'];
		$prix_final = $donnees['prix_final'];
		$answer = $donnees['answer'];
		$statut = $donnees['statut'];
		$student = $donnees['student_annonce'];
?>
<h1><?php echo $title; ?></h1>
<?php
	echo "Créée le ".$date." ar ";
	$reponse = mysqli_query($con, "SELECT * from company");
	while ($donnees = mysqli_fetch_array($reponse))
	{
		if ($donnees['id_company'] == $company)
		{
			echo $donnees['name_company'];
			break;
		}
	}
	echo "<br/><br/><br/><br/>";?>
	<div class="contannonce"><?php
	echo "Nombre de réponses actuellement: ".$answer."<br/><br/>";
	echo "<strong>Description :<br/></strong>";
	echo "<div class='desc'>".$description."<br/></div><br/></div>";
	if ($statut == 0)
	{
		echo "rémuneration proposée :<strong> ".$prix." €</strong><br/><br/>";
		?><a href="etudiant.php?menu=6">Répondre a l'annonce</a><?php
	}
	else
	{
		echo "Cette annonce a ete réalisée pour ".$prix_final."€";
		echo "par ";
		$reponse = mysqli_query($con, "SELECT * from student");
		while ($donnees = mysqli_fetch_array($reponse))
		{
			if ($donnees['id_student'] == $student)
			{
				echo $donnees['fname_student']." ".$donnees['lname_student'];
				break;
			}
		}
	}
?>
