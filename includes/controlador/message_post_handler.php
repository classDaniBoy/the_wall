<?php
$error_array = array();

if(isset($_POST['post_message'])){
	$user_id = $_SESSION['user_logged_id'];
	$text = $_POST['post_text'];
	$date = date("Y-m-d h:i:sa");
	$post_message_query = "INSERT INTO `mensaje`(`texto`, `usuarios_id`, `fechayhora`) VALUES ('$text','$user_id','$date')";
	$mysqli->query($post_message_query);
	header("Location: ". $_POST['page_from']);
	exit();
}

?>