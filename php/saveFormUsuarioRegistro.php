

<?php 
 if(isset($_POST['save_task'])){
     $usuario=$_POST['usuario'];
     $password=$_POST['password'];
     $nombre=$_POST['nombre'];
     $apellidos=$_POST['apellidos'];
     $correo=$_POST['correo'];
     $telefono=$_POST['telefono'];
     $nacimiento=$_POST['nacimiento'];
     $imagen=addslashes(file_get_contents($_FILES["image"]["tmp_name"]));

     include("../db/db.php"); 
     $query = "SELECT * FROM usuario WHERE Usuario='$usuario' or Correo='$correo'";
     $run = mysqli_query($conn,$query);
     $existe = mysqli_num_rows($run);
    echo $existe;
     if ($existe>0) {
       header('Location: formRegistroUsuario.php');
     }else{
     $query="INSERT INTO usuario(
            Usuario,
            Password,
            Correo,
            Telefono,
            Nombres,
            Apellidos,
            Edad,
            FotoUsuario)
    VALUES ('$usuario',
            '$password',
            '$correo',
            '$telefono',
            '$nombre',
            '$apellidos',
            '$nacimiento',
            '$imagen')
            ";
    
    
    $result=mysqli_query($conn,$query);
    
    mysqli_close($conn);

    header('Location: validacion.php?Usuario='.$usuario.'&Password='.$password.'');
    
    if(!$result){
        die(" Query fail");
    }
    else{
        echo 'Guardado Form';
    }
    } 
}

?>