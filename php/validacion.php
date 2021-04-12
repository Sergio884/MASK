<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../Estilos/estiloLogin.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&display=swap" rel="stylesheet">
    <title></title>
  </head>
  <body id="login">
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
      $existe = mysqli_num_rows($run);?>
      <section>
          <div class="contenedor-error">
            <div class="contenedor-login">
      <?php 
            if ($existe>0){ 
              ?>
                  <h1>La contraseña es incorrecta</h1><br>
      <?php }else { ?>
                  <h1>El usuario no existe</h1><br>        
    <?php }} ?>
                    <form action="../html/login.html" method="post">
                    <button type="submit" name="borrar" id="btn" >Reintentar</button>
                  </form>
                </div>
              <div>
              </section>


  </body>
</html>