<?PHP
include("../db/db.php");

//session_start();
    if(!isset($_SESSION['usuario'])){
      header("location: ../html/login.html");
    }
    $NomUsuario = $_SESSION['usuario'];
    
    if(isset($_POST['save_task'])){
     $usuario=$_POST['usuario'];
     $password=$_POST['password'];
     $nombre=$_POST['nombre'];
     $apellidos=$_POST['apellidos'];
     $correo=$_POST['correo'];
     $telefono=$_POST['telefono'];
     $nacimiento=$_POST['nacimiento'];
     $imagen=addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
     
    
        echo("********");
        $query="UPDATE usuario SET
                Password='$password',
                Nombres='$nombre',
                Apellidos='$apellidos',
                Correo='$correo',
                Telefono='$telefono',
                Edad='$nacimiento'
                -- FotoUsuario='$imagen'
            WHERE Usuario='$NomUsuario'";
            echo($usuario);
            echo($password);
            echo($nombre);
            echo($nacimiento);
            $result=mysqli_query($conn,$query);
           
            mysqli_close($conn);
           if(!$result){
               die(" Query fail");
           }
           else{
               echo 'Guardado Form';
           }
           header('Location: ../php/buscarView.php');
     }
     
    

    
?>