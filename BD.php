<?php 
	session_start();
	$mysqli = mysqli_connect("localhost","root","","mydb");
	if (mysqli_connect_errno($mysqli)) {
		echo "fallo al conectar a MYSQL: " . mysqli_connect_error();
	}
 ?>