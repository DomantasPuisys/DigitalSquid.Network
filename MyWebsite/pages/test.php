<?php
	include 'mysql.php';

	$timefix = strtotime("+2 hour", time());

	date_default_timezone_set("Europe/Vilnius");
	$date = new \DateTime();
	$time = date_format($date, 'G');

	echo $time;

	$query = "SELECT * FROM dienos_planas WHERE laikas = '$time'";
	$result = mysqli_query($connect,$query);
	$rows = mysqli_fetch_assoc($result);
	echo $rows['Tekstas'];
?>