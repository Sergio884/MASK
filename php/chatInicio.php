<?php
session_start();
if(!isset($_SESSION['usuario'])){
  header("location: ../html/login.html");
}
$usuario = $_SESSION['usuario'];

include('../db/dbconnectionChat.php');
    $query = "CREATE TABLE IF NOT EXISTS chats".$usuario."(idChat INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    chat VARCHAR(106),
    ultimoMensaje VARCHAR(999),
    tiempo TIMESTAMP,
    usuario VARCHAR(50),
    idInmueble INT)";
    $run = mysqli_query($connection,$query);
    mysqli_close($connection);

include('../db/dbconnectionChat.php');
$query = "SELECT * FROM chats".$usuario."";
$run = mysqli_query($connection,$query);
$existe = mysqli_num_rows($run);
mysqli_close($connection);
if ($existe>0) {
    include('../db/dbconnectionChat.php');
    $ordenar = "SELECT * FROM chats".$usuario."
                ORDER BY tiempo ASC";
    $run = mysqli_query($connection,$ordenar);
    while($resultado = mysqli_fetch_assoc($run)){
    header('Location: chat.php?receptor='.$resultado['usuario'].'&idInmueble='.$resultado['idInmueble'].'');
    }
  }else{
    header("location: ../html/chatVacio.html");
  }
  mysqli_close($connection);
?>