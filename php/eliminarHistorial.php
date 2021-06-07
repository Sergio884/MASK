<?php
  $IdUsuario = $_GET['IdUsuario'];
  $IdInmueble = $_GET['IdInmueble'];
  include('dbconnection.php');
  $sql = "DELETE FROM Historial WHERE IdUsuario = '".$IdUsuario."' AND IdInmueble = '".$IdInmueble."'";
  if(mysqli_query($conn, $sql)){
    echo "Información eliminada correctamente";
  }
  else{
    echo "Error al eliminar la información";
  }
  mysqli_close($conn);
 ?>
