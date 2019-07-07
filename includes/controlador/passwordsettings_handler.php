<?php

if(isset($_POST['cambiar'])){
	include '../../BD.php';

	$id=$_SESSION['user_logged_id'];
	$password = strip_tags($_POST['actual_pass']);
	$password2 = strip_tags($_POST['new_pass']);
	$password3 = strip_tags($_POST['new_pass2']);

	$dbPassword = mysqli_query($mysqli,"SELECT * FROM `usuarios` WHERE `id`='$id' AND contrasenia='$password'");
	$check_pass_query = mysqli_num_rows($dbPassword);
	if($check_pass_query == 1) {
		if ($password2 == $password3) {
			if (strlen($password2)<5) {
				$_SESSION['passwordMessage']="<span style='color: #FF0000;'> Contraseña demasiado corta</span><br>";
			}else{
				mysqli_query($mysqli, "UPDATE `usuarios` SET `contrasenia` = '$password2' WHERE `id`='$id'");
				$_SESSION['passwordMessage']="<span style='color: #14C800;'>Contraseña modificada exitosamente</span><br>";
			}

		}else{
			$_SESSION['passwordMessage'] ="<span style='color: #FF0000;'> Las contraseñas no concuerdan</span><br>";
		}
	}
	else{
		$_SESSION['passwordMessage']="<span style='color: #FF0000;'> Contraseña incorrecta</span><br>";
	}
}

header("Location: http://localhost/the_wall/settings.php");
exit();

?>