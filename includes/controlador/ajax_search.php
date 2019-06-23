<?php
	include ("../../BD.php");
	include("../../profile.php")

	$query = $_POST['query'];
	$userLoggedIn = $_SESSION['user_logged_user_name'];

	$names = explode(" ", $query);

	if(strpos($query, '_') !== false){
		$usersReturnedQuery = mysqli_query($mysqli,"SELECT * FROM usuarios WHERE nombreusuario LIKE '$query%' LIMIT 8");
	}elseif (count($names)==2) {
		$usersReturnedQuery = mysqli_query($mysqli,"SELECT * FROM usuarios WHERE (nombre LIKE '$names[0]%' AND apellido LIKE '$names[1]%') LIMIT 8");
	}else{
		$usersReturnedQuery = mysqli_query($mysqli,"SELECT * FROM usuarios WHERE (nombre LIKE '$names[0]%' OR apellido LIKE '$names[0]%') LIMIT 8");
	}

	if ($query != "") {
		
		while ($row=mysqli_fetch_array($usersReturnedQuery)) {
			$user = new User($mysqli,$userLoggedIn);

			if ($row['nombreusuario'] != $userLoggedIn) {
				$mutualFriends = $user->getMutualFriends($row['nombreusuario']). "amigos en comun";
			}else{
				$mutualFriends == "";
			}

			echo "<div class='resultDisplay'>
					<a href='".$row['nombreusuario'] . "' style='color: #148580'>
						<div class='LiveSearchProfilePic'>
							<img src='". $row ['foto_contenido'] ."'>
						</div>
						
						<div class='LiveSearchText'	>
							". $row['nombre']."". $row['apellido'] ."
							<p> ". $row['nombreusuario']."</p>
							<p id='grey'>". $mutualFriends ." </p>
						</div>
					</a>
					</div>";		
		}
	}
?>