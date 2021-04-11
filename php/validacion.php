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
    $username = $_POST['username'];
    $password =  $_POST['password'];
    $query = "SELECT * FROM admin
    WHERE username='$username' and password='$password'";
    $run = mysqli_query($connection,$query);
    $existe = mysqli_num_rows($run);

    if ($existe>0) {
      session_start();
      $_SESSION["usuario"]=$_POST['username'];
      header('Location: tablaDatos.php');
    }else {?>
      <div id="contenedor-titulo-flex">
        <div class="contenedor-titulo">
          <h2>Datos incorrectos</h2><br>
          <form action="../html/LoginAdmin.html" method="post">
            <button type="submit" name="borrar" id="btn" >Volver a intentar</button>
          </form>
        </div>
      <div>
    <?php } ?>



  </body>
</html>
