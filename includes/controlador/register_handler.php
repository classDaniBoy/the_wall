<?php
$fname = ""; 
$lname = ""; 
$uname = "";
$em = "";
$em2 = "";
$password = "";
$password2 = "";
$date = ""; 

if(isset($_POST['register_button'])){
	$error_array = array();

	$fname = strip_tags($_POST['reg_fname']); 
	$fname = str_replace(' ', '', $fname); 
	$_SESSION['reg_fname'] = $fname;
	
	$lname = strip_tags($_POST['reg_lname']); 
	$lname = str_replace(' ', '', $lname);
	$_SESSION['reg_lname'] = $lname;

	$uname = strip_tags($_POST['reg_uname']); 
	$uname = str_replace(' ', '', $uname);
	$_SESSION['reg_uname'] = $uname;

	$em = strip_tags($_POST['reg_email']); 
	$em = str_replace(' ', '', $em);
	$_SESSION['reg_email'] = $em;

	$em2 = strip_tags($_POST['reg_email2']);
	$em2 = str_replace(' ', '', $em2);
	$_SESSION['reg_email2'] = $em2;

	//Password
	$password = strip_tags($_POST['reg_password']);
	$password2 = strip_tags($_POST['reg_password2']);

	$imgData = addslashes(file_get_contents($_FILES["profile_pic"]["tmp_name"]));

	$fileName = $_FILES ['profile_pic']['name'];
	$fileExt = explode('.', $fileName);
	$fileActualExt = strtolower(end($fileExt));

	$allowed = array('jpg', 'jpeg' , 'png');
	if (!in_array($fileActualExt, $allowed)) {
		array_push($error_array, "Please upload a valid image format<br>");
	}
	if($em == $em2) {
		if(filter_var($em, FILTER_VALIDATE_EMAIL)) {

			$em = filter_var($em, FILTER_VALIDATE_EMAIL);

			$e_check = mysqli_query($mysqli, "SELECT email FROM usuarios WHERE email='$em'");

			$num_rows = mysqli_num_rows($e_check);

			if($num_rows > 0) {
				array_push($error_array, "Email already in use<br>");
			}

		}
		else {
			array_push($error_array, "Invalid email format<br>");
		}


	}
	else {
		array_push($error_array, "Emails don't match<br>");
	}


	if(strlen($fname) > 25 || strlen($fname) < 2) {
		array_push($error_array, "Your first name must be between 2 and 25 characters<br>");
	}

	if(strlen($lname) > 25 || strlen($lname) < 2) {
		array_push($error_array,  "Your last name must be between 2 and 25 characters<br>");
	}

	if($password != $password2) {
		array_push($error_array,  "Your passwords do not match<br>");
	}
	else {
		if(preg_match('/[^A-Za-z0-9]/', $password)) {
			array_push($error_array, "Your password can only contain alphanumeric characters<br>");
		}
	}

	if(strlen($password > 30 || strlen($password) < 5)) {
		array_push($error_array, "Your password must be betwen 5 and 30 characters<br>");
	}


	$check_username_query = mysqli_query($mysqli, "SELECT nombreusuario FROM usuarios WHERE nombreusuario='$uname'");
	$num_rows = mysqli_num_rows($check_username_query);

	if($num_rows > 0) {
				array_push($error_array, "Username already in use<br>");
			}

	if(empty($error_array)) {
		$query = mysqli_query($mysqli, "INSERT INTO `usuarios`(`apellido`, `nombre`, `email`, `nombreusuario`, `contrasenia`,`foto_contenido`,`foto_tipo`) VALUES ('$lname', '$fname', '$em','$uname', '$password','$imgData','$fileActualExt')");

		array_push($error_array, "<span style='color: #14C800;'>TU CUENTA HA SIDO CREADA POR FAVOR INICIA SESION CON TUS CREDENCIALES HACIENDO CLICKA ABAJO!</span><br>");

		$_SESSION['reg_fname'] = "";
		$_SESSION['reg_lname'] = "";
		$_SESSION['reg_uname'] = "";
		$_SESSION['reg_email'] = "";
		$_SESSION['reg_email2'] = "";
	}

}
?>