<?php 
    include("includes/header.php");
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
  $messagessql = "SELECT mensaje.texto, usuarios.nombreusuario  FROM mensaje INNER JOIN usuarios ON mensaje.usuarios_id=usuarios.id WHERE" . $messagequeryhelper . " ORDER BY mensaje.fechayhora DESC";
  $messages = $mysqli->query($messagessql);

  /*
    SELECT Orders.OrderID, Customers.CustomerName, Orders.OrderDate
    FROM Orders
    INNER JOIN Customers ON Orders.CustomerID=Customers.CustomerID;
  */
 ?>

 <link rel="stylesheet" type="text/css" href="assets/css/feedstyle.css">

 <style type="text/css">
   body{
    background-image: url("assets/images/backgrounds/desktop.jpg");
   }
  </style>


 <div class="wrapper">
    
  <div class="user_details column">
    <a href="profile_self.php"> <img src="img/userimage.jpg"></a>

    <div class="user_details_left_right">
      <a href="profile_self.php">
      <p><?php echo $user['nombre'] . " " . $user['apellido'] ?> </p>

      </a>
    </div>
  </div>

  <div class="main_column column">
    <form class="post_form" action="upload.php" method="POST" enctype="multipart/form-data">
      <input type="file" name="file">
      <textarea name="post_text" id="post_text" maxlength="140" placeholder="Tienes algo que compartir?"></textarea>
      <input type="submit" name="post" value="Publicar">
      <hr>
    </form>

  </div>

    <?php foreach ($messages as $key => $message): ?>
        <div class="status_post column">
            <div class="status_post_profile_pic">
                <img src="assets/images/profile_pics/defaults/head_emerald.png" width="50">
            </div>
            <div class="posted_by">
                <a href="profile.php"> <?php echo $message['nombreusuario'] ?> </a>
                <p> <?php echo $message['texto'] ?></p>
                <form class="likear" action="feed.php" method="POST">
                    <input type="submit" class="comment_like" name=like_button value="Me gusta">
                    <div class="like_value">
                    <p>25 Likes</p>
                    </div>
                </form>
            </div>
        </div>
    <?php endforeach; ?> 
  </div>

</body>

</html>

