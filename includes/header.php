<html>
<head>
	<title>Bienvenidos a The Wall</title>
	<!-- JAVASCRIPT -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="assets/js/bootstrap.js"></script>
	<script src="assets/js/header.js"></script>
	
	<!-- CSS -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="assets/css/footer_style.css">
</head>
<body>
	<?php
		include 'BD.php';
		if ($_SESSION['user_logged_id']== "") {
			header("Location: index.php");
		}
		if (isset($_GET['page_no']) && $_GET['page_no']!="") {
    		$page_no = $_GET['page_no'];
    	} else {
        	$page_no = 1;
        }
        $total_records_per_page = 10;
        $offset = ($page_no-1) * $total_records_per_page;
		$previous_page = $page_no - 1;
		$next_page = $page_no + 1;
		$adjacents = "2";
	 ?>
	<div class="top_bar" >
		<div class="logo">
			<a href="feed.php"> The Wall</a>

		</div>
		<div class="search">
			<form action="search.php" method="GET" name="search_form" >
            	<input  type="text" onkeyup="getLiveSearchUsers(this.value,$_SESSION['id'])" name="q" placeholder="Search" autocomplete="off" id="search_text_input">
            	<div class="button_holder">
            		<img src="assets/images/glass.png">
            	</div>
          	</form>

         <div class="search_results">
         	
         </div> 
         <div class="search_results_footer_empty">
         	
         </div>
     	</div>
     	<nav>
			<a href="profile_self.php">
				<?php echo $_SESSION['user_logged_user_name'];  ?>
			</a>

			<a href="feed.php">
				<i class="fas fa-home fa-lg"></i>
			</a>
			<a href="settings.php">
				<i class="fas fa-user-cog fa-lg"></i>
			</a>
			<a href="includes/controlador/logout.php">
				<i class="fas fa-sign-out-alt fa-lg"></i>
			</a>
		</nav>
	</div>


