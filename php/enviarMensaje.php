<?php
    session_start();
    if(!isset($_SESSION['usuario'])){
        header("location: ../html/login.html");
      }
$usuario = $_SESSION['usuario'];
$mensaje = $_POST['mensaje'];
$receptor = $_GET['receptor'];
$idInmueble = $_GET['idInmueble'];

    $mensajeAjuste = $mensaje;
    $palabra = "";
    $mensajeAjuste = "";
    $contador = 0;
    for($i=0;$i<strlen($mensaje);$i++){
        if($mensaje[$i]!=" "){
            $contador++;
            $palabra = $palabra.$mensaje[$i];            
        
        }else{
            $contador = 0;                    
            $palabra = buscarInsulto($palabra);
            $mensajeAjuste = $mensajeAjuste." ".$palabra;
            $palabra = "";
        }
        if($contador==14){
            $mensajeAjuste = $mensajeAjuste."\n";
            $contador = 0;
        }
    }
    $palabra = buscarInsulto($palabra);
    $mensajeAjuste = $mensajeAjuste." ".$palabra;
    $mensaje = $mensajeAjuste;


function buscarInsulto($palabra){
    $palabra = mb_strtolower($palabra, 'UTF-8');
    $palabraSola = "";
    $signo = "";
    for($i=0;$i<strlen($palabra);$i++){
        $c = $palabra[$i];
        if($c=="?" || $c=="," || $c=="." || $c=="!" || $c=="-" || $c=="_" || $c=="*"){
            $signo = $signo.$c;
        }else{
            $palabraSola = $palabraSola.$c;            
        }
    }
    switch ($palabraSola) {
        case "chingo";
        case "ching0n";
        case "chingas";
        case "ching4s";
        case "mamamela";
        case "mames";
        case "pendejo";
        case "pendeja";
        case "zorra";        
        case "chinga";
        case "coño";
        case "jodete";
        case "v3rga";
        case "berga";
        case "verg4";
        case "piruja";
        case "mierda";
        case "fuck";
        case "shit";
        case "pendej4";
        case "p3ndeja";
        case "pend3ja";
        case "p3nd3j4";
        case "pendej0";
        case "pend3jo";
        case "jot0";
        case "j0to";
        case "j0t0";
        case "jodete";
        case "tonto";
        case "tonta";
        case "t0nt0";
        case "t0nto";
        case "tont0";
        case "tontisímo";
        case "tontisimo";
        case "tonticímo";
        case "tonticimo";
        case "tontisím0";
        case "t0ntisímo";
        case "t0ntisím0";
        case "tontisim0";
        case "t0ntisim0";
        case "t0nticim0";
        case "t0nticimo";
        case "tonticim0";
        case "pinche";        
        case "estupido";
        case "estupida";
        case "frijolero";
        case "frijolera";
        case "tortillera";
        case "tortillero";
        case "idiota";
        case "imbécil";
        case "invecil";
        case "invesil";
        case "mongolo";
        case "mongolito";
        case "inbecil";
        case "inbesil";
        case "imbecil";
        case "imbesil";
        case "imvesil";
        case "imvecil";
        case "simp";    
        case "incel";
        case "insel";
        case "fuckboy";
        case "prieto";
        case "prieta";
        case "puñetas";
        case "chingas";
        case "chingo";
        case "chingamos";
        case "vergazo";
        case "vergaso";
        case "bergaso";
        case "bergazo";
        case "putazo";
        case "putaso";
        case "putaz0";
        case "culera";
        case "culero";
        case "culo";
        case "cul0";
        case "sorra";
        case "z0rra";
        case "s0rra";
        case "zorr4";
        case "z0rr4";
            return censurar($palabraSola).$signo;
            break;
    }
    return $palabra;
}

function censurar($palabra){
    $newPalabra = "";
    for($i=0;$i<strlen($palabra);$i++){
        if($i==0){
            $newPalabra = $palabra[$i];
        }elseif($i==(strlen($palabra)-1)){
            $newPalabra = $newPalabra.$palabra[$i];
        }else{
            $newPalabra = $newPalabra."*";
        }
    }
    return $newPalabra;
}

if(strlen($mensaje)>12){
    $ultimoMensaje = "";
    for($i=0;$i<13;$i++){
        $ultimoMensaje = $ultimoMensaje.$mensaje[$i];
    }
    $ultimoMensaje = $ultimoMensaje."...";
}else{
    $ultimoMensaje = $mensaje;
}

include('../db/dbconnectionChat.php');
$query = "INSERT INTO chat".$usuario."_".$receptor."(emisor,mensaje,tiempo) VALUES('$usuario','$mensaje',current_timestamp())";
$run = mysqli_query($connection,$query);
mysqli_close($connection);

include('../db/dbconnectionChat.php');
$query = "INSERT INTO chat".$receptor."_".$usuario."(emisor,mensaje,tiempo) VALUES('$usuario','$mensaje',current_timestamp())";
$run = mysqli_query($connection,$query);
mysqli_close($connection);

include('../db/dbconnectionChat.php');
$query = "UPDATE chats".$usuario." SET ultimoMensaje='$ultimoMensaje',tiempo=current_timestamp() WHERE usuario='$receptor'";
$run = mysqli_query($connection,$query);
mysqli_close($connection);


include('../db/dbconnectionChat.php');
$sql = "SELECT usuario FROM chats".$receptor."
        WHERE usuario='".$usuario."'";
$buscar = mysqli_query($connection,$sql);
$existe = mysqli_num_rows($buscar);
mysqli_close($connection);
if ($existe==0) {
    $chatUsuario = "chat".$usuario."_".$receptor;
    include('../db/dbconnectionChat.php');
    $insertar = "INSERT INTO chats".$receptor."(chat,ultimoMensaje,tiempo,usuario,idInmueble) VALUES('$chatUsuario',' ',current_timestamp(),'$usuario','$idInmueble')";
    mysqli_query($connection,$insertar);
    mysqli_close($connection); 
}
include('../db/dbconnectionChat.php');
$query = "UPDATE chats".$receptor." SET ultimoMensaje='$ultimoMensaje',tiempo=current_timestamp() WHERE usuario='$usuario'";
$run = mysqli_query($connection,$query);
mysqli_close($connection);



header('Location: chat.php?receptor='.$receptor.'&idInmueble='.$idInmueble);
?>