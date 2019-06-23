<?php
	include ("includes/header.php");

	if (isset($_GET['q'])) {
		$query=$_GET['q'];

	}else{
		$query="";
	}

	if (isset($_GET['type'])) {
		$type=$_GET['type'];
	}else{
		$type="name";
	}

?>

<div class="main_column column" id="main_column" style="padding: 44px">
	<?php
		if ($query=="") {
			echo "Sin resultados";
		}else{
			

			if($type=="nombreusuario"){
				$usersReturnedQuery = mysqli_query($mysqli,"SELECT * FROM usuarios WHERE nombreusuario LIKE '$query%' LIMIT 8");
			}else{
				$names = explode(" ", $query);

				if (count($names)==3) {


					$usersReturnedQuery = mysqli_query($mysqli,"SELECT * FROM usuarios WHERE (nombre LIKE '$names[0]%' AND apellido LIKE '$names[2]%')");
			}else{
				if (count($names)== 2) {
					$usersReturnedQuery = mysqli_query($mysqli,"SELECT * FROM usuarios WHERE (nombre LIKE '$names[0]%' AND apellido LIKE '$names[1]%')");
				}else
					$usersReturnedQuery = mysqli_query($mysqli,"SELECT * FROM usuarios WHERE (nombre LIKE '$names[0]%' OR apellido LIKE '$names[0]%')");
			}
		}

		if (mysqli_num_rows($usersReturnedQuery)==0) {
			echo "no pudimos encontrar a". $type . "como :" .$query;
		}else{

			echo mysqli_num_rows($usersReturnedQuery) . "   resultados:<br> <br>";
		}



		while ($row=mysqli_fetch_array($usersReturnedQuery)) {
			
			echo "<div class=search_result>
					<img src=mostrarImagen.php?id_imagen=7>
					<div class=profile_pic>
						<a href='". $row['nombreusuario'] ."'></a>
					</div>
					
						<a href='profile.php?friend_id=". $row['id']. "'>". $row['nombre'] ."". $row['apellido']. "
							<p id='grey'>". $row['nombreusuario'] ."</p>
						</a>
						<br>

					</div>
					<hr id = search_hr>";		
			

		}
		}


	?>

</div>