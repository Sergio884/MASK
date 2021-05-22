<?php
  session_start();
  if(!isset($_SESSION['usuario'])){
    header("location: ../html/Login.html");
  }
  $usuario = $_SESSION['usuario'];
  $idReceptor = $_GET['receptor'];
  $idInmueble = $_GET['idInmueble'];
  $Fecha = $_GET['fecha'];
  $Hora = $_GET['hora'];
  include('dbconnection.php');

  $sql = "SELECT * FROM Usuario WHERE Usuario='".$usuario."' OR Correo='".$usuario."';";
  $result = mysqli_query($conn, $sql);
  if(mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_assoc($result);
    $idUsuario = $row['IdUsuario'];
    $sql = "INSERT INTO Visitas(Interesado, Vendedor, Fecha, Hora, Inmueble) VALUES ('".$idUsuario."','".$idReceptor."','".$Fecha."','".$Hora."','".$idInmueble."');";
    if(mysqli_query($conn, $sql)){
      echo "La visita se ha creado exitosamente";
    }
    else{
      echo "Error al crear la visita";
    }
  }
  else{
    echo "error al conectar con su cuenta";
  }
 ?>
