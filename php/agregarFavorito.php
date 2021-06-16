<?php
  session_start();
  if(!isset($_SESSION['usuario'])){
    header("location: ../html/Login.html");
  }
  $usuario = $_SESSION['usuario'];
  $idInmueble = $_GET['idInmueble'];

  include('../db/dbconnection.php');

  $sql = "SELECT * FROM Usuario WHERE Usuario='".$usuario."' OR Correo='".$usuario."';";
  $result = mysqli_query($conn, $sql);
  if(mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_assoc($result);
    $idUsuario = $row['IdUsuario'];
    $sql = "INSERT INTO Favoritos(IdFavoritos, IdInmueble, IdUsuario) VALUES (NULL,'".$idInmueble."','".$idUsuario."');";
    if(mysqli_query($conn, $sql)){
      echo "El inmueble a sido agregado a favoritos";
    }
    else{
      echo "Error al agregar a favoritos";
    }
  }
  else{
    echo "error al conectar con su cuenta";
  }
 ?>
