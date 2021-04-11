<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../Estilos/estiloLogin.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&display=swap" rel="stylesheet">
    <title></title>
  </head>
  <body id="validacion">
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
    }else {?>
      <div id="contenedor-titulo-flex">
        <div class="contenedor-titulo">
          <h2>Datos incorrectos</h2><br>
          <form action="../html/login.html" method="post">
            <button type="submit" name="borrar" id="btn" >Volver a intentar</button>
          </form>
        </div>
      <div>
    <?php } ?>



  </body>
</html>
