<?php
  $Interesado = $_GET['Interesado'];
  $Vendedor = $_GET['Vendedor'];
  $Fecha = $_GET['Fecha'];
  include('dbconnection.php');
  $sql = "DELETE FROM Visitas WHERE Interesado='".$Interesado."' AND Vendedor='".$Vendedor."' AND Fecha='".$Fecha."';";
  if(mysqli_query($connection, $sql)){
    echo "Información eliminada correctamente";
  }
  else{
    echo "Error al eliminar la información";
  }
  mysqli_close($connection);
 ?>
