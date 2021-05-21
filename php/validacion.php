    <?php
    include('dbconnection.php');
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
      header('Location: ../html/menu.html');
    }else {
      include('dbconnection.php');
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