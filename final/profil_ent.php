<?php
	include ('includes/modif.php');
	if ($mail == "")
		$mail = $_SESSION['loggued_on_user'];
	$request = "SELECT company_contact FROM contact where mail_contact='$mail'";
	$reponse = mysqli_query($con, $request);
	$donnees = mysqli_fetch_array($reponse);
		$id = $donnees['company_contact'];
	$request = "SELECT * FROM company where id_company='$id'";
	$reponse = mysqli_query($con, $request);
	$donnees = mysqli_fetch_array($reponse);
		$name = $donnees['name_company'];
		$activity = $donnees['activity_company'];
		$adress = $donnees['adress_company'];
		$ville = $donnees['city_company'];
		$zipcode = $donnees['zipcode_company'];
		$country = $donnees['country_company'];
		$description = $donnees['description_company'];
?>
<div style="position: relative; top: -20px;">
<div class="head_profil">
	<h1><?php echo $name;?></h1>
	<div class="contact blk">
		<span class="wtr"></span><br/>
	</div>
	<div class="formation blk">
		<span class="wtr"></span><br/>
		<?php echo $activity; ?>
	</div>
	<div class="perso blk">
		<span class="wtr"></span><br/>
		<?php echo $mail."<br/>".$adress.", ".$zipcode." ,".$ville;?>
	</div>
</div>

<div class="content desc">
<h1> Description de l'entreprise</h1>
<br/>
	<?php
	if ($description)
		echo $description;
	else
		echo "L'entreprise n'as pas remplis de description";
		?>
</div>
</div>
