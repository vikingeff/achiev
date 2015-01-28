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
	<img src="img/pg_entreprise.png" id="headpicto"/>
	<h1>
	<img src="img/trait.png" id="trait" />
	Espace entreprise
	<img src="img/trait.png" id="trait" />
	</h1>
	<?php if ($_SESSION['loggued_on_user'] AND $_SESSION['user_type'] == 2)
		{
	?>
		<h1>Le dashboard ici</h1>
	<?php
		}
		else
		{
	?>
<div class="etape">
			<span class="blk">1<br/><img src="img/trait.png" id="trait" /></span>
			<span class="blk">2<br/><img src="img/trait.png" id="trait" /></span>
			<span class="blk">3<br/><img src="img/trait.png" id="trait" /></span>
		</div>
		<div class="tuto">
			<span class="blk">
			Créez, personnalisez<br/>votre profil en moins<br/>de deux minutes<br/>
			<img src="img/1_ent.png" class="picto" />
			</span>
			<span class="blk">
			Sélectionnez<br/> des missions valorisantes<br/>pour votre profil<br/>
			<img src="img/2_ent.png" class="picto" />
			</span>
			<span class="blk">
			Dès qu'une entreprise<br/>vous recrute commencez<br/>à travailler<br/>
			<img src="img/3_ent.png" class="picto" />
			</span>
		</div>
		<?php if ($_SESSION['loggued_on_user'] == "")
		{
			?>
			<a class="modal_trigger insent" href="#modal"><h3>Créez votre profil</h3></a>
			<?php
		}
			?>	<?php
		}
	?>
</div>

<?php include("includes/footer.php"); ?>
