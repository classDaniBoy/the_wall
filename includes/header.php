<html>
<head>
	<title>Bienvenidos a The Wall</title>
	<!-- JAVASCRIPT -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="assets/js/bootstrap.js"></script>
	
	<!-- CSS -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="assets/css/footer_style.css">
</head>
<body>
	<?php 
		include 'BD.php';
		$sql = "SELECT * FROM usuarios";
		$result = $mysqli->query($sql);

		if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) {
		        echo "id: " . $row["id"]. " - Name: " . $row["nombre"]. " " . $row["apellido"]. "<br>";
		    }
		} else {
		    echo "0 results";
	}
	 ?>
	<div class="top_bar" >
		<div class="logo">
			<a href="index.php"> The Wall</a>

		</div>
		<form action="profile.php" class="form-inline col-md-6 mb-4" >
            <input class="form-control form-control-sm mr-3 w-75" type="text" placeholder="Search" aria-label="Search">
            <i class="fas fa-search" aria-hidden="true"></i>
          </form>
		<nav>
			<a href="">
				User name
			</a>

			<a href="index.php">
				<i class="fas fa-home fa-lg"></i>
			</a>
			<a href="settings.php">
				<i class="fas fa-user-cog fa-lg"></i>
			</a>
			<a href="index.php">
				<i class="fas fa-sign-out-alt fa-lg"></i>
			</a>
		</nav>
	</div>


