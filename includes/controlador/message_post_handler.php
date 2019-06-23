<?php
$error_array = array();

if(isset($_POST['post_message'])){

	$user_id = $_SESSION['user_logged_id'];
	$text = $_POST['post_text'];
	$date = date("Y-m-d h:i:sa");
	$post_message_query = "INSERT INTO `mensaje`(`texto`, `usuarios_id`, `fechayhora`) VALUES ('$text','$user_id','$date')";
	if (isset($_FILES['file'])) {
		$imgData = addslashes(file_get_contents($_FILES["file"]["tmp_name"]));
		$fileName = $_FILES ['file']['name'];
		$fileExt = explode('.', $fileName);
		$fileActualExt = strtolower(end($fileExt));
		$allowed = array('jpg', 'jpeg' , 'png');
		if (!in_array($fileActualExt, $allowed)) {
			array_push($error_array, "Please upload a valid image format<br>");
		}
		$post_message_query = "INSERT INTO `mensaje`(`texto`, `usuarios_id`, `fechayhora`,`imagen_contenido`,`imagen_tipo`) VALUES ('$text','$user_id','$date','$imgData','$fileActualExt')";
	}
	$mysqli->query($post_message_query);
	header("Location: ". $_POST['page_from']);
	exit();
}

?>