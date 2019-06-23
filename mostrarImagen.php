<?php 
  include("BD.php");
  $id = $_GET['id_imagen'];
  $sql = "SELECT foto_contenido, foto_tipo 
    FROM usuarios 
    WHERE id=$id";
  $result = mysqli_query($mysqli, $sql); 
  $row = mysqli_fetch_array($result); 
  mysqli_close($mysqli); 
  header("Content-type: " . $row['foto_tipo']); 
  echo $row['foto_contenido']; 

 ?>