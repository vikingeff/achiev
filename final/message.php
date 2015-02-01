<style type="text/css">
label { display: inline-block; width: 200px; text-align: right; }​
</style>
<?php
	session_start();
	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		include ("./includes/modif.php");
		$mess = $_POST["mess"];
		// $request2 = "select id_subject from type where name_type=\"".$_POST["mtype"]."\"";
		// $res2=mysqli_query($con, $request2);
		// $buff2=mysqli_fetch_array($res2);
		// $type=$buff2['id_subject'];
		$id_annonce=$_SESSION['active_mission'];
		$date = date('Y-m-d H:i:s');
		if ($_SESSION['user_type'] == 1 )
			$request2 = "select id_student from student where mail_student=\"".$_SESSION['loggued_on_user']."\"";
		else
			$request2 = "select id_contact from contact where mail_contact=\"".$_SESSION['loggued_on_user']."\"";
		$res2=mysqli_query($con, $request2);
		$buff2=mysqli_fetch_array($res2);
		$expediteur=$buff2['id_student'];
		$destinataire=$_SESSION['temp_dest'];
		// $comp=$buff2['company_contact'];
		include ("./includes/cmessage.php");
		mysqli_close($con);
	}
?>
	<div class="content">
	<h1>Messagerie</h1>
	<h2><?php $_SESSION['active_mission']?></h2>
		<form method="post">
			<p>
				<?php
				include "./includes/modif.php";
				// $request2 = "select id_annonce from annonce where title=\"".$_SESSION['active_mission']."\"";
				// $res2=mysqli_query($con, $request2);
				// $buff2=mysqli_fetch_array($res2);
				$mission=$_SESSION['active_mission'];

				// echo $request2;
				if ($_SESSION['user_type'] == 1 )
					$request2 = "select id_student from student where mail_student=\"".$_SESSION['loggued_on_user']."\"";
				else
					$request2 = "select id_contact from contact where mail_contact=\"".$_SESSION['loggued_on_user']."\"";$res2=mysqli_query($con, $request2);
				$buff2=mysqli_fetch_array($res2);
				$id_exp=$buff2['id_student'];
				$request = "select * from message where annonce_message=\"".$mission."\" order by date_message";
				$res = mysqli_query($con,$request);
				// echo $mission;
				// echo $id_exp;
				//echo $request;
				$index=0;
				while ($row = mysqli_fetch_array($res))
				{
					$_SESSION['temp_dest'] = $row['expediteur_message']; 
					if ($index==1)
						$request2 = "select fname_contact, lname_contact from contact where id_contact=\"".$_SESSION['temp_dest']."\"";
					else
						$request2 = "select fname_student, lname_student from student where id_student=\"".$_SESSION['temp_dest']."\"";
					$res2=mysqli_query($con, $request2);
					$buff2=mysqli_fetch_array($res2);
					if ($index==1)
					{
						echo $buff2['fname_contact']." ".$buff2['lname_contact']." : ";
						$index=0;
					}
					else
					{
						echo $buff2['fname_student']." ".$buff2['lname_student']." : ";
						$index=1;
					}
					echo $row['text_message'];
					echo "</br>";
				}
				mysqli_close($con);
				?>
				</br></br>
				<label for="mess">Message : </label>
				<textarea rows="5" cols="50" name="mess" id="mess"></textarea>
				</br></br>
				<input type="submit" name="submit" value="Envoyer le message"/>
			</p>
		</form>
	</div>
