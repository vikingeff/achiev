<?php include("includes/header.php");
try
{
	mysql_connect("db561556877.db.1and1.com:3306","dbo561556877","Achi3vr"); // Connexion à la base de données
	mysql_select_db("db561556877");
}
catch (Exception $e)
{
	die('Erreur : ' . $e->getMessage());
}
session_start();
?>

<div id="stud">
	<h1>Espace etudiant</h1>
	<img src="img/logo.png" width = "400px"/>

	<div class="studbut">
	<?php if ($_SESSION['loggued_on_user'])
		{
	?>
		<a href="#"><h2>Votre profil ..dashboard etc</h2></a>
	<?php
		}
		else
		{
	?>
		<a href="inscription_etudiant.php"><h2>Creez votre profil</h2>
		<p>Rejoignez nous et realisez vos premiere mission</p></a>
		<br/>
		<br/>
		<h2>Connectez-vous ?</h2>
	<?php
		}
	?>
	</div>
</div>

<?php
if ($_SESSION['loggued_on_user'])
{
	$login = $_SESSION["loggued_on_user"];
	$reponse = mysql_query("SELECT * FROM student WHERE mail_student='$login'");
	while ($donnees = mysql_fetch_array($reponse))
	{
	$dom = $donnees['domaine_student'];
	}
}
else
{
	$dom = NULL;
}
?>

<div class="content" >
	<h1>Annonces</h1>
	<div class="exmission" />
		<h2>Top</h2>
	<?php
		if ($dom)
		{
			$reponse = mysql_query("SELECT * FROM annonce WHERE (statut=0 AND domaine='$dom') ORDER BY answer DESC");
		}
		else
		{
			$reponse = mysql_query('SELECT * FROM annonce WHERE statut=0  ORDER BY answer DESC');
		}
		$i = 0;
		while ($donnees = mysql_fetch_array($reponse) AND $i < 5)
 		{
 		?>
 			<?php echo $donnees['title'];?>
 			by <?php echo $donnees['owner'];?><br/>
 		<?php
 		$i = $i + 1;
		}
		?>
	</div>

	<div class="exmission" />
		<h2>Nouvelles</h2>
	<?php
		if ($dom)
		{
			$reponse = mysql_query("SELECT * FROM annonce WHERE (statut=0 AND domaine='$dom') ORDER BY answer DESC");
		}
		else
		{
			$reponse = mysql_query('SELECT * FROM annonce WHERE statut=0  ORDER BY answer DESC');
		}
		$i = 0;
		while ($donnees = mysql_fetch_array($reponse) AND $i < 5)
 		{
 		?>
 			<?php echo $donnees['title'];?>
 			by <?php echo $donnees['owner'];?><br/>
 		<?php
 		$i = $i + 1;
		}
		?>
	</div>

	<div class="exmission" />
		<h2>Fini</h2>
	<?php
		if ($dom)
		{
			$reponse = mysql_query("SELECT * FROM annonce WHERE (statut=0 AND domaine='$dom') ORDER BY answer DESC");
		}
		else
		{
			$reponse = mysql_query('SELECT * FROM annonce WHERE statut=0  ORDER BY answer DESC');
		}
		$i = 0;
		while ($donnees = mysql_fetch_array($reponse) AND $i < 5)
 		{
 		?>
 			<?php echo $donnees['title'];?>
 			by <?php echo $donnees['owner'];?><br/>
 		<?php
 		$i = $i + 1;
		}
		?>
	</div>
</div>
<?php
	mysql_close();
?>
<?php include("includes/footer.php"); ?>
