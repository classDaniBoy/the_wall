<?php  

if(isset($_POST['login_button'])) {
	
	$email = filter_var($_POST['log_email']); 
	
	$_SESSION['log_email'] = $email; 
	$password = ($_POST['log_password']);

	$check_database_query = mysqli_query($mysqli, "SELECT * FROM usuarios WHERE email='$email' AND contrasenia='$password'");
	$check_login_query = mysqli_num_rows($check_database_query);

	if($check_login_query == 1) {
		$row = mysqli_fetch_array($check_database_query);
		$username = $row['nombreusuario'];
		$email = $row['email'];
		$id = $row['id'];
		$first_name = $row['nombre'];
		$last_name = $row['apellido'];
		$_SESSION['user_logged_user_name'] = $username;
		$_SESSION['user_logged_first_name'] = $first_name;
		$_SESSION['user_logged_last_name'] = $last_name;
		$_SESSION['user_logged_id'] = $id;
		$_SESSION['user_logged_email'] = $email;
		var_dump($_SESSION);
		header("Location: feed.php");
		exit();
	}
	else {
		$error_array = [];
		array_push($error_array, "Email or password was incorrect<br>");
	}


}

?>