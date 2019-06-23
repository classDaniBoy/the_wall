<?php
$error_array = array();

if(isset($_POST['add_like'])){
	$user_id = $_POST['like_user_id'];
	$message_id = $_POST['like_message_id'];
	$add_likequery = "INSERT INTO `me_gusta`(`usuarios_id`, `mensaje_id`) VALUES ('$user_id', '$message_id')";
	$mysqli->query($add_likequery);
	header("Location: feed.php");
	exit();
}

if(isset($_POST['remove_like'])){
	$user_id = $_POST['like_user_id'];
	$message_id = $_POST['like_message_id'];
	$remove_friendquery = "DELETE FROM `me_gusta` WHERE `usuarios_id`='$user_id' AND `mensaje_id` = '$message_id'";
	$mysqli->query($remove_friendquery);
	header("Location: feed.php");
	exit();
}
?>