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
    $usuario = $_GET['usuario'];

    $remitente = "clairo";
    include('dbconnection.php');
    $query = "SELECT chat FROM chats".$usuario." WHERE usuario='$remitente'";
    $run = mysqli_query($connection,$query);
    $consulta = mysqli_fetch_assoc($run);
    $chat=$consulta['chat'];
   // echo $chat;
    mysqli_close($connection);

    include('dbconnection.php');
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
        <th>----------------------------------</th>
        <th>----------------------------------</th>
        <th>----------------------------------</th>
        <th>----------------------------------</th>
        <th>----------------------------------</th>
        <th>----------------------------------</th>
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
     } 
     mysqli_close($connection);?>
    </tbody>
  </table>

  <div class="zonaEnvio">
    <form action="enviarMensaje.php?usuario=<?php echo $_GET['usuario']; ?>" method="post">
      <div class="contenedorZonaEnvio">    
        <input type="text" name="mensaje" placeholder="Escribe un mensaje" autocomplete="off">
        <input type="submit" value="Enviar">
      </div>
    </form>
  </div>

  <div class="conversaciones">
      <?php
      include('dbconnection.php');
      $ordenar = "SELECT * FROM chatssergio884
                  ORDER BY tiempo DESC";
      $run = mysqli_query($connection,$ordenar);
      while($resultado = mysqli_fetch_assoc($run)){?>
      <div class="contenedorConversaciones">
        <div class="foto">
        <?php
          $ordenar = "SELECT fotoUsuario FROM usuario
                      WHERE usuario='".$resultado['usuario']."'";
          $buscar = mysqli_query($connection,$ordenar);
          $datoUsuario = mysqli_fetch_assoc($buscar)
        ?>
         <?php echo '<img src="data:image;base64,'.base64_encode($datoUsuario['fotoUsuario']).'" class="imgChat">'; ?>
        </div>
        <div class="mensaje">
          <h6 class="nombre"><?php echo $resultado['usuario']; ?></h6>
          <h6 class="ultimoMensaje"><?php echo $resultado['ultimoMensaje']; ?></h6>
        </div>
      </div>
     <?php }
     mysqli_close($connection);?> 
  </div>


          

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
    <script>
    /** 
     var time = new Date().getTime();
     $(document.body).bind("mousemove keypress", function(e) {
         time = new Date().getTime();
     });

     function refresh() {
         if(new Date().getTime() - time >= 4000) 
             window.location.reload(true);
         else 
             setTimeout(refresh, 500);
     }
     setTimeout(refresh, 500); /** */ 
</script>
  </body>
</html>