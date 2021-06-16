<?PHP
include("../db/db.php");

//session_start();
    if(!isset($_SESSION['usuario'])){
      header("location: ../html/login.html");
    }
    $NomUsuario = $_SESSION['usuario'];
    
    if(isset($_POST['save_task'])){
     //$usuario=$_POST['usuario'];
     $password=$_POST['password'];
     $nombre=$_POST['nombre'];
     $apellidos=$_POST['apellidos'];
     $correo=$_POST['correo'];
     $telefono=$_POST['telefono'];
     $nacimiento=$_POST['nacimiento'];



     
     
     
        echo("********");
     if($_FILES["image"]["tmp_name"] != null){
        $imagen=addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
        $query="UPDATE usuario SET Nombres ='$nombre',Password='$password', Correo='$correo', Telefono='$telefono', Edad='$nacimiento', Apellidos='$apellidos', FotoUsuario=Null  WHERE Usuario='$NomUsuario'";
        echo($query);
        echo($usuario);
        echo($password);
        echo($nombre);
        echo($nacimiento);
        $result=mysqli_query($conn,$query);
        
        $query="UPDATE usuario SET FotoUsuario='$imagen'  WHERE Usuario='$NomUsuario'";
        $result=mysqli_query($conn,$query);
        mysqli_close($conn);
       if(!$result){
           die(" Query fail");
       }
       else{
           echo 'Guardado Form';
       }

     }
     else{
        $query="UPDATE usuario SET Nombres ='$nombre',Password='$password', Correo='$correo', Telefono='$telefono', Edad='$nacimiento', Apellidos='$apellidos' WHERE Usuario='$NomUsuario'";
        echo($query);
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
     }
          
           header('Location: ../php/buscarView.php');
     }
     
    

    
?>