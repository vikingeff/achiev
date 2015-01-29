<?php
	$fields = "id_student, lname_student, fname_student, mail_student, password_student";
	$request = "insert into student ($fields) values (NULL, \"$nom\", \"$prenom\", \"$email\", \"$passwd\")";
	//echo $request."\n";
	if (!mysqli_query($con,$request))
	{
		die('Error: ' . mysqli_error($con));
	}
	//echo "1 record added";
?>