<?php

include 'mysql.php';

$user = $_SESSION['username'];
$query = "SELECT * FROM vartotojai WHERE username = '$user'";
$result = mysqli_query($connect,$query);
$rows = mysqli_fetch_assoc($result);
$type = $rows['type']; 
?>