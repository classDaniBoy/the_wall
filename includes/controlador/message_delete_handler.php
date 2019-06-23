<?php
$error_array = array();

if(isset($_POST['delete_message'])){
	$message_id = $_POST['delete_message_id'];
	$delete_related_likes_query = "DELETE FROM `me_gusta` WHERE mensaje_id='$message_id'";
	$mysqli->query($delete_related_likes_query);
	$delete_message_query = "DELETE FROM `mensaje` WHERE id='$message_id'";
	$mysqli->query($delete_message_query);
	header("Location: ". $_POST['page_from']);
	exit();
}

?>