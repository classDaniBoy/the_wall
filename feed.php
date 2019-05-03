<?php 
    include("includes/header.php");
 ?>
  <body>
  	<div class="wrapper">
      <form action="index.php" method="POST">
      	<input type="text" name="post_text" placeholder="Dime lo que piensas">
      	<br>
      	<button type="button" onclick="alert('Publicado, genial!!!')">Publicar</button>
    </div> 
    <?php 
    include("includes/footer.php");
 ?>
		
  </body>
</html>
