<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../Estilos/estiloLogin.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../estilos/tablaEstilos.css">
    <title>Chat</title>
  </head>
  <body>
  <?php
    include('dbconnection.php');
    $usuario = $_GET['usuario'];
    $query = "CREATE TABLE IF NOT EXISTS chats".$usuario."(idChat INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    chat VARCHAR(106),
    ultimoMensaje VARCHAR(999),
    tiempo TIMESTAMP,
    usuario VARCHAR(50),
    estado VARCHAR(20))";
    $run = mysqli_query($connection,$query);
    mysqli_close($connection);
  ?>
    <table class="contenidoTabla">
    <thead>
      <tr>
        <th>Emisor</th>
        <th>Mensaje</th>
      </tr>
    </thead>
    <tbody>
      <?php
      include('dbconnection.php');
      $ordenar = "SELECT * FROM chatsergio884_clairo
                  ORDER BY idMensaje ASC";

      $run = mysqli_query($connection,$ordenar);
      while($resultado = mysqli_fetch_assoc($run)){
         ?>
      <tr>
        <td><?php echo $resultado['emisor'].":"; ?></td>
        <td><?php echo $resultado['mensaje']; ?></td>
      </tr>
    <?php } ?>
    </tbody>
  </table>
  <form action="enviarMensaje.php?usuario=<?php echo $_GET['usuario']; ?>" method="post">
  <input type="text" name="mensaje" placeholder="Mensaje">
  <input type="submit" value="Enviar">
  </form>

  </body>
</html>