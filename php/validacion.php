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
    <section id="login">
      <div id="contenedor-titulo-flex">
        <div class="contenedor-titulo">
          <h1>Datos incorrectos</h1><br>
          <form action="../html/login.html" method="post">
            <button type="submit" name="borrar" id="btn" >Reintentar</button>
          </form>
        </div>
      <div>
    </section>
    <?php } ?>



  </body>
</html>
