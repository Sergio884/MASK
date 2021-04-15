<?php
$usuario = $_GET['usuario'];
$mensaje = $_POST['mensaje'];

include('dbconnection.php');
$query = "INSERT INTO chatsergio884_clairo(emisor,mensaje,tiempo) VALUES('$usuario','$mensaje',current_timestamp())";
$run = mysqli_query($connection,$query);
mysqli_close($connection);

header('Location: chat.php?usuario='.$usuario);


?>