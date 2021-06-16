
<?PHP
include("../db/db.php");

//session_start();
    if(!isset($_SESSION['usuario'])){
      header("location: ../html/login.html");
    }
    $NomUsuario = $_SESSION['usuario'];
    $idInmueble = $_GET['IdInmueble'];
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

    $query="UPDATE inmueble SET
            Titulo='$titulo',
            IdUsuario='$idUsuario',
            TipoInmueble='$tipoPropiedad',
            VentaRenta='$tipoVenta',
            Costo='$costo',
            Estado='$estado',
            Ciudad='$ciudad',
            Direccion='$direccion',
            CP='$cp',
            NumeroDormitorios='$numDormitorios',
            NumeroBanios='$numBanios',
            MetrosCuadrados='$metrosCuadrados',
            Descripcion='$descripcion'
        WHERE IdInmueble='$idInmueble'";

    $result=mysqli_query($conn,$query);
    if(!$result){
        die(" Query fail");
    }
    else{
        echo 'Guardado Form';
    }


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


?>