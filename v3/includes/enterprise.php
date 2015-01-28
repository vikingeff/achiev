<?php
	$fields = "id_company, name_company, siret_company";
	$fields2 = "id_contact, company_contact, lname_contact, fname_contact, mail_contact, passwd_contact";
	$request = "insert into company ($fields) values (NULL, \"$name\", \"$siret\")";
	echo "0";
	echo $request;
	if (!mysqli_query($con,$request))
	{
		echo "1";
		die('Error: ' . mysqli_error($con));
	}
	if (!($res=mysqli_query($con,"select id_company from company where siret_company = \"$siret\"")))
	{
		echo "2";
		die('Error: ' . mysqli_error($con));
	}
	else
	{
		echo "3";
		$row = mysqli_fetch_array($res);
		$idcompany=$row['id_company'];
	}
	$request = "insert into contact ($fields2) values (NULL, \"$idcompany\", \"$enom\", \"$eprenom\", \"$cmail\", \"$cpasswd\")";
	if (!mysqli_query($con,$request))
	{
		echo "4";
		die('Error: ' . mysqli_error($con));
	}
?>