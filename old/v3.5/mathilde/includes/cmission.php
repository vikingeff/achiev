<?php
	$fields = "id_annonce, company, date_fin, description, domaine, owner, prix, title";
	$request = "insert into annonce ($fields) values (NULL, \"$comp\", \"$date\", \"$desc\", \"$type\", \"$contact\", \"$price\", \"$title\")";
	//echo $request;
	if (!mysqli_query($con,$request))
	{
		echo "1";
		die('Error: ' . mysqli_error($con));
	}
?>