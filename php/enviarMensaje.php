<?php
$usuario = $_GET['usuario'];
$mensaje = $_POST['mensaje'];
if(strlen($mensaje)>14){
    $mensajeAjuste = $mensaje;
    $mensajeAjuste = "";
    $contador = 0;
    for($i=0;$i<strlen($mensaje);$i++){
        if($mensaje[$i]!=" "){
            $contador++;
        }else{
            $contador = 0;
        }
        if($contador==10){
            $mensajeAjuste = $mensajeAjuste."\n";
            $contador = 0;
        }
        $mensajeAjuste = $mensajeAjuste.$mensaje[$i];
    }
    $mensaje = $mensajeAjuste;
}

include('dbconnection.php');
$query = "INSERT INTO chat".$usuario."_clairo(emisor,mensaje,tiempo) VALUES('$usuario','$mensaje',current_timestamp())";
$run = mysqli_query($connection,$query);
mysqli_close($connection);

include('dbconnection.php');
$query = "INSERT INTO chatsergio884_".$usuario."(emisor,mensaje,tiempo) VALUES('$usuario','$mensaje',current_timestamp())";
$run = mysqli_query($connection,$query);
mysqli_close($connection);

header('Location: chat.php?usuario='.$usuario);


?>