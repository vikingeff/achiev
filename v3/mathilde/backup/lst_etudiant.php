<?php include("includes/header.php");
try
{
	mysql_connect("db561556877.db.1and1.com:3306", "dbo561556877", "Achi3vr");
	mysql_select_db("db561556877");
}
catch (Exception $e)
{
	die('Erreur : ' . $e->getMessage());
}
?>

<div class="content">
	<h1>Listes des etudiants</h1>
	<?php
		$reponse = mysql_query('SELECT * FROM student ORDER BY done_student DESC');
		$i = 0;
		while ($donnees = mysql_fetch_array($reponse) AND $i < 100)
		{
			echo ($i.": ".$donnees['fname_student']." ".$donnees['lname_student']."<br/>");
			echo "    Domaine de competence :";
			switch ($donnees['domaine_student'])
			{
				case 1:
					echo "Business<br/>";
				break;
				case 2:
					echo "Art appliqué<br/>";
				break;
				case 3:
					echo "Informatique<br/>";
				break;
				default :
					echo "Non renseignée <br/>";
			}

			echo "    Formation :";
			switch ($donnees['school_student'])
			{
				case 1:
					echo "HEC <br/>";
				break;
				case 2:
					echo "Condé <br/>";
				break;
				case 3:
					echo "42 <br/>";
				break;
				default :
					echo "Non renseignée <br/>";
			}
			echo "<br/>";
		$i = $i + 1;
		}
	?>
</div>
<?php include("includes/footer.php"); ?>
