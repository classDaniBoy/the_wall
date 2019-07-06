<?php 
    include("includes/header.php");
    include("includes/controlador/message_post_handler.php");
    include("includes/controlador/likes_handler.php");

  $id = $_SESSION['user_logged_id'];
  $usersql = "SELECT * FROM usuarios WHERE id = $id";
  $user = $mysqli->query($usersql)->fetch_assoc();
  $followssql = "SELECT usuarioseguido_id FROM siguiendo WHERE usuarios_id = $id";
  $ids = $mysqli->query($followssql);
  $follows_ids = [];
  foreach ($ids as $key => $value) {
    array_push($follows_ids, $value['usuarioseguido_id']);
  }
    $messagequeryhelper ='';  
  for ($i = 0; $i < count($follows_ids); $i++) {
        if ($i == count($follows_ids)-1) {
            $messagequeryhelper .= " usuarios_id ='".$follows_ids[$i]."'";
        }
        else{
            $messagequeryhelper .= " usuarios_id ='".$follows_ids[$i]."' OR";
        }
    }
  $result_count = mysqli_query($mysqli,"SELECT COUNT(*) As total_records FROM mensaje WHERE ". $messagequeryhelper);
  $total_records = mysqli_fetch_array($result_count);
  $total_records = $total_records['total_records'];
  $total_no_of_pages = ceil($total_records / $total_records_per_page);
  $second_last = $total_no_of_pages - 1; // total pages minus 1
  $messagessql = "SELECT mensaje.texto,mensaje.imagen_contenido,mensaje.imagen_tipo,mensaje.usuarios_id,mensaje.id, usuarios.nombreusuario  FROM mensaje INNER JOIN usuarios ON mensaje.usuarios_id=usuarios.id WHERE" . $messagequeryhelper . "  ORDER BY mensaje.fechayhora DESC LIMIT $offset, $total_records_per_page";
  $messages = $mysqli->query($messagessql);


 ?>

 <link rel="stylesheet" type="text/css" href="assets/css/feedstyle.css">

 <style type="text/css">
   body{
    background-image: url("assets/images/backgrounds/desktop.jpg");
   }
  </style>


 <div class="wrapper">
  <div class="user_details column">
    <a href="profile_self.php"> <img src="mostrarImagen.php?id_imagen=<?php echo $id ?>"></a>

    <div class="user_details_left_right">
      <a href="profile_self.php">
      <p><?php echo $user['nombre'] . "<br/> " . $user['apellido'] ?> </p>

      </a>
    </div>
  </div>

  <div class="main_column column">
    <form class="post_form" action="feed.php" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="page_from" value="feed.php">
      <input type="file" name="file">
      <textarea name="post_text" id="post_text" maxlength="140" placeholder="Tienes algo que compartir?"></textarea>
      <input type="submit" name="post_message" value="Publicar">
      <hr>
    </form>

  </div>

        <div class="status_post column">
            
  <?php if ($messages): ?>
    <?php foreach ($messages as $key => $message): ?>
            <div class="status_post_profile_pic">
                <img src="mostrarImagen.php?id_imagen=<?php echo $message['usuarios_id'] ?>" width="50">
            </div>
            <div class="posted_by">
                <a href="profile.php"> <?php echo $message['nombreusuario'] ?> </a>
                <br>
                <?php if ($message['imagen_contenido'] !== ""): ?>
                <img class="comment" src="mostrarImagenMensajes.php?id_imagen=<?php echo $message['id'] ?>" alt="profile image" width="200px"/>
                <?php endif ?>
                <p> <?php echo $message['texto'] ?></p>
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
                    <input type="hidden" name="page_from" value="feed.php">
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
                    <input type="hidden" name="page_from" value="feed.php">
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
            <br>
    <?php endforeach; ?>
  <?php endif ?>
    <br>
    <br>
    <br>
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

  </div>
</body>

</html>

