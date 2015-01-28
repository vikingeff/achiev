<?php include("includes/header.php");
//Si user non connecter, rediriger
try
{
	mysql_connect("db561556877.db.1and1.com:3306","dbo561556877","Achi3vr");
	mysql_select_db("db561556877");
}
catch (Exception $e)
{
	die('Erreur : ' . $e->getMessage());
}
?>

<div class="content">
	<h1>Profil</h1>
	<p>
<?php
	//Remplacer mon mail par une variable
	$reponse = mysql_query('SELECT * FROM student WHERE mail_student="m1602@hotmail.fr"');
	$donnees = mysql_fetch_array($reponse);
	echo $donnees['fname_student'];
	echo (" ");
	echo $donnees['lname_student'];?>
	<br/>
	<strong>Mail : </strong>
	<?php
	echo $donnees['mail_student'];
	?>
	<br />
	<strong>Formation :</strong>
	<?php
	if ($donnees['school_student'])
	{
		echo $donnees['school_student'];
	}
	else
	{
		echo (" Non renseigner");
	}
?>
	</p>
</div>

<?php include("includes/footer.php"); ?>
