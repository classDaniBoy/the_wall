<?php

$passwordMessage="";

if(isset($_POST['cambiar'])){

	$id=$_SESSION['user_logged_id'];
	$password = strip_tags($_POST['actual_pass']);
	$password2 = strip_tags($_POST['new_pass']);
	$password3 = strip_tags($_POST['new_pass2']);

	$dbPassword = mysqli_query($mysqli,"SELECT * FROM `usuarios` WHERE `id`='$id' AND contrasenia='$password'");
	$check_pass_query = mysqli_num_rows($dbPassword);
	if($check_pass_query == 1) {
		if ($password2 == $password3) {
			if (strlen($password2)<5) {
				$passwordMessage="Contraseña demasiado corta";
			}else{
				mysqli_query($mysqli, "UPDATE `usuarios` SET `contrasenia` = '$password2' WHERE `id`='$id'");
				$passwordMessage="Contraseña cambiada";
			}

		}else{
			$passwordMessage =" Las contraseñas no concuerdan";
		}
	}
	else{
		$passwordMessage="Contraseña incorrecta";
	}
}

header("Location= settings.php?success");

?>