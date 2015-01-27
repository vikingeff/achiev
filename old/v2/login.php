<?php include("header.php");
	session_start();
	if ($_SESSION['loggued_on_user'])
		echo "Vous etes deja connecte";
	else
	{
if (isset($_GET['user']) && $_GET['user'] === 'failed')
		echo "<h3><span class=\"error\">Wrong username/passwd</span></h3>";
?>
	<div class="content">
	<h2>Bienvenu jeune coquinou</h2>
		<form method="post" action="./includes/signing.php">
			<p>
				<label for="login">Identifiant: </label>
				<input type="text" name="login" id="login" autofocus/>
				</br>
				<label for="passwd">Mot de passe: </label>
				<input type="password" name="passwd" id="passwd"/>
				</br></br>
				<input type="submit" name="submit" value="OK"/>
			</p>
		</form>
	</div>
<?php }
include("footer.php");?>
