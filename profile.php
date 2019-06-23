<?php 
	include("includes/header.php");
  include("includes/controlador/friend_handler.php"); 
  include("includes/controlador/likes_handler.php");

    $friend_id = $_GET['friend_id'];
    $user_id = $_SESSION['user_logged_id'];
    $added_query = "SELECT * FROM siguiendo WHERE usuarios_id = $user_id AND usuarioseguido_id =$friend_id";
    $added_helper = $mysqli->query($added_query);
    if (mysqli_num_rows($added_helper) > 0) {
      $added = true;
    }
    else{
      $added = false;      
    }

    $result_count = mysqli_query($mysqli,"SELECT COUNT(*) As total_records FROM mensaje WHERE usuarios_id = '$friend_id'");
    $total_records = mysqli_fetch_array($result_count);
    $total_records = $total_records['total_records'];
    $total_no_of_pages = ceil($total_records / $total_records_per_page);
    $second_last = $total_no_of_pages - 1; // total pages minus 1
  
    $usersql = "SELECT * FROM usuarios WHERE id = $friend_id";
    $friend = $mysqli->query($usersql)->fetch_assoc();
    $messagessql = "SELECT * FROM mensaje WHERE usuarios_id = '$friend_id' LIMIT $offset, $total_records_per_page";
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
 		<img src="mostrarImagen.php?id_imagen=7">

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
        <input type="hidden" name="page_from" value="profile.php">
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
      				<img class="comment" src="mostrarImagen.php?id_imagen=7" alt="profile image" />
              <?php echo $message['texto'] ?>
    			</div>
  			</div>
      <?php endforeach; ?>
    </div>
</div>
<br>
<br>
<br>
    <ul class="pagination">
      <?php if($page_no > 1){
        echo "<li><a href='?friend_id=".$friend_id."&page_no=1'>First Page <br></a></li>";
      } ?>
          
      <li <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
      <a <?php if($page_no > 1){
        echo "href='?friend_id=".$friend_id."&page_no=$previous_page'";
      } ?>>Previous </a><br>
      </li>
          
      <li <?php if($page_no >= $total_no_of_pages){
        echo "class='disabled'";
      } ?>>
      <a <?php if($page_no < $total_no_of_pages) {
        echo "href='?friend_id=".$friend_id."&page_no=$next_page'";
      } ?>>Next </a> <br>
      </li>
       
      <?php if($page_no < $total_no_of_pages){
        echo "<li><a href='?friend_id=".$friend_id."&page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
    } ?>
    </ul>
<br>
<br>
<br>
<?php 
    include("includes/footer.php");
 ?>
</body>

</html>