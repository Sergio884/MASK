<?php
include("db.php");

//session_start();
    if(!isset($_SESSION['usuario'])){
      header("location: ../html/login.html");
    }
    $NomUsuario = $_SESSION['usuario'];

if(isset($_POST['save_task'])){
    $titulo=$_POST['titulo'];
    $tipoPropiedad=$_POST['tipoPropiedad'];
    $tipoVenta=$_POST['tipoVenta'];
    $numDormitorios=$_POST['numDormitorios'];
    $numBanios=$_POST['numBanios'];
    $estado=$_POST['estado'];
    $ciudad=$_POST['ciudad'];
    $direccion=$_POST['direccion'];
    $cp=$_POST['cp'];
    $costo=$_POST['costo'];
    $masDormitorio=$_POST['masDormitorio'];
    $masBanios=$_POST['masBanios'];
    $metrosCuadrados=$_POST['metrosCuadrados'];
    $descripcion=$_POST['descripcion'];
    
    $query="SELECT IdUsuario FROM usuario WHERE (Usuario='$NomUsuario')";
    $Res=mysqli_query($conn,$query);
    $row=mysqli_fetch_assoc($Res);
    $idUsuario=$row['IdUsuario'];
    if($numDormitorios==-1){
        $numDormitorios=$masDormitorio;
    }
    if($numBanios==-1){
        $numBanios=$masBanios;
    }

    echo $titulo;
    echo $tipoPropiedad;
    echo $tipoVenta;
    echo $numDormitorios;
    echo $numBanios;
    echo $estado;
    echo $ciudad;
    echo $direccion;
    echo $cp;
    echo $costo;

   

    $query="INSERT INTO inmueble(
            Titulo,
            IdUsuario,
            TipoInmueble,
            VentaRenta,
            Costo,
            Estado,
            Ciudad,
            Direccion,
            CP,
            NumeroDormitorios,
            NumeroBanios,
            MetrosCuadrados,
            Descripcion)
    VALUES ('$titulo',
            '$idUsuario',
            '$tipoPropiedad',
            '$tipoVenta',
            '$costo',
            '$estado',
            '$ciudad',
            '$direccion',
            '$cp',
            '$numDormitorios',
            '$numBanios',
            '$metrosCuadrados',
            '$descripcion')
            ";

    $result=mysqli_query($conn,$query);
    if(!$result){
        die(" Query fail");
    }
    else{
        echo 'Guardado Form';
    }


    $query= "SELECT IdInmueble FROM inmueble WHERE Titulo='$titulo' AND IdUsuario='$idUsuario'";
    $Res=mysqli_query($conn,$query);
    $row=mysqli_fetch_assoc($Res);
    $idInmueble=$row['IdInmueble'];


//*****************************Guardado de Multiples Imagenes */
    if(isset($_FILES["file"])){
        $reporte=null;

        foreach ($_FILES["file"]["error"] as $clave => $error){
            if ($error == UPLOAD_ERR_OK) {
                $imagenEscapes=addslashes(file_get_contents($_FILES["file"]["tmp_name"][$clave]));   
                $query2="INSERT INTO inmueblefoto(IdInmueble,Foto) VALUES ('$idInmueble','$imagenEscapes')";
                $result=mysqli_query($conn,$query2);
                if(!$result){
                    die(" Query fail");
                }
                else{
                    echo 'Imagen Guardada';
                }
            }
        }
        mysqli_close($conn);

    }

    header('Location: ../html/listaInmuebles.html');
   
}








//***************************************************** */
// if(isset($_POST['save_task'])){
//     $titulo=$_POST['titulo'];
//     $tipoPropiedad=$_POST['tipoPropiedad'];
//     $tipoVenta=$_POST['tipoVenta'];
//     $numDormitorios=$_POST['numDormitorios'];
//     $numBanios=$_POST['numBanios'];
//     $estado=$_POST['estado'];
//     $ciudad=$_POST['ciudad'];
//     $direccion=$_POST['direccion'];
//     $cp=$_POST['cp'];
//     $costo=$_POST['costo'];
//     $masDormitorio=$_POST['masDormitorio'];
//     $masBanios=$_POST['masBanios'];
//     $metrosCuadrados=$_POST['metrosCuadrados'];
//     $descripcion=$_POST['descripcion'];
//     $imagenEscapes=addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
    

//     if($numDormitorios==-1){
//         $numDormitorios=$masDormitorio;
//     }
//     if($numBanios==-1){
//         $numBanios=$masBanios;
//     }

//     echo $titulo;
//     echo $tipoPropiedad;
//     echo $tipoVenta;
//     echo $numDormitorios;
//     echo $numBanios;
//     echo $estado;
//     echo $ciudad;
//     echo $direccion;
//     echo $cp;
//     echo $costo;

   

//     $query="INSERT INTO inmueble(
//             Titulo,
//             TipoInmueble,
//             VentaRenta,
//             Costo,
//             Estado,
//             Ciudad,
//             Direccion,
//             CP,
//             NumeroDormitorios,
//             NumeroBanios,
//             MetrosCuadrados,
//             Descripcion)
//     VALUES ('$titulo',
//             '$tipoPropiedad',
//             '$tipoVenta',
//             '$costo',
//             '$estado',
//             '$ciudad',
//             '$direccion',
//             '$cp',
//             '$numDormitorios',
//             '$numBanios',
//             '$metrosCuadrados',
//             '$descripcion')
//             ";
    
//     $query2="INSERT INTO inmueblefoto(IdInmueble,Foto) VALUES ('1','$imagenEscapes')";
    
//     $result=mysqli_query($conn,$query);
    
    
    
    
//     if(!$result){
//         die(" Query fail");
//     }
//     else{
//         echo 'Guardado Form';
//     }


//     $result=mysqli_query($conn,$query2);

//     mysqli_close($conn);
//     if(!$result){
//         die(" Query fail");
//     }
//     else{
//         echo 'Imagen Guardada';
//     }

   
// }




?>