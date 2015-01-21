<?php
	$con=mysqli_connect("db561556877.db.1and1.com:3306","dbo561556877","Achi3vr","db561556877");
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: FUCK OFF"."\n" ;
		exit();
	}
	else
		echo "Connect to MySQL: GRANTED\n" ;
?>