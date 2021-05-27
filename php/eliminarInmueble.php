<?php
  $IdInmueble = $_GET['IdInmueble'];
  include('dbconnection.php');
  $sql = "DELETE FROM InmuebleFoto WHERE IdInmueble='".$IdInmueble."';";
  if(mysqli_query($conn, $sql)){
    $sql = "DELETE FROM Visitas WHERE Inmueble='".$IdInmueble."';";
    if(mysqli_query($conn, $sql)){
      $sql = "DELETE FROM Inmueble WHERE IdInmueble='".$IdInmueble."';";
      if(mysqli_query($conn, $sql)){
        echo "Información eliminada correctamente";
      }
      else{
        echo "Error al eliminar la información";
      }
    }
    else{
      echo "Error al eliminar la información";
    }
  }
  else{
    echo "Error al eliminar la información";
  }
  mysqli_close($conn);
 ?>
