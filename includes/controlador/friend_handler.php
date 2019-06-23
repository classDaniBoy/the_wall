<?php
$error_array = array();

if(isset($_POST['add_friend'])){
	$user_id = $_SESSION['user_logged_id'];
	$friend_id = $_POST['friend_id'];
	$add_friendquery = "INSERT INTO `siguiendo`(`usuarios_id`, `usuarioseguido_id`) VALUES ('$user_id', '$friend_id')";
	$mysqli->query($add_friendquery);
	header("Location: profile.php");
	exit();
}

if(isset($_POST['remove_friend'])){
	$user_id = $_SESSION['user_logged_id'];
	$friend_id = $_POST['friend_id'];
	$remove_friendquery = "DELETE FROM `siguiendo` WHERE `usuarios_id`='$user_id' AND `usuarioseguido_id` = '$friend_id'";
	$mysqli->query($remove_friendquery);
	header("Location: ". $_POST['page_from']);
	exit();
}
?>