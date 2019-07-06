<?php
	include ("includes/header.php");
	include ("includes/controlador/friend_handler.php");
	$user_id = $_SESSION['user_logged_id'];
	if (isset($_GET['q'])) {
		$query=$_GET['q'];

	}else{
		$query="";
	}


?>

<div class="main_column column" id="main_column" style="padding: 44px">
	<?php
		if ($query=="") {
			echo "Sin resultados";
		}else{
			
			$usersReturnedQuery = mysqli_query($mysqli,"SELECT * FROM usuarios WHERE nombreusuario LIKE '$query%'AND id <> '$user_id'");
			if(mysqli_num_rows($usersReturnedQuery)==0){
				
			
				$names = explode(" ", $query);

				if (count($names)==3) {


					$usersReturnedQuery = mysqli_query($mysqli,"SELECT * FROM usuarios WHERE (nombre LIKE '$names[0]%' OR apellido LIKE '$names[2]%')AND id <> '$user_id'");
				}else{
					if (count($names)== 2) {
						$usersReturnedQuery = mysqli_query($mysqli,"SELECT * FROM usuarios WHERE (nombre LIKE '$names[0]%' OR apellido LIKE '$names[1]%')AND id <> '$user_id'");
					}else
						$usersReturnedQuery = mysqli_query($mysqli,"SELECT * FROM usuarios WHERE (nombre LIKE '$names[0]%' OR apellido LIKE '$names[0]%')AND id <> '$user_id'");
			}
		}
		}

		if (mysqli_num_rows($usersReturnedQuery)==0) {
			echo "no pudimos encontrar a " .$query;
		}else{

			echo mysqli_num_rows($usersReturnedQuery) . "   resultados:<br> <br>";
		}



		
	?>
	<?php foreach ($usersReturnedQuery as $key => $friend): ?>
		<div class=search_result>
		<div class=profile_pic style='float: left ;margin-right: 10px;'>
			<img src="mostrarImagen.php?id_imagen=<?php echo $friend['id'] ?>" style="width: 145px;">
			<a href="<?php echo $friend['nombreusuario'] ?>"></a>
		</div>
		
			<a href="profile.php?friend_id= <?php echo $friend['id'] ?>"> <?php echo $friend['nombre'] ." ". $friend['apellido'] ?>
				<p id='grey'> <?php echo $friend['nombreusuario'] ?></p>
			</a>
			<br>
			<?php
			 	$friend_id = $friend['id'];
				$added_query = "SELECT * FROM siguiendo WHERE usuarios_id = $user_id AND usuarioseguido_id =$friend_id";
			    $added_helper = $mysqli->query($added_query);
			    if (mysqli_num_rows($added_helper) > 0) {
			      $added = true;
			    }
			    else{
			      $added = false;      
			    }
			 ?>
			 <?php if ($added): ?>
		      <form  name="friendRemovalForm" action="search.php" method="POST">
		        <input type="hidden" name="page_from" value="search.php?q=<?php echo $_GET['q'] ?>">
		        <input type="hidden" value="<?php echo $friend_id ?>" id="friend_id" name="friend_id">
		        <button type="submit" name="remove_friend" class="btn danger btn-primary">Dejar de seguir</button>
		      </form>
		    <?php else: ?>
		      <form  name="friendForm" action="search.php" method="POST">
		        <input type="hidden" name="page_from" value="search.php?q=<?php echo $_GET['q'] ?>">
		        <input type="hidden" value="<?php echo $friend_id ?>" id="friend_id" name="friend_id">
		        <button type="submit" name="add_friend" class="btn register btn-primary">Añadir a mis amigos</button>
		      </form>
		    <?php endif ?>
		</div>
	<hr id = search_hr>
	<?php endforeach ?>
</div>