<?php 
	include("includes/header.php");
  $usersql = "SELECT * FROM usuarios WHERE id = 1";
  $user = $mysqli->query($usersql)->fetch_assoc();
  $messagessql = "SELECT * FROM mensaje WHERE usuarios_id = 1";
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
      <p><?php echo $user['nombre'] ?></p>
      <p><?php echo $user['nombreusuario'] ?></p>
 			<p>Posts: 235</p>
 			<p>Likes: 670</p>
 			<p>Friends: 50</p>
 		</div>

   <a href="settings.php">
     <button type="button" class="btn register btn-primary">Configuracion de cuenta</button>
   </a>
 	</div>

    <h1>a</h1><br>

    <div class="post_self column">
    <form class="post_form" action="feed.php" method="POST" enctype="multipart/form-data">
      <input type="file" name="upload_img" id="fileToUpload">
      <textarea name="post_text" id="post_text" maxlength="140" placeholder="Tienes algo que compartir?"></textarea>
      <input type="submit" name="post" id="post_button" value="Publicar">
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