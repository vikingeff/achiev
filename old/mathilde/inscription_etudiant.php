<?php include("includes/header.php"); ?>

<div class="content">
	<h1>Inscription</h1>
Avec achiev vous aurez acces a des milliers d'offres de missions pour gagner de l'argent et de l'experience.
<form method="post" action="#">
	<p>
		<label for="nom" >Votre nom : </label>
		<input type="text" name="nom" />
		<br/>
		<label for="prenom" >Votre prenom : </label>
		<input type="text" name="prenom" />
		<br/>
		<label for="email" >Votre email : </label>
		<input type="text" name="email" />
		<br/>
		<label for="pass" >Mot de passe : </label>
		<input type="password" name="pass" />
		<br/>
		<label for="cpass" >Confirmez le mot de passe : </label>
		<input type="password" name="cpass" />
		<br/>
		<input type="submit" value="Rejoignez Achiev" />
	</p>
</form>
</div>

<?php include("includes/footer.php"); ?>
