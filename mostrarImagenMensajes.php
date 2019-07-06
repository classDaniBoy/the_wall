<?php 
  include("BD.php");
  $id = $_GET['id_imagen'];
  $sql = "SELECT imagen_contenido, imagen_tipo 
    FROM mensaje 
    WHERE id=$id";
  $result = mysqli_query($mysqli, $sql); 
  $row = mysqli_fetch_array($result); 
  mysqli_close($mysqli); 
  if (!$row['imagen_tipo']||!$row['imagen_contenido']) {
    return false;
  }
  header("Content-type: " . $row['imagen_tipo']); 
  echo $row['imagen_contenido']; 

 ?>