<?php

$password = "";
$password2 = "";

if(isset($_POST['cambiar'])){
	$password = strip_tags($_POST['reg_password']);
	$password2 = strip_tags($_POST['reg_password2']);


	if($password != $password2) {
		array_push($error_array,  "Your passwords do not match<br>");
	}
	else {
		if(preg_match('/[^A-Za-z0-9]/', $password)) {
			array_push($error_array, "Your password can only contain alphanumeric characters<br>");
		}else{
			if(strlen($password > 30 || strlen($password) < 5)) {
				array_push($error_array, "Your password must be betwen 5 and 30 characters<br>");
			}else{
				mysqli_query($mysqli, "UPDATE usuarios SET contrasenia = $password WHERE id=$user ['id']");
				header("Location= settings.php?success");
			}
			}
			}
		}
?>