<?php 
	include("includes/header.php");
  include("includes/controlador/message_post_handler.php");
  include("includes/controlador/message_delete_handler.php");
  include("includes/controlador/friend_handler.php"); 
  include("includes/controlador/likes_handler.php"); 
    $id = $_SESSION['user_logged_id'];

    // PAAGINATION
    $result_count = mysqli_query($mysqli,"SELECT COUNT(*) As total_records FROM mensaje WHERE usuarios_id = '$id'");
    $total_records = mysqli_fetch_array($result_count);
    $total_records = $total_records['total_records'];
    $total_no_of_pages = ceil($total_records / $total_records_per_page);
    $second_last = $total_no_of_pages - 1; // total pages minus 1

    $messagessql = "SELECT * FROM mensaje WHERE usuarios_id = '$id' ORDER BY fechayhora DESC LIMIT $offset, $total_records_per_page";
    $messages = $mysqli->query($messagessql);
    $followssql = "SELECT usuarioseguido_id FROM siguiendo WHERE usuarios_id = $id";
    $ids = $mysqli->query($followssql);
    $follows_ids = [];
    foreach ($ids as $key => $value) {
      array_push($follows_ids, $value['usuarioseguido_id']);
    }
      $friendsqueryhelper ='';  
  for ($i = 0; $i < count($follows_ids); $i++) {
        if ($i == count($follows_ids)-1) {
            $friendsqueryhelper .= " id ='".$follows_ids[$i]."'";
        }
        else{
            $friendsqueryhelper .= " id ='".$follows_ids[$i]."' OR";
        }
    }
    $friendsresults = "SELECT * FROM usuarios WHERE" . $friendsqueryhelper;
  $friends = $mysqli->query($friendsresults);
 ?>
	<link rel="stylesheet" type="text/css" href="assets/css/profile_style.css">
  <style type="text/css">
    .wrapper {
      margin-left: 0px;
      padding-left: 0px;
    }

  </style>
	<div class="wrapper" >
 	<div class="profile_left">
 		<img src="mostrarImagen.php?id_imagen=<?php echo $id ?>">

 		<div class="profile_info">
      <p><?php echo $_SESSION['user_logged_first_name'] . " <br/> " .$_SESSION['user_logged_last_name'] ?></p>
      <p><?php echo $_SESSION['user_logged_user_name'] ?></p>
 		</div>

   <a href="settings.php">
     <button type="button" class="btn register btn-primary">Configuracion de cuenta</button>
   </a>
 	</div>
  <br>
    <br>
    <br/> 
    <div class="post_self column">
    <form class="post_form" action="profile_self.php" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="page_from" value="profile_self.php">
      <input type="file" name="file">
      <textarea name="post_text" id="post_text" maxlength="140" placeholder="Tienes algo que compartir?"></textarea>
      <input type="submit" name="post_message" value="Publicar">
    </form>
    </div>
    <br>
		<div class="container_self column">
    <h3> <a href="#friendlist"> Ver tus amigos</a></h3>
      <h2>TUS MENSAJES</h2>
      <?php if ($messages): ?>
         <?php foreach ($messages as $key => $message): ?>
  			<div class="row">
    			<div class="col-sm-12 strip">
              <?php echo $_SESSION['user_logged_user_name'] ?><br>
      				<img class="comment" src="mostrarImagen.php?id_imagen=<?php echo $_SESSION['user_logged_id'] ?>" alt="profile image" />
      				<?php echo $message['texto'] ?><br>
              <?php if ($message['imagen_contenido'] !== ""): ?>
                <img class="comment" src="mostrarImagenMensajes.php?id_imagen=<?php echo $message['id'] ?>" alt="profile image" />
              <?php endif ?>
              <a href="profile_self.php">
                <form action="profile_self.php" method="POST">
                  <input type="hidden" name="page_from" value="profile_self.php">
                  <input type="hidden" name="delete_message_id" value="<?php echo $message['id'] ?>" >
                  <button type="submit" name="delete_message" class="btn register btn-primary">Eliminar mensaje</button>
                </form>
              </a>
              <?php 
                    $message_id = $message['id'];
                    $liked_query = "SELECT * FROM me_gusta WHERE usuarios_id = $id AND mensaje_id =$message_id";
                    $liked_helper = $mysqli->query($liked_query);
                    if (mysqli_num_rows($liked_helper) > 0) {
                      $liked = true;
                    }
                    else{
                      $liked = false;      
                    }
                 ?>
                 <?php if ($liked): ?>
                  <form class="likear" action="feed.php" method="POST">
                    <input type="hidden" name="page_from" value="profile_self.php">
                    <input type="hidden" name="like_message_id" value="<?php echo $message['id'] ?>">
                    <input type="hidden" name="like_user_id" value="<?php echo $_SESSION['user_logged_id'] ?>">
                    <input type="submit" class="comment_like" name="remove_like" value="Ya no me gusta">
                    <div class="like_value">
                    <p><?php
                        
                        $likesquery = "SELECT * from me_gusta WHERE mensaje_id=$message_id";
                        $likes = $mysqli->query($likesquery);
                        $likes = mysqli_num_rows($likes);
                        echo $likes;
                     ?>  Likes</p>
                    </div>
                </form>  
                <?php else: ?>
                <form class="likear" action="feed.php" method="POST">
                    <input type="hidden" name="page_from" value="profile_self.php">
                    <input type="hidden" name="like_message_id" value="<?php echo $message['id'] ?>">
                    <input type="hidden" name="like_user_id" value="<?php echo $_SESSION['user_logged_id'] ?>">
                    <input type="submit" class="comment_like" name="add_like" value="Me gusta">
                    <div class="like_value">
                    <p><?php
                        
                        $likesquery = "SELECT * from me_gusta WHERE mensaje_id=$message_id";
                        $likes = $mysqli->query($likesquery);
                        $likes = mysqli_num_rows($likes);
                        echo $likes;
                     ?>  Likes</p>
                    </div>
                </form>
                <?php endif ?>
    			</div>
  			</div>
        <?php endforeach; ?> 
      <?php endif ?>
        <ul class="pagination">
      <?php if($page_no > 1){
        echo "<li><a href='?page_no=1'>First Page <br></a></li>";
      } ?>
          
      <li <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
      <a <?php if($page_no > 1){
        echo "href='?page_no=$previous_page'";
      } ?>>Previous </a><br>
      </li>
          
      <li <?php if($page_no >= $total_no_of_pages){
        echo "class='disabled'";
      } ?>>
      <a <?php if($page_no < $total_no_of_pages) {
        echo "href='?page_no=$next_page'";
      } ?>>Next </a> <br>
      </li>
       
      <?php if($page_no < $total_no_of_pages){
        echo "<li><a href='?page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
    } ?>
    </ul>
    </div>
    <br>
    <div class="container_self column">
    <h2>LISTADO DE AMIGOS</h2>
        <?php if ($friends): ?>
         <?php foreach ($friends as $key => $friend): ?>
        <div class="row" id="friendlist">
          <div class="col-sm-12 strip">
              <?php echo $friend['nombreusuario'] ?><br>
              <img class="comment" src="mostrarImagen.php?id_imagen=<?php echo $friend['id'] ?>" alt="profile image" />
              <?php echo $friend['nombre'] . " " . $friend['apellido'] ?><br>
              <a href="profile_self.php">
                <form action="profile_self.php" method="POST">
                  <input type="hidden" name="page_from" value="profile_self.php">
                  <input type="hidden" name="friend_id" value="<?php echo $friend['id'] ?>" >
                  <button type="submit" name="remove_friend" class="btn register btn-primary">Eliminar</button>
                </form>
              </a>
          </div>
        </div>
        <?php endforeach; ?> 
      <?php endif ?>
    </div>
    
    </div>
<?php 
    include("includes/footer.php");
 ?>
</body>

</html>