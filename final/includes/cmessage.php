<?php
	$fields = "id_message, annonce_message, date_message, destinataire_message, expediteur_message, text_message";
	$request = "insert into message ($fields) values (NULL, \"$id_annonce\", \"$date\", \"$destinataire\", \"$expediteur\", \"$mess\")";
	//echo $request;
	if (!mysqli_query($con,$request))
	{
		echo "1";
		die('Error: ' . mysqli_error($con));
	}
?>