<?php 
	include("includes/header.php");
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
      <p>Cesar Borelli</p>
      <p>Usuario:Bore1991</p>
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
  			<div class="row">
    			<div class="col-sm-12 strip">
      				<img class="comment" src="img/userimage.jpg" alt="profile image" />
      				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam tempor nisl in mi sodales, in vestibulum arcu laoreet.<br>
              <a href="profile_self.php">
                <button type="button" class="btn register btn-primary">Eliminar</button>
              </a>
    			</div>
  			</div>
  			<div class="row">
    			<div class="col-sm-12 strip">
      				<img class="comment" src="img/userimage.jpg" alt="profile image" />
		     		Donec cursus pharetra orci, vel venenatis sapien lobortis et.<br>
              <a href="profile_self.php">
                <button type="button" class="btn register btn-primary">Eliminar</button>
              </a>
    			</div>
  			</div>
  			<div class="row">
				<div class="col-sm-12 strip">
					<img class="comment" src="img/userimage.jpg" alt="profile image" />
					Phasellus lobortis pellentesque urna vel tincidunt. Curabitur dictum lorem vel cursus eleifend.<br>
            <a href="profile_self.php">
             <button type="button" class="btn register btn-primary">Eliminar</button>
            </a>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 strip">
					<img class="comment" src="img/userimage.jpg" alt="profile image" />
					Ut quis ipsum eu ligula rhoncus porta in ac felis.<br>
           <a href="profile_self.php">
             <button type="button" class="btn register btn-primary">Eliminar</button>
          </a>
				</div>
			</div>
            <div class="row">
                <div class="col-sm-12 strip">
                    <img class="comment" src="img/userimage.jpg" alt="profile image" />
                    Vestibulum efficitur erat sit amet tellus ultricies, eu imperdiet nisl fringilla. Interdum et malesuada fames ac ante ipsum primis in faucibus.<br>
                    <a href="profile_self.php">
                      <button type="button" class="btn register btn-primary">Eliminar</button>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 strip">
                    <img class="comment" src="img/userimage.jpg" alt="profile image" />
                    Vestibulum efficitur erat sit amet tellus ultricies, eu imperdiet nisl fringilla. Interdum et malesuada fames ac ante ipsum primis in faucibus.<br>
                    <a href="profile_self.php">
                      <button type="button" class="btn register btn-primary">Eliminar</button>
                    </a>
                </div>
            </div>
        </div>
<?php 
    include("includes/footer.php");
 ?>
</body>

</html>