<?php
  $Interesado = $_GET['Interesado'];
  $Vendedor = $_GET['Vendedor'];
  $Fecha = $_GET['Fecha'];
  $FechaN = $_GET['FechaN'];
  $HoraN = $_GET['HoraN'];
  include('dbconnection.php');

  $sql = "UPDATE Visitas SET Fecha='".$FechaN."', Hora='".$HoraN."' WHERE Interesado='".$Interesado."' AND Vendedor='".$Vendedor."' AND Fecha='".$Fecha."';";
  if(mysqli_query($connection, $sql)){
    echo "Información guardada correctamente";
  }
  else{
    echo "Error al guardar la información";
  }
  mysqli_close($connection);
 ?>
