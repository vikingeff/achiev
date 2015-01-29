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
	echo "Creer le ".$date." par ";
	$reponse = mysqli_query($con, "SELECT * from company");
	while ($donnees = mysqli_fetch_array($reponse))
	{
		if ($donnees['id_company'] == $company)
		{
			echo $donnees['name_company'];
			break;
		}
	}
	echo "<br/>Domaine :";
	$reponse = mysqli_query($con, "SELECT * from subject");
	while ($donnees = mysqli_fetch_array($reponse))
	{
		if ($donnees['id_subject'] == $domaine)
		{
			echo $donnees['name_subject']."<br/>";
			break;
		}
	}
	echo "Nombre de reponse actuellement: ".$answer."<br/>";
	echo "Description :<br/>";
	echo $description."<br/>";
	if ($statut == 0)
	{
		echo "remuneration propose : ".$prix."<br/>";
		?><a href="#">Repondre a l'annonce</a><?php
	}
	else
	{
		echo "Cette annonce a ete realisee pour ".$prix_final."euros ";
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
