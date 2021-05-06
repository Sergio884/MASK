<?php
    session_start();
$usuario = $_SESSION['usuario'];
$mensaje = $_POST['mensaje'];
$receptor = $_GET['receptor'];
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
        if($contador==14){
            $mensajeAjuste = $mensajeAjuste."\n";
            $contador = 0;
        }
        $mensajeAjuste = $mensajeAjuste.$mensaje[$i];
    }
    $mensaje = $mensajeAjuste;
}

if(strlen($mensaje)>21){
    $ultimoMensaje = "";
    for($i=0;$i<22;$i++){
        $ultimoMensaje = $ultimoMensaje.$mensaje[$i];
    }
    $ultimoMensaje = $ultimoMensaje."...";
}else{
    $ultimoMensaje = $mensaje;
}

include('dbconnection.php');
$query = "INSERT INTO chat".$usuario."_".$receptor."(emisor,mensaje,tiempo) VALUES('$usuario','$mensaje',current_timestamp())";
$run = mysqli_query($connection,$query);
mysqli_close($connection);

include('dbconnection.php');
$query = "INSERT INTO chat".$receptor."_".$usuario."(emisor,mensaje,tiempo) VALUES('$usuario','$mensaje',current_timestamp())";
$run = mysqli_query($connection,$query);
mysqli_close($connection);

include('dbconnection.php');
$query = "UPDATE chats".$usuario." SET ultimoMensaje='$ultimoMensaje',tiempo=current_timestamp() WHERE usuario='$receptor'";
$run = mysqli_query($connection,$query);
mysqli_close($connection);


header('Location: chat.php?receptor='.$receptor);


?>