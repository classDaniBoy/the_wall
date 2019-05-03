<?php 
    include("includes/header.php");
 ?>
  <body>
  	<div class="wrapper">
      <form action="feed.php" method="POST">
      	<input id="a_text" type="text" name="post_text" size="60" maxlength="140" align="top" placeholder="Dime lo que piensas">
      	<br>
      	<button type="button" onclick="alert('Publicado, genial!!!')">Publicar</button>
    </div> 
    <?php 
    include("includes/footer.php");
 ?>
		
  </body>
</html>
