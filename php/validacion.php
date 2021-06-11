    <?php
    include('../db/dbconnection.php');
    $usuario = $_GET['Usuario'];
    $password =  $_GET['Password'];
    $query = "SELECT * FROM usuario
    WHERE (Usuario='$usuario' AND Password='$password') OR (Correo='$usuario' AND Password='$password')";
    $run = mysqli_query($conn,$query);
    $existe = mysqli_num_rows($run);
    mysqli_close($conn);

    if ($existe>0) {
      session_start();
      $_SESSION['usuario']=$usuario;
      include('../db/dbconnectionChat.php');
      $query = "CREATE TABLE IF NOT EXISTS chats".$usuario."(idChat INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
      chat VARCHAR(106),
      ultimoMensaje VARCHAR(999),
      tiempo TIMESTAMP,
      usuario VARCHAR(50),
      idInmueble INT)";
      $run = mysqli_query($connection,$query);
      mysqli_close($connection);
      header('Location: ../html/menu.html');
    }else {
      include('../db/dbconnection.php');
      $query = "SELECT * FROM usuario
      WHERE (Usuario='$usuario') OR (Correo='$usuario')";
      $run = mysqli_query($conn,$query);
      $existe = mysqli_num_rows($run); 
      mysqli_close($conn);
            if ($existe>0){ 
              header('Location: loginErrorPassword.php?usuario='.$usuario);
           }else { 
        header('Location: ../html/loginErrorUsuario.html');        
     }} ?>