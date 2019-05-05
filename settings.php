<?php

	include ("includes/header.php");
	//include("includes/settings_handler.php");
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
		<img src="img/userimage.jpg">
    	<br>
		<p>Cambiar imagen de perfil</p>
		<input type="file" name="profile_pic" required>
    </div>
    <br>
 
	<form action="settings.php" method="POST" id="settings_in">
		Nombre:<input type="text" name="nombre" placeholder="Inserte nuevo nombre" id="settings_input"><br>
		Apellido:<input type="text" name="apellido" placeholder="Inserte nuevo apellido"id="settings_input"><br>
		Usuario:<input type="text" name="usuario" placeholder="Inserte un nuevo usuario" id="settings_input"><br>
		Email:<input type="text" name="email" placeholder="Inserte nuevo email"id="settings_input"><br>
		<input type="submit" name="listo" id="settings_submit" value="Listo"><br>
	</form>

	<h4>Cambiar contraseña</h4>
	<form action="settings.php" method="POST">
		Contraseña actual:<input type="password" name="actual_pass" id="settings_input"><br>
		Contraseña nueva:<input type="password" name="new_pass"id="settings_input" ><br>
		Repita la nueva contraseña:<input type="password" name="new_pass2"id="settings_input"><br>
		<input type="submit" name="cambiar" id="settings_submit" value="Cambiar contraseña"><br>
	</form>

</div>
