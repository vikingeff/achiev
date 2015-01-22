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
?>

<div id="stud">
	<h1>Espace etudiant</h1>
	<img src="img/logo.png" width = "400px"/>
	<div class="studbut">
		<a href="inscription_etudiant.php"><h2>Creez votre profil</h2>
		<p>Rejoignez nous et realisez vos premiere mission</p></a>
		<br/>
		<br/>
		<h2>Connectez-vous ?</h2>
	</div>
</div>

<div class="content" >
	<h1>Annonces</h1>

		//Si connecter, filtrer domaine<br/><br/>
	<div class="exmission" />
		<h2>Top</h2>
	<?php
		$reponse = mysql_query('SELECT * FROM annonce WHERE statut=0 ORDER BY answer DESC');
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
		$reponse = mysql_query('SELECT * FROM annonce WHERE statut=0 ORDER BY date DESC');
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
		$reponse = mysql_query('SELECT * FROM annonce WHERE statut=1 ORDER BY date DESC');
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
