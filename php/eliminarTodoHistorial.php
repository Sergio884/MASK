<?php
  session_start();
  if(isset($_SESSION['usuario'])){
    $usuario = $_SESSION['usuario'];
    include('dbconnection.php');
    $sql = "SELECT * FROM Usuario WHERE Usuario='".$usuario."' OR Correo='".$usuario."';";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
      $row = mysqli_fetch_assoc($result);
      $idUsuario = $row['IdUsuario'];
      $sql = "DELETE FROM Historial WHERE IdUsuario = '".$idUsuario."';";
      if(mysqli_query($conn, $sql)){
        echo "Historial eliminado correctamente";
      }
      else{
        echo "Error al eliminar el historial";
      }
    }
    mysqli_close($conn);
  }
 ?>
