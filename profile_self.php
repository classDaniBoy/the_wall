<?php 
	include("includes/header.php");
  include ("upload.php");
    $id = $_SESSION['user_logged_id'];
    $messagessql = "SELECT * FROM mensaje WHERE usuarios_id = '$id'";
    $messages = $mysqli->query($messagessql);
 ?>
	<link rel="stylesheet" type="text/css" href="assets/css/profile_style.css">
  <style type="text/css">
    .wrapper {
      margin-left: 0px;
      padding-left: 0px;
    }

  </style>
	
 	<div class="profile_left">
 		<img src="img/userimage.jpg">

 		<div class="profile_info">
      <p><?php echo $_SESSION['user_logged_first_name'] . " " .$_SESSION['user_logged_last_name'] ?></p>
      <p><?php echo $_SESSION['user_logged_user_name'] ?></p>
 		</div>

   <a href="settings.php">
     <button type="button" class="btn register btn-primary">Configuracion de cuenta</button>
   </a>
 	</div>

    <h1>a</h1><br>

    <div class="post_self column">
    <form class="post_form" action="profile_self.php" method="POST" enctype="multipart/form-data">
      <input type="file" name="file">
      <textarea name="post_text" id="post_text" maxlength="140" placeholder="Tienes algo que compartir?"></textarea>
      <input type="submit" name="post" value="Publicar">
    </form>
    </div>
    <br>

		<div class="container_self column">
         <?php foreach ($messages as $key => $message): ?>
  			<div class="row">
    			<div class="col-sm-12 strip">
              <?php echo $user['nombre'] ?><br>
      				<img class="comment" src="img/userimage.jpg" alt="profile image" />
      				<?php echo $message['texto'] ?><br>
              <a href="profile_self.php">
                <button type="button" class="btn register btn-primary">Eliminar</button>
              </a>
    			</div>
  			</div>
        <?php endforeach; ?> 
        </div>
<?php 
    include("includes/footer.php");
 ?>
</body>

</html>