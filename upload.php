<?php
if (isset($_POST['post'])) {
	$file =$_FILES['file'];

	$fileName = $_FILES ['file']['name'];
	$fileTmpName = $_FILES ['file']['tmp_name'];
	$fileSize = $_FILES ['file']['size'];
	$fileError = $_FILES ['file']['error'];

	$fileExt = explode('.', $fileName);
	$fileActualExt = strtolower(end($fileExt));

	$allowed = array('jpg', 'jpeg' , 'png','pdf');

	if (in_array($fileActualExt, $allowed)) {
		if ($fileError === 0) {
			$fileNameNew = uniqid('',true). ".".$fileActualExt;
			$fileDestination = 'uploads/local_Files'. $fileNameNew;
			move_uploaded_file($fileTmpName,$fileDestination);
			header("Location: profile_self.php?uploadsuccess");
		}else{
			echo "hubo un error al subir el archivo";
		}
	}else{
		echo "no puedes subir archivos de este tipo";
	}
}


  ?>