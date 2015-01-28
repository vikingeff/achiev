<?php include("header.php");
	session_start();
	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		include ("./includes/modif.php");
		$title = $_POST["titre"];
		$request2 = "select id_subject from type where name_type=\"".$_POST["mtype"]."\"";
		$res2=mysqli_query($con, $request2);
		$buff2=mysqli_fetch_array($res2);
		$type=$buff2['id_subject'];
		$desc=$_POST["desc"];
		$date=$_POST["datepicker"];
		$date = date('Ymd', strtotime($date));
		$price=$_POST["price"];
		$request2 = "select id_contact, company_contact from contact where mail_contact=\"".$_SESSION['loggued_on_user']."\"";
		$res2=mysqli_query($con, $request2);
		$buff2=mysqli_fetch_array($res2);
		$contact=$buff2['id_contact'];
		$comp=$buff2['company_contact'];
		include ("./includes/cmission.php");
		mysqli_close($con);
	}
?>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
	<script>
		$(function() {
		$( "#datepicker" ).datepicker();
		});
	</script>
	<div class="content">
	<h2>Création d'une mission</h2>
		<form method="post">
			<p>
				<label for="titre">Titre de la mission: </label>
				<input type="text" name="titre" id="titre"/>
				</br></br>
				<label for="mtype">Type de la mission: </label>
				<select name="mtype"> 
					<option>Choisissez un type...</option>
					<?php
					include "./includes/modif.php";
					$request = "select name_subject from subject";
					$res = mysqli_query($con,$request);
					while ($row = mysqli_fetch_array($res))
					{
						echo "<optgroup label=\"".$row['name_subject']."\">";
						$request2 = "select name_type from type where id_subject = (select id_subject from subject where name_subject='".$row['name_subject']."')";
						$buff = mysqli_query($con,$request2);
						while ($rauw = mysqli_fetch_array($buff))
						{
							echo "<option>".$rauw['name_type']."</option>";
						}
						echo "</optgroup>";
					}
					mysqli_close($con);
					?>
				</select> 		
				</br></br>
				<label for="desc">Descriptif de la mission: </label>
				<textarea rows="5" cols="50" name="desc" id="desc"></textarea>
				</br></br>
				<label for="datepicker">Date limite: </label>
				<input type="text" id="datepicker" name="datepicker">
				</br></br>
				<label for="propo">Notre proposition de tarif: </label>
				<?php
					include "./includes/modif.php";
					// $request = "select name_subject from subject";
					// $res = mysqli_query($con,$request);
					// while ($row = mysqli_fetch_array($res))
					// {
					// 	echo "<optgroup label=\"".$row['name_subject']."\">";
					// 	$request2 = "select name_type from type where id_subject = (select id_subject from subject where name_subject='".$row['name_subject']."')";
					// 	$buff = mysqli_query($con,$request2);
					// 	while ($rauw = mysqli_fetch_array($buff))
					// 	{
					// 		echo "<option>".$rauw['name_type']."</option>";
					// 	}
					// 	echo "</optgroup>";
					// }
					$res = mysqli_query ($con, "SELECT COUNT(*) AS MAX FROM price");
					$max = mysqli_fetch_array($res);
					$randprix=rand(0, $max['MAX']);
					$res = mysqli_query($con, "select min_price, max_price from price where id_price='".$randprix."'");
					$max = mysqli_fetch_array($res);
					$proprice = "entre ".$max['min_price']." et ".$max['max_price'];
					mysqli_close($con);
					?>
				<input type="text" name="propo" id="propo" value="<?php echo $proprice; ?>" disabled/>
				</br></br>
				<label for="price">Votre tarif: </label>
				<input type="text" name="price" id="price"/>
				</br></br>
				<input type="submit" name="submit" value="OK"/>
			</p>
		</form>
	</div>
<?php
include("footer.php");?>