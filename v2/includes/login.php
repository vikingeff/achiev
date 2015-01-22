<h2>Bienvenu jeune coquinou</h2>
<?php
	session_start();
	if (isset($_GET['user']) && $_GET['user'] === 'failed')
		echo "<h3><span class=\"error\">Wrong username/passwd</span></h3>";
?>
<form method="post" action="signing.php">
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