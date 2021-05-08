<?php
    session_start();
    if(!isset($_SESSION['usuario'])){
        header("location: ../html/login.html");
      }
$usuario = $_SESSION['usuario'];
$mensaje = $_POST['mensaje'];
$receptor = $_GET['receptor'];
$idInmueble = $_GET['idInmubele'];
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

if(strlen($mensaje)>25){
    $ultimoMensaje = "";
    for($i=0;$i<26;$i++){
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


include('dbconnection.php');
$sql = "SELECT usuario FROM chats".$receptor."
        WHERE usuario='".$usuario."'";
$buscar = mysqli_query($connection,$sql);
$existe = mysqli_num_rows($buscar);
mysqli_close($connection);
if ($existe==0) {
    $chatUsuario = "chat".$usuario."_".$receptor;
    include('dbconnection.php');
    $insertar = "INSERT INTO chats".$receptor."(chat,ultimoMensaje,tiempo,usuario,idInmueble) VALUES('$chatUsuario',' ',current_timestamp(),'$usuario','$idInmueble')";
    mysqli_query($connection,$insertar);
    mysqli_close($connection); 
}
include('dbconnection.php');
$query = "UPDATE chats".$receptor." SET ultimoMensaje='$ultimoMensaje',tiempo=current_timestamp() WHERE usuario='$usuario'";
$run = mysqli_query($connection,$query);
mysqli_close($connection);



header('Location: chat.php?receptor='.$receptor.'&idInmueble='.$idInmueble);
?>