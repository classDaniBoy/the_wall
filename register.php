<html>
<head>
	<title>Bienvenidos a The Wall!</title>
	<link rel="stylesheet" type="text/css" href="assets/css/register_style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="assets/js/register.js"></script>
</head>
<body>

	<div class="wrapper">

		<div class="login_box">

			<div class="login_header">
				<h1>The Wall!</h1>
				Ingresá o registrate!
			</div>
			<br>
			<div id="first">

				<form action="register.php" method="POST">
					<input type="email" name="log_email" placeholder="Email" value="" required>
					<br>

					<input type="password" name="log_password" placeholder="Contraseña">
					<br>

					<input type="submit" name="login_button" value="Ingresar">
					<br>
					<a href="#" id="signup" class="signup">No tenés una cuenta? Registrate!</a>

				</form>

			</div>

			<div id="second">

				<form enctype="multipart/form-data" action="register.php" method="POST">
					<input type="text" name="reg_fname" placeholder="Nombre" value="" required>
					<br>
					<input type="text" name="reg_lname" placeholder="Apellido" value="" required>
					<br>
					<input type="email" name="reg_email" placeholder="Email" value="" required>
					<br>
					<input type="email" name="reg_email2" placeholder="Confirm Email" value="" required>
					<br>
					<input type="password" name="reg_password" placeholder="Password" required>
					<br>
					<input type="password" name="reg_password2" placeholder="Confirm Password" required>
					<br>
					<input type="password" name="reg_password2" placeholder="Confirm Password" required>
					<br>
					<p>Seleccionar imagen de perfil</p>
					<input type="file" name="profile_pic" required>
					<br>
					<input type="submit" name="register_button" value="Registrarse">
					<br>
					<a href="#" id="signin" class="signin">Ya tenés una cuenta? Ingresá acá!</a>
				</form>
			</div>

		</div>

	</div>


</body>
</html>