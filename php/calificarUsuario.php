<?php
  session_start();
  if(!isset($_SESSION['usuario'])){
    header("location: ../html/Login.html");
  }
  $idReceptor = $_GET['receptor'];
  $miCalificacion = $_GET['calificacion'];
  include('dbconnection.php');

  $sql = "SELECT * FROM Usuario WHERE IdUsuario=".$idReceptor.";";
  $result = mysqli_query($conn, $sql);
  if(mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_assoc($result);
    $Calificacion = $row['Calificacion'];
    $cantidadCalificacion = $row['cantidadCalificacion'];

    $Calificacion = (($Calificacion * $cantidadCalificacion) + $miCalificacion) / ($cantidadCalificacion + 1);
    $cantidadCalificacion = $cantidadCalificacion + 1;

    $sql = "UPDATE Usuario SET Calificacion=".$Calificacion.", cantidadCalificacion=".$cantidadCalificacion." WHERE IdUsuario=".$idReceptor.";";
    if(mysqli_query($conn, $sql)){
      echo "La calificación se a guardado correctamente";
    }
    else{
      echo "Error al calificar";
    }
  }
  else{
    echo "error al conectar con su cuenta";
  }
 ?>
