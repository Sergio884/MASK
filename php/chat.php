<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../Estilos/estiloLogin.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../estilos/estiloChat.css">
    <title>Chat</title>
  </head>
  <body>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
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
    <table class="contenidoTabla" id="divu">
    <thead>
      <tr>
        <th colspan="2"><?php echo "CHATME"; ?></th>
      </tr>
    </thead>
    <tbody>
      <?php
      include('dbconnection.php');
      $ordenar = "SELECT * FROM chatsergio884_clairo
                  ORDER BY idMensaje ASC";

      $run = mysqli_query($connection,$ordenar);
      while($resultado = mysqli_fetch_assoc($run)){
        if($resultado['emisor']==$usuario){ ?>
          <tr>
            <td></td>
            <td class="miMensaje"><?php echo $resultado['mensaje']; ?></td>
          </tr>
          <?php
        }else{ ?>
      <tr>
        <td class="suMensaje"><?php echo $resultado['mensaje']; ?></td>
        <td></td>
      </tr>
        <?php }
     } ?>
    </tbody>
  </table>
  <form action="enviarMensaje.php?usuario=<?php echo $_GET['usuario']; ?>" method="post">
  <input type="text" name="mensaje" placeholder="Escribe un mensaje">
  <input type="submit" value="Enviar">
  </form>

<script>
  scrollAbajo();
    function scrollAbajo()
      {
        //Obtengo el div
        var e = document.getElementById('divu');
        //Llevo el scroll al fondo
        var objDiv = document.getElementById("divu");
        objDiv.scrollTop = objDiv.scrollHeight;
    }
  </script>
  </body>
</html>