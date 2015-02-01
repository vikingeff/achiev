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

	<?php if ($_SESSION['loggued_on_user'] AND $_SESSION['user_type'] == 2)
		{
	?>
		<div class="dash_menu">
			<div class="item_menu">
				<a href="?menu=0">
				<img src="img/Dashboard/dashboard.png" /><br/>
				Dashboard</a>
			</div>
			<div class="item_menu">
				<a href="?menu=1">
				<img src="img/Dashboard/profil.png" /><br/>
				Profil</a>
			</div>

			<div class="item_menu name">
				<img id="center" src="img/pg_entreprise.png" /><br/>
				<?php
					include('includes/modif.php');
					$mail = $_SESSION['loggued_on_user'];
					$rep = mysqli_query($con, "SELECT company_contact FROM contact WHERE mail_contact='$mail'");
					$don = mysqli_fetch_array($rep);
					$id = $don['company_contact'];
					$rep = mysqli_query($con, "SELECT name_company FROM company WHERE id_company='$id'");
					$don = mysqli_fetch_array($rep);
					echo $don['name_company'];
				?>
			</div>

			<div class="item_menu">
				<a href="?menu=2">
				<img src="img/Dashboard/consultation.png" /><br/>
				Creation d'offre</a>
			</div>
			<div class="item_menu">
				<a href="?menu=3">
				<img src="img/Dashboard/recherche.png" /><br/>
				Recherche</a>
			</div>
		</div>

		<div id="dash">
	<?php
		if ($_GET['menu'] == 1)
			include('profil_ent.php');
		else if ($_GET['menu'] == 2)
			include('mission.php');
		else if ($_GET['menu'] == 3)
			include('search.php');
		else
			include('dashboard_ent.php');
		}
		else
		{
	?>
	</div>
	<div id="stud">
<img src="img/pg_entreprise.png" id="headpicto"/>
	<h1>
	<img src="img/trait.png" id="trait" />
	Espace entreprise
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
			<a class="modal_trigger insent" href="#modal"><h3>Créez votre profil</h3></a><br/>
			<a href="etudiant.php"><h3 class="acces">
				<img src="img/trait.png" class="t1" />
				AccÈs étudiant
				<img src="img/trait.png" class="t2" />
			</h3></a>
			<?php
		}
			?>	<?php
		}
	?>
</div>

<div class="lst_annonce">
<h1> Nos étudiants en temps réels</h1>

<?php if ($_GET['pop'])
	{
	$mail = $_GET['mail'];
	?>
		<div id="back" onclick="document.getElementById('back').style.display='none'">
		<div id="pop_annonce" width="90%">
			<div id="close" onclick="document.getElementById('back').style.display='none'">x</div>
	<?php
	include('profil_et.php');
	?>
	</div></div>
	<?php } ?>

<div class="title">
	<div class="exmission"><img src="img/populaire.png"/><br/>Populaires</div>
	<div class="exmission"><img src="img/recente.png"/><br/>Recents</div>
	<div class="exmission"><img src="img/done.png"/><br/>Actifs</div>
</div>

<div class="ann">
<?php include('includes/modif.php'); ?>
	<div class="exmission" />
	<?php
		$reponse = mysqli_query($con, "SELECT fname_student, lname_student, domaine_student, school_student, mail_student FROM student ORDER BY done_student DESC");
		$i = 0;
		while ($donnees = mysqli_fetch_array($reponse) AND $i < 5)
		{
		?>
		<a href="client.php?pop=1&mail=<?php echo $donnees['mail_student'];?>">
		<h3><?php echo $donnees['fname_student']." ".$donnees['lname_student'];?></h3></a>
		<span class="owner">
		<?php
			$rep = mysqli_query($con, "select * from subject");
			$found = 0;
			while ($don = mysqli_fetch_array($rep))
			{
				if ($donnees['domaine_student'] == $don['id_subject'])
				{
					echo $don['name_subject'];
					$found = 1;
					break;
				}
			}
			if ($found == 0)
				echo "Domaine non renseigne";
		?>
		</span><br/>
		<span class="prix">
		<?php
			$rep = mysqli_query($con, "select * from school");
			$found = 0;
			while ($don = mysqli_fetch_array($rep))
			{
				if ($donnees['school_student'] == $don['id_school'])
				{
					echo $don['name_school'];
					$found = 1;
					break;
				}
			}
			if ($found == 0)
				echo "Ecole non renseignee";
		?>
		</span>
		<br/>
		<a href="client.php?pop=1&mail=<?php echo $donnees['mail_student'];?>">+<br/></a>
		<?php
		$i = $i + 1;
		}
		?>
	</div>

	<div class="exmission" />
	<?php
		$reponse = mysqli_query($con,"SELECT fname_student, lname_student, domaine_student, school_student, mail_student FROM student ORDER BY id_student DESC");
		$i = 0;
		while ($donnees = mysqli_fetch_array($reponse) AND $i < 5)
		{
		?>
		<a href="client.php?pop=1&mail=<?php echo $donnees['mail_student'];?>">
		<h3><?php echo $donnees['fname_student']." ".$donnees['lname_student'];?></h3></a>
		<span class="owner">
		<?php
			$rep = mysqli_query($con, "select * from subject");
			$found = 0;
			while ($don = mysqli_fetch_array($rep))
			{
				if ($donnees['domaine_student'] == $don['id_subject'])
				{
					echo $don['name_subject'];
					$found = 1;
					break;
				}
			}
			if ($found == 0)
				echo "Domaine non renseigne";
		?>
		</span><br/>
		<span class="prix">
		<?php
			$rep = mysqli_query($con, "select * from school");
			$found = 0;
			while ($don = mysqli_fetch_array($rep))
			{
				if ($donnees['school_student'] == $don['id_school'])
				{
					echo $don['name_school'];
					$found = 1;
					break;
				}
			}
			if ($found == 0)
				echo "Ecole non renseignee";
		?>
		</span>
		<br/>
		<a href="client.php?pop=1&mail=<?php echo $donnees['mail_student'];?>">+<br/></a>
		<?php
		$i = $i + 1;
		}
		?>
	</div>

	<div class="exmission" />
	<?php
		$reponse = mysqli_query($con, "SELECT fname_student, lname_student, domaine_student, school_student, mail_student FROM student WHERE done_student > 0");
		$i = 0;
		while ($donnees = mysqli_fetch_array($reponse) AND $i < 5)
		{
		?>
		<a href="client.php?pop=1&mail=<?php echo $donnees['mail_student'];?>">
		<h3><?php echo $donnees['fname_student']." ".$donnees['lname_student'];?></h3></a>
		<span class="owner">
		<?php
			$rep = mysqli_query($con, "select * from subject");
			$found = 0;
			while ($don = mysqli_fetch_array($rep))
			{
				if ($donnees['domaine_student'] == $don['id_subject'])
				{
					echo $don['name_subject'];
					$found = 1;
					break;
				}
			}
			if ($found == 0)
				echo "Domaine non renseigne";
		?>
		</span><br/>
		<span class="prix">
		<?php
			$rep = mysqli_query($con, "select * from school");
			$found = 0;
			while ($don = mysqli_fetch_array($rep))
			{
				if ($donnees['school_student'] == $don['id_school'])
				{
					echo $don['name_school'];
					$found = 1;
					break;
				}
			}
			if ($found == 0)
				echo "Ecole non renseignee";
		?>

		</span>
		<br/>
		<a href="client.php?pop=1&mail=<?php echo $donnees['mail_student'];?>">+<br/></a>
		<?php
		$i = $i + 1;
		}
		?>
	</div>
</div>

</div>

<?php include("includes/footer.php"); ?>
