<?php 
    include("includes/header.php");
 ?>

 <link rel="stylesheet" type="text/css" href="assets/css/feedstyle.css">

 <style type="text/css">
   body{
    background-image: url("assets/images/backgrounds/desktop.jpg");
   }
  </style>


 <div class="wrapper">
    
  <div class="user_details column">
    <a href="profileself.php"> <img src="img/userimage.jpg"></a>

    <div class="user_details_left_right">
      <a href="profileself.php">
      <p>Cesar Borelli</p>
      <p>Posts:235</p>
      <p>Likes:670</p>
      </a>
    </div>
  </div>

  <div class="main_column column">
    <form class="post_form" action="feed.php" method="POST">
      <textarea name="post_text" id="post_text" maxlength="140" placeholder="Tienes algo que compartir?"></textarea>
      <input type="submit" name="post" id="post_button" value="Publicar">
      <hr>
    </form>

  </div>

  <div class="status_post column">
    <div class="status_post_profile_pic">
      <img src="assets/images/profile_pics/defaults/head_emerald.png" width="50">
    </div>
    <div class="posted_by">
      <a href="profile.php">Lorem ipsum</a>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam tempor nisl in mi sodales, in vestibulum arcu laoreet.</p>
      <form class="likear" action="feed.php" method="POST">
        <input type="submit" class="comment_like" name=like_button value="Me gusta">
        <div class="like_value">
          <p>25 Likes</p>
        </div>
      </form>
    </div>
  </div>

    <div class="status_post column">
    <div class="status_post_profile_pic">
      <img src="assets/images/profile_pics/defaults/head_emerald.png" width="50">
    </div>
    <div class="posted_by">
      <a href="profile.php">Lorem ipsum</a>
      <p>Donec cursus pharetra orci, vel venenatis sapien lobortis et.</p>
    </div>
      <form class="likear" action="feed.php" method="POST">
        <input type="submit" class="comment_like" name=like_button value="Me gusta">
        <div class="like_value">
          <p>47 Likes</p>
        </div>
      </form>
  </div>

    <div class="status_post column">
    <div class="status_post_profile_pic">
      <img src="assets/images/profile_pics/defaults/head_emerald.png" width="50">
    </div>
    <div class="posted_by">
      <a href="profile.php">Lorem ipsum</a>
      <p>Phasellus lobortis pellentesque urna vel tincidunt. Curabitur dictum lorem vel cursus eleifend.</p>
    </div>
     <form class="likear" action="feed.php" method="POST">
        <input type="submit" class="comment_like" name=like_button value="Me gusta">
        <div class="like_value">
          <p>1 Likes</p>
        </div>
      </form>
  </div>

    <div class="status_post column">
    <div class="status_post_profile_pic">
      <img src="assets/images/profile_pics/defaults/head_emerald.png" width="50">
    </div>
    <div class="posted_by">
      <a href="profile.php">Lorem ipsum</a>
      <p>Ut quis ipsum eu ligula rhoncus porta in ac felis.</p>
    </div>
     <form class="likear" action="feed.php" method="POST">
        <input type="submit" class="comment_like" name=like_button value="Me gusta">
        <div class="like_value">
          <p>225 Likes</p>
        </div>
      </form>
    </div>

    <div class="status_post column">
    <div class="status_post_profile_pic">
      <img src="assets/images/profile_pics/defaults/head_emerald.png" width="50">
    </div>
    <div class="posted_by">
      <a href="profile.php">Lorem ipsum</a>
      <p>Vestibulum efficitur erat sit amet tellus ultricies, eu imperdiet nisl fringilla. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
    </div>
       <form class="likear" action="feed.php" method="POST">
        <input type="submit" class="comment_like" name=like_button value="Me gusta">
        <div class="like_value">
          <p>3 Likes</p>
        </div>
      </form>
  </div>

    <div class="status_post column">
    <div class="status_post_profile_pic">
      <img src="assets/images/profile_pics/defaults/head_emerald.png" width="50">
    </div>
    <div class="posted_by">
      <a href="profile.php">Lorem ipsum</a>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam tempor nisl in mi sodales, in vestibulum arcu laoreet.</p>
    </div>
      <form class="likear" action="feed.php" method="POST">
        <input type="submit" class="comment_like" name=like_button value="Me gusta">
        <div class="like_value">
          <p>0 Likes</p>
        </div>
      </form>
  </div>

    <div class="status_post column">
    <div class="status_post_profile_pic">
      <img src="assets/images/profile_pics/defaults/head_emerald.png" width="50">
    </div>
    <div class="posted_by">
      <a href="profile.php">Lorem ipsum</a>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam tempor nisl in mi sodales, in vestibulum arcu laoreet.</p>
    </div>
    <form class="likear" action="feed.php" method="POST">
        <input type="submit" class="comment_like" name=like_button value="Me gusta">
        <div class="like_value">
          <p>4 Likes</p>
        </div>
      </form>
  </div>

    <div class="status_post column">
    <div class="status_post_profile_pic">
      <img src="assets/images/profile_pics/defaults/head_emerald.png" width="50">
    </div>
    <div class="posted_by">
      <a href="profile.php">Lorem ipsum</a>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam tempor nisl in mi sodales, in vestibulum arcu laoreet.</p>
    </div>
    <form class="likear" action="feed.php" method="POST">
        <input type="submit" class="comment_like" name=like_button value="Me gusta">
        <div class="like_value">
          <p>12 Likes</p>
        </div>
      </form>
  </div>

    <div class="status_post column">
    <div class="status_post_profile_pic">
      <img src="assets/images/profile_pics/defaults/head_emerald.png" width="50">
    </div>
    <div class="posted_by">
      <a href="profile.php">Lorem ipsum</a>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam tempor nisl in mi sodales, in vestibulum arcu laoreet.</p>
    </div>
    <form class="likear" action="feed.php" method="POST">
        <input type="submit" class="comment_like" name=like_button value="Me gusta">
        <div class="like_value">
          <p>5 Likes</p>
        </div>
      </form>
  </div>

    <div class="status_post column">
    <div class="status_post_profile_pic">
      <img src="assets/images/profile_pics/defaults/head_emerald.png" width="50">
    </div>
    <div class="posted_by">
      <a href="profile.php">Lorem ipsum</a>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam tempor nisl in mi sodales, in vestibulum arcu laoreet.</p>
    </div>
   <form class="likear" action="feed.php" method="POST">
        <input type="submit" class="comment_like" name=like_button value="Me gusta">
        <div class="like_value">
          <p>2 Likes</p>
        </div>
      </form>
  </div>

  </div>

</body>

</html>

