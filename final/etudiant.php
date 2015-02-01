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
		<div class="dash_menu">
			<div class="item_menu">
				<a href="?menu=0">
				<img src="img/Dashboard/dashboard.png" /><br/>
				Dashboard</a>
			</div>
			<div class="item_menu">
				<a href="?menu=2">
				<img src="img/Dashboard/profil.png" /><br/>
				Profil</a>
			</div>

			<div class="item_menu name">
				<img id="center" src="img/pg_student.png" /><br/>
				<?php
				include('includes/modif.php');
				$mail = $_SESSION['loggued_on_user'];
				$rep = mysqli_query($con, "SELECT lname_student, fname_student FROM student WHERE mail_student='$mail'");
				$don = mysqli_fetch_array($rep);
				echo $don['lname_student']." ".$don['fname_student'];
				?>
			</div>

			<div class="item_menu">
				<a href="?menu=4">
				<img src="img/Dashboard/consultation.png" /><br/>
				Consultation d'offres</a>
			</div>
			<div class="item_menu">
				<a href="?menu=5">
				<img src="img/Dashboard/recherche.png" /><br/>
				Recherche</a>
			</div>
		</div>
	<div id="dash">
	<?php
			if ($_GET['menu'] == 1)
				include('my_profil_et.php');
			else if ($_GET['menu'] == 2)
				include('profil_et.php');
			else if ($_GET['menu'] == 4)
				include('consult.php');
			else if ($_GET['menu'] == 5)
			include('search.php');
			else if ($_GET['menu'] == 6)
				include ('message.php');
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
			<a class="modal_trigger ins" href="#modal"><h3>Créez votre profil</h3></a><br/>
			<a href="client.php"><h3 class="acces">
				<img src="img/trait.png" class="t1" />
				AccÈs entreprise
				<img src="img/trait.png" class="t2" />
			</h3></a>
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

<?php if ($_GET['pop'])
	{
	$annonce = $_GET['ann'];
	?>
		<div id="back" onclick="document.getElementById('back').style.display='none'">
		<div id="pop_annonc">
			<div id="close" onclick="document.getElementById('back').style.display='none'">x</div>
		<?php include('annonce.php'); ?>
		</div>
		</div>
	<?php
	} ?>

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
			$reponse = mysql_query('SELECT * FROM annonce WHERE statut=0 ORDER BY answer DESC');
		}
		$i = 0;
		while ($donnees = mysql_fetch_array($reponse) AND $i < 5)
 		{
 		?>
 			<a href="etudiant.php?pop=1&ann=<?php echo $donnees['id_annonce'];?>">
				<h3><?php echo $donnees['title'];?></h3>
			</a>
			<span class="owner">
			<?php
				$rep = mysqli_query($con, "SELECT * from company");
				while ($don = mysqli_fetch_array($rep))
				{
					if ($don['id_company'] == $donnees['company'])
					{
						echo $don['name_company']."<br/>";
						break;
					}
				}
			?>
			</span>
				<?php echo "Prix : ";?>
			<span class="prix">
				<?php echo $donnees['prix']." €";?>
			</span><br/>
			<br/>
			<a href="etudiant.php?pop=1&ann=<?php echo $donnees['id_annonce'];?>">+</a><br/>
 		<?php
 		$i = $i + 1;
		}
		?>
	</div>

	<div class="exmission" />
	<?php
		if ($dom)
		{
			$reponse = mysql_query("SELECT * FROM annonce WHERE (statut=0 AND domaine='$dom') ORDER BY date DESC");
		}
		else
		{
			$reponse = mysql_query('SELECT * FROM annonce WHERE statut=0  ORDER BY date DESC');
		}
		$i = 0;
		while ($donnees = mysql_fetch_array($reponse) AND $i < 5)
 		{
 		?>
		<a href="etudiant.php?pop=1&ann=<?php echo $donnees['id_annonce'];?>">
 			<h3><?php echo $donnees['title'];?></h3>
		</a>
		<span class="owner">
			<?php
				$rep = mysqli_query($con, "SELECT * from company");
				while ($don = mysqli_fetch_array($rep))
				{
					if ($don['id_company'] == $donnees['company'])
					{
						echo $don['name_company']."<br/>";
						break;
					}
				}
			?>
			</span>
			<?php echo "Prix : ";?>
			<span class="prix">
				<?php echo $donnees['prix']." €";?>
			</span><br/>
			<br/>
			<a href="etudiant.php?pop=1&ann=<?php echo $donnees['id_annonce'];?>">+</a><br/>
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
		<a href="etudiant.php?pop=1&ann=<?php echo $donnees['id_annonce'];?>">
			<h3><?php echo $donnees['title'];?></h3>
		</a>
			<span class="owner">
			<?php
				$rep = mysqli_query($con, "SELECT * from company");
				while ($don = mysqli_fetch_array($rep))
				{
					if ($don['id_company'] == $donnees['company'])
					{
						echo $don['name_company']."<br/>";
						break;
					}
				}
			?>
			</span>
			<?php echo "Prix : ";?>
			<span class="prix">
				<?php echo $donnees['prix']." €";?>
			</span><br/>
			<br/>
			<a href="etudiant.php?pop=1&ann=<?php echo $donnees['id_annonce'];?>">+</a><br/>
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
