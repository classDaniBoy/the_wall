<?php
$error_array = array();

if(isset($_POST['listo'])){

	$id=$_SESSION['user_logged_id'];

	$fname = strip_tags($_POST['nombre']); 
	$fname = str_replace(' ', '', $fname); 
	$_SESSION['nombre'] = $fname;
	
	$lname = strip_tags($_POST['apellido']); 
	$lname = str_replace(' ', '', $lname);
	$_SESSION['apellido'] = $lname;

	$uname = strip_tags($_POST['usuario']); 
	$uname = str_replace(' ', '', $uname);
	$_SESSION['usuario'] = $uname;

	$em = strip_tags($_POST['email']); 
	$em = str_replace(' ', '', $em);
	$_SESSION['email'] = $em;


		if(filter_var($em, FILTER_VALIDATE_EMAIL)) {

			$em = filter_var($em, FILTER_VALIDATE_EMAIL);
		}
		else {
			array_push($error_array, "Invalid email format<br>");
		}


	if(strlen($fname) > 25 || strlen($fname) < 2) {
		array_push($error_array, "Your first name must be between 2 and 25 characters<br>");
	}

	if(strlen($lname) > 25 || strlen($lname) < 2) {
		array_push($error_array,  "Your last name must be between 2 and 25 characters<br>");
	}

	if(empty($error_array)) {

		mysqli_query($mysqli, "UPDATE `usuarios`SET`apellido`='$lname', `nombre`='$fname', `email`='$em', `nombreusuario`='$uname' WHERE id='$id'");
		header("Location= settings.php?success");

	}
}
?>