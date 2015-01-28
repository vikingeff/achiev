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

	<?php if ($_SESSION['loggued_on_user'] AND $_SESSION['user_type'] == 1)
		{
	?>
	<div id="dash">
		<a href="?menu=0">Dashboard</a>
		<a href="?menu=1">Profil</a>
	<?php
			if ($_GET['menu'] == 1)
				include('my_profil_et.php');
			else
				include('dashboard.php');
		}
		else
		{
	?>
	</div>
	<div id="stud">
	<img src="img/pg_student.png" id="headpicto"/>
	<h1>
	<img src="img/trait.png" id="trait" />
	Espace etudiant
	<img src="img/trait.png" id="trait" />
	</h1>
		<div class="etape">
			<span class="blk">1<br/><img src="img/trait.png" id="trait" /></span>
			<span class="blk">2<br/><img src="img/trait.png" id="trait" /></span>
			<span class="blk">3<br/><img src="img/trait.png" id="trait" /></span>
		</div>
		<div class="tuto">
			<span class="blk">
			Créez, personnalisez<br/>votre profil en moins<br/>de deux minutes<br/>
			<img src="img/1_std.png" class="picto" />
			</span>
			<span class="blk">
			Sélectionnez<br/> des missions valorisantes<br/>pour votre profil<br/>
			<img src="img/2_std.png" class="picto" />
			</span>
			<span class="blk">
			Dès qu'une entreprise<br/>vous recrute commencez<br/>à travailler<br/>
			<img src="img/3_std.png" class="picto" />
			</span>
		</div>
		<?php if ($_SESSION['loggued_on_user'] == "")
		{
			?>
			<a class="modal_trigger ins" href="#modal"><h3>Créez votre profil</h3></a>
			<?php
		}
			?>
	<?php
		}
	?>
</div>


<div class="lst_annonce">
<?php
if ($_SESSION['loggued_on_user'] AND $_SESSION['user_type'] == 1)
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
<h1>Nos missions en temps réels</h1>

<div class="title">
	<div class="exmission"><img src="img/populaire.png"/><br/>Populaires</div>
	<div class="exmission"><img src="img/recente.png"/><br/>Récentes</div>
	<div class="exmission"><img src="img/done.png"/><br/>Accomplies</div>
</div>
<div class="ann">
	<div class="exmission" />
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
 			<h3><?php echo $donnees['title'];?></h3>
 			<span class="owner"><?php echo $donnees['owner'];?><span> / 
			<span class="prix"><?php echo $donnees['prix'];?> €</span><br/>
			<span class="date"><?php echo $donnees['date'];?></span><br/>
			<br/>+<br/>
 		<?php
 		$i = $i + 1;
		}
		?>
	</div>

	<div class="exmission" />
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
 			<h3><?php echo $donnees['title'];?></h3>
 			<span class="owner"><?php echo $donnees['owner'];?><span> / 
			<span class="prix"><?php echo $donnees['prix'];?> €</span><br/>
			<span class="date"><?php echo $donnees['date'];?></span><br/>
			<br/>+<br/>
 		<?php
 		$i = $i + 1;
		}
		?>
	</div>

	<div class="exmission" />
	<?php
		if ($dom)
		{
			$reponse = mysql_query("SELECT * FROM annonce WHERE (statut=2 AND domaine='$dom') ORDER BY answer DESC");
		}
		else
		{
			$reponse = mysql_query('SELECT * FROM annonce WHERE statut=2  ORDER BY answer DESC');
		}
		$i = 0;
		while ($donnees = mysql_fetch_array($reponse) AND $i < 5)
		{
		?>
			<h3><?php echo $donnees['title'];?></h3>
			<span class="owner"><?php echo $donnees['owner'];?><span> / 
			<span class="prix"><?php echo $donnees['prix'];?> €</span><br/>
			<span class="date"><?php echo $donnees['date'];?></span><br/>
			<br/>+<br/>
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
