    <?php
    include('dbconnection.php');
    $usuario = $_POST['Usuario'];
    $password =  $_POST['Password'];
    $query = "SELECT * FROM usuario
    WHERE Usuario='$usuario' and Password='$password'";
    $run = mysqli_query($connection,$query);
    $existe = mysqli_num_rows($run);

    if ($existe>0) {
      session_start();
      $_SESSION["usuario"]=$_POST['usuario'];
      header('Location: chat.php');
    }else {
      $query = "SELECT * FROM usuario
      WHERE Usuario='$usuario'";
      $run = mysqli_query($connection,$query);
      $existe = mysqli_num_rows($run); 
            if ($existe>0){ 
              header('Location: loginErrorPassword.php?usuario='.$usuario);
           }else { 
        header('Location: ../html/loginErrorUsuario.html');        
     }} ?>