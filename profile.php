<?php 
	include("includes/header.php");
  include("includes/controlador/friend_handler.php"); 
    $friend_id = 2;
    $user_id = $_SESSION['user_logged_id'];
    $added_query = "SELECT * FROM siguiendo WHERE usuarios_id = $user_id AND usuarioseguido_id =$friend_id";
    $added_helper = $mysqli->query($added_query);
    if (mysqli_num_rows($added_helper) > 0) {
      $added = true;
    }
    else{
      $added = false;      
    }
    $usersql = "SELECT * FROM usuarios WHERE id = $friend_id";
    $friend = $mysqli->query($usersql)->fetch_assoc();
    $messagessql = "SELECT * FROM mensaje WHERE usuarios_id = '$friend_id'";
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
 		<img src="assets/images/profile_pics/defaults/head_emerald.png">

 		<div class="profile_info">
      <p>
        <?php echo $friend['apellido']; ?>
      </p>
      <p>
        <?php echo $friend['nombre']; ?>
      </p>
 		</div>
    <?php if ($added): ?>
      <form  name="friendRemovalForm" action="profile.php" method="POST">
        <input type="hidden" value="<?php echo $friend_id ?>" id="friend_id" name="friend_id">
        <button type="submit" name="remove_friend" class="btn danger btn-primary">Dejar de seguir</button>
      </form>
    <?php else: ?>
      <form  name="friendForm" action="profile.php" method="POST">
        <input type="hidden" value="<?php echo $friend_id ?>" id="friend_id" name="friend_id">
        <button type="submit" name="add_friend" class="btn register btn-primary">Añadir a mis amigos</button>
      </form>
    <?php endif ?>

 	</div>


	<div class="wrapper column">
		<h1><?php echo $friend['nombreusuario']; ?></h1>
		<div class="container column">
      <?php foreach ($messages as $key => $message): ?>
  			<div class="row">
    			<div class="col-sm-12 strip">
      				<img class="comment" src="assets/images/profile_pics/defaults/head_emerald.png" alt="profile image" />
              <?php echo $message['texto'] ?>
    			</div>
  			</div>
      <?php endforeach; ?>
    </div>
</div>
<?php 
    include("includes/footer.php");
 ?>
</body>

</html>