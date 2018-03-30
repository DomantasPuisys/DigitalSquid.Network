<?php

	$connect = mysqli_connect("localhost" , "root" , "" , "dashboard");

	if (mysqli_connect_errno())
	{
		echo "Negalima prisijungti: " . mysqli_connect_error();
	}

?>