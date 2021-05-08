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
    session_start();
    if(!isset($_SESSION['usuario'])){
      header("location: ../html/login.html");
    }
    $usuario = $_SESSION['usuario'];
    $receptor = $_GET['receptor'];
    $idInmueble = $_GET['idInmueble'];
    include('dbconnection.php');
    $query = "CREATE TABLE IF NOT EXISTS chats".$usuario."(idChat INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    chat VARCHAR(106),
    ultimoMensaje VARCHAR(999),
    tiempo TIMESTAMP,
    usuario VARCHAR(50),
    idInmueble INT)";
    $run = mysqli_query($connection,$query);
    mysqli_close($connection);
  ?>
    <table class="contenidoTabla" id="divu" cellspacing="0">
    <tbody>
    <?php
      include('dbconnection.php');
      $sql = "SELECT chat FROM chats".$usuario."
                      WHERE usuario='".$receptor."'";
      $buscar = mysqli_query($connection,$sql);
      $existe = mysqli_num_rows($buscar);
      mysqli_close($connection);
      if ($existe>0) {
        $chat = mysqli_fetch_assoc($buscar);
        $chatUsuario = $chat['chat'];
      }else {
        $chatUsuario = "chat".$usuario."_".$receptor;
        include('dbconnection.php');
        $insertar = "INSERT INTO chats".$usuario."(chat,ultimoMensaje,tiempo,usuario,idInmueble) VALUES('$chatUsuario',' ',current_timestamp(),'$receptor','$idInmueble')";
        mysqli_query($connection,$insertar);
        mysqli_close($connection); 
        include('dbconnection.php');
        $query = "CREATE TABLE $chatUsuario(idMensaje INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
        emisor VARCHAR(50),
        mensaje VARCHAR(999),
        tiempo TIMESTAMP)";
        mysqli_query($connection,$query);
        mysqli_close($connection);
        
        include('dbconnection.php');
        $query = "INSERT INTO $chatUsuario(emisor,mensaje,tiempo) VALUES('$receptor','POLÍTICAS DEL CHAT',current_timestamp())";
        $run = mysqli_query($connection,$query);
        mysqli_close($connection);      

        include('dbconnection.php');
        $query = "INSERT INTO $chatUsuario(emisor,mensaje,tiempo) VALUES('$receptor','Los mensajes enviados son responsabilidad de los usuarios',current_timestamp())";
        $run = mysqli_query($connection,$query);
        mysqli_close($connection);      

        include('dbconnection.php');
        $query = "INSERT INTO $chatUsuario(emisor,mensaje,tiempo) VALUES('$receptor','Los mensajes están protegidos solo para que ustedes puedan verlos',current_timestamp())";
        $run = mysqli_query($connection,$query);
        mysqli_close($connection); 

        include('dbconnection.php');
        $query = "INSERT INTO $chatUsuario(emisor,mensaje,tiempo) VALUES('$receptor','Evite dar depósitos de dinero directos',current_timestamp())";
        $run = mysqli_query($connection,$query);
        mysqli_close($connection); 


        include('dbconnection.php');
        $query = "INSERT INTO $chatUsuario(emisor,mensaje,tiempo) VALUES('$receptor','No envíe sus datos bancarios',current_timestamp())";
        $run = mysqli_query($connection,$query);
        mysqli_close($connection); 

        
        include('dbconnection.php');
        $query = "INSERT INTO $chatUsuario(emisor,mensaje,tiempo) VALUES('$receptor','Evité lenguaje en incite el odio',current_timestamp())";
        $run = mysqli_query($connection,$query);
        mysqli_close($connection); 

        
        include('dbconnection.php');
        $query = "INSERT INTO $chatUsuario(emisor,mensaje,tiempo) VALUES('$receptor','El respeto mutuo hacer fuerte a nuestra comunidad ',current_timestamp())";
        $run = mysqli_query($connection,$query);
        mysqli_close($connection); 


        include('dbconnection.php');
        $query = "INSERT INTO $chatUsuario(emisor,mensaje,tiempo) VALUES('$receptor','Hola $usuario yo soy $receptor',current_timestamp())";
        $run = mysqli_query($connection,$query);
        mysqli_close($connection);

        include('dbconnection.php');
        $query = "INSERT INTO $chatUsuario(emisor,mensaje,tiempo) VALUES('$receptor','¿En qué puedo ayudarte?',current_timestamp())";
        $run = mysqli_query($connection,$query);
        mysqli_close($connection);
      }
    ?>

      <?php
      include('dbconnection.php');
      $ordenar = "SELECT * FROM ".$chatUsuario."
                  ORDER BY idMensaje ASC";

      $run = mysqli_query($connection,$ordenar);
      while($resultado = mysqli_fetch_assoc($run)){
        if($resultado['emisor']==$usuario){ ?>
          <tr>
            <td colspan="3"><td>
            <td colspan="3" class="miHora"><?php echo $resultado['tiempo']; ?></td>
          </tr>
          <tr>
            <td colspan="3"></td>
            <td colspan="3" class="miMensaje"><?php echo $resultado['mensaje']; ?></td>
          </tr>
          <?php
        }else{ ?>
      <tr>
          <tr>
            <td colspan="3"><?php echo $resultado['tiempo']; ?></td>
            <td colspan="3"><td>
          </tr>
        <td  colspan="3" class="suMensaje"><?php echo $resultado['mensaje']; ?></td>
        <td colspan="3"></td>
      </tr>
        <?php }
     } 
     mysqli_close($connection);?>
    </tbody>
  </table>

  <div class="zonaEnvio">
    <form action="enviarMensaje.php?receptor=<?php echo $receptor; ?>&idInmueble=<?php echo $idInmueble; ?>" method="post">
      <div class="contenedorZonaEnvio">    
        <input type="text" name="mensaje" placeholder="Escribe un mensaje" autocomplete="off">
        <input type="submit" value="Enviar">
      </div>
    </form>
  </div>

  <div class="conversaciones">
      <?php
      include('dbconnection.php');
      $ordenar = "SELECT * FROM chats".$usuario."
                  ORDER BY tiempo DESC";
      $run = mysqli_query($connection,$ordenar);
      while($resultado = mysqli_fetch_assoc($run)){?>
      <a href="chat.php?receptor=<?php echo $resultado['usuario']; ?>&idInmueble=<?php echo $resultado['idInmueble']; ?>" class="aChat" >
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
          <h6><?php echo $resultado['tiempo']; ?></h6>
          <h6 class="ultimoMensaje"><?php echo $resultado['ultimoMensaje']; ?></h6>
        </div>
      </div>
      </a>
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