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
    <table class="contenidoTabla" id="divu" cellspacing="0">
    <thead>
      <tr>
        <th></th>
        <th>-----------------</th>
        <th>-----------------</th>
        <th>-----------------</th>
        <th>-----------------</th>
        <th></th>
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
            <td colspan="3"></td>
            <td colspan="3" class="miMensaje"><?php echo $resultado['mensaje']; ?></td>
          </tr>
          <?php
        }else{ ?>
      <tr>
        <td  colspan="3" class="suMensaje"><?php echo $resultado['mensaje']; ?></td>
        <td colspan="3"></td>
      </tr>
        <?php }
     } ?>
    <form action="enviarMensaje.php?usuario=<?php echo $_GET['usuario']; ?>" method="post">
     <tr>
      <td colspan="5" class="areaMensaje"><input type="text" name="mensaje" placeholder="Escribe un mensaje"></td>
      <td  colspan="1" class="enviarMensaje"><input type="submit" value="Enviar"></td>
     </tr>
    </tbody>
  </table>
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