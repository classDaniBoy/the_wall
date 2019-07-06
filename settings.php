<?php
	include ("includes/header.php");
	include ("includes/controlador/settings_handler.php");
	include ("includes/controlador/passwordsettings_handler.php");
	$id = $_SESSION['user_logged_id'];
  $usersql = "SELECT * FROM usuarios WHERE id = $id";
  $user = $mysqli->query($usersql)->fetch_assoc();
?>
<link rel="stylesheet" type="text/css" href="assets/css/settings_style.css">
<style type="text/css">
  body{
    background-image: url("assets/images/backgrounds/desktop.jpg");
   }
</style>



<div class="main_column column">
	
	<h4>Configuracion de cuenta</h4>
	<div class="profile_img">
		<img src="mostrarImagen.php?id_imagen=<?php echo $id ?>">
    	<br>
    </div>
    <br>
 
	<form enctype="multipart/form-data" name="userDataForm" onsubmit = "return user_data_validate();" action="settings.php" method="POST" id="settings_in">
		Nombre:<input type="text" name="nombre" placeholder="Inserte nuevo nombre" ><br>
		Apellido:<input type="text" name="apellido" placeholder="Inserte nuevo apellido"><br>
		Usuario:<input type="text" name="usuario" placeholder="Inserte un nuevo usuario" ><br>
		Email:<input type="text" name="email" placeholder="Inserte nuevo email"><br>
		<p>Cambiar imagen de perfil :</p>
		<input type="file" name="profile_pic"> <br>
		<input type="submit" name="listo" id="settings_submit" value="Listo"><br>
	</form>

	<h4>Cambiar contraseña</h4>
	<form name="userPasswordForm" onsubmit = "return user_password_validate();" action="settings.php" method="POST">
		Contraseña actual:<input type="password" name="actual_pass" ><br>
		Contraseña nueva:<input type="password" name="new_pass" ><br>
		Repita la nueva contraseña:<input type="password" name="new_pass2"><br>

		<?php echo $passwordMessage; ?>
		<input type="submit" name="cambiar" id="settings_submit2" value="Cambiar contraseña"><br>
	</form>

	<script type="text/javascript">
		function user_data_validate() {
			var email = document.userDataForm.email.value;
			var email_re = /(\w+\@\w+\.\w+$)$/;
	  		var email_val = email_re.test(email);      
			
			var nombre = document.userDataForm.nombre.value;
			var nombre_re = /(\w+)$/;
	  		var nombre_val = nombre_re.test(nombre);

	  		var apellido = document.userDataForm.apellido.value;
			var apellido_re = /(\w+)$/;
	  		var apellido_val = apellido_re.test(apellido);

	  		var usuario = document.userDataForm.usuario.value;
			var usuario_re = /(\w+)$/;
	  		var usuario_val = usuario_re.test(usuario);


	        if (email) {
	        	if(email_val === false) {
	            	alert( "Please provide a valid email adress" );
	            	document.logForm.log_email.focus() ;
	            	return false;
	        }	}
	        if (nombre) {
	        	if( apellido_val === false) {
	            	alert( "Please provide a valid Last Name!" );
	            	document.userDataForm.apellido.focus() ;
	            	return false;
	        }	}

	        if (apellido) {
	        	if( nombre_val === false) {
	            	alert( "Please provide a First Name!" );
	            	document.userDataForm.nombre.focus() ;
	            	return false;
	        }	}

	        if (usuarios) {
	        	if( usuario_val === false) {
	            	alert( "Please provide a valid Username!" );
	            	document.userDataForm.usuario.focus() ;
	            	return false;
	        }	}

	        return true;
      	}

      	function user_password_validate(){
      		var actual_pass = document.userPasswordForm.actual_pass.value;
			var actual_pass_re = /(\w+)$/;
	  		var actual_pass_val = actual_pass_re.test(actual_pass);

	  		var new_pass = document.userPasswordForm.new_pass.value;
			var new_pass_re = /(\w+)$/;
	  		var new_pass_val = new_pass_re.test(new_pass);

	  		var new_pass2 = document.userPasswordForm.new_pass2.value;
			var new_pass2_re = /(\w+)$/;
	  		var new_pass2_val = new_pass2_re.test(new_pass2);

	  		if (new_pass2 !== new_pass) {
	        	alert("Passwords don't match" );
	            document.userPasswordForm.new_pass.focus() ;
	            return false;
	        }

	        if(new_pass_val === false) {
	            alert( "Password is a mandatory field" );
	            document.userPasswordForm.new_pass.focus() ;
	            return false;
	        }
	        if(actual_pass_val === false) {
	            alert( "Password is a mandatory field" );
	            document.userPasswordForm.actual_pass.focus() ;
	            return false;
	        }

	        if(new_pass_val2 === false) {
	            alert( "Password is a mandatory field" );
	            document.userPasswordForm.new_pass2.focus() ;
	            return false;
	        }
	        alert('Your new password was changed succesfully');
	        return true;
      	}
	</script>
</div>
