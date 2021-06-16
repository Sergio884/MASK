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
    $receptor = "Trobify";
    include('../db/dbconnectionChat.php');
    $query = "CREATE TABLE IF NOT EXISTS reportes".$usuario."(idReporte INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    reporte VARCHAR(106),
    ultimoMensaje VARCHAR(999),
    tiempo TIMESTAMP,
    usuario VARCHAR(50)";
    $run = mysqli_query($connection,$query);
    mysqli_close($connection);
  ?>
    <table class="contenidoTabla" id="divu" cellspacing="0">
    <tbody>
    <?php
      include('../db/dbconnectionChat.php');
      $sql = "SELECT reporte FROM reportes".$usuario."
                      WHERE usuario='".$receptor."'";
      $buscar = mysqli_query($connection,$sql);
      $existe = mysqli_num_rows($buscar);
      mysqli_close($connection);
      if ($existe>0) {
        $chat = mysqli_fetch_assoc($buscar);
        $chatUsuario = $chat['reporte'];
      }else {
        $chatUsuario = "reporte".$usuario."_".$receptor;
        include('../db/dbconnectionChat.php');
        $insertar = "INSERT INTO reportes".$usuario."(reporte,ultimoMensaje,tiempo,usuario) VALUES('$chatUsuario',' ',current_timestamp(),'$receptor')";
        mysqli_query($connection,$insertar);
        mysqli_close($connection); 
        include('../db/dbconnectionChat.php');
        $query = "CREATE TABLE $chatUsuario(idMensaje INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
        emisor VARCHAR(50),
        mensaje VARCHAR(999),
        tiempo TIMESTAMP)";
        mysqli_query($connection,$query);
        mysqli_close($connection);
           

        include('../db/dbconnectionChat.php');
        $query = "INSERT INTO $chatUsuario(emisor,mensaje,tiempo) VALUES('$receptor','Hola $usuario, nosotros somos el equipo de Trobify',current_timestamp())";
        $run = mysqli_query($connection,$query);
        mysqli_close($connection);

        include('../db/dbconnectionChat.php');
        $query = "INSERT INTO $chatUsuario(emisor,mensaje,tiempo) VALUES('$receptor','Estamos en constante mantenimiento',current_timestamp())";
        $run = mysqli_query($connection,$query);
        mysqli_close($connection); 
        
        
        include('../db/dbconnectionChat.php');
        $query = "INSERT INTO $chatUsuario(emisor,mensaje,tiempo) VALUES('$receptor','Tratamos de dar lo mejor de nosotros día con día',current_timestamp())";
        $run = mysqli_query($connection,$query);
        mysqli_close($connection); 

        
        include('../db/dbconnectionChat.php');
        $query = "INSERT INTO $chatUsuario(emisor,mensaje,tiempo) VALUES('$receptor','Para así lograr ofrecer un servicio de calidad',current_timestamp())";
        $run = mysqli_query($connection,$query);
        mysqli_close($connection); 

        include('../db/dbconnectionChat.php');
        $query = "INSERT INTO $chatUsuario(emisor,mensaje,tiempo) VALUES('$receptor','Lamentamos que se haya topado con un imperfecto',current_timestamp())";
        $run = mysqli_query($connection,$query);
        mysqli_close($connection);             

        include('../db/dbconnectionChat.php');
        $query = "INSERT INTO $chatUsuario(emisor,mensaje,tiempo) VALUES('$receptor','Podría darnos detalles sobre el problema ',current_timestamp())";
        $run = mysqli_query($connection,$query);
        mysqli_close($connection); 

        include('../db/dbconnectionChat.php');
        $query = "INSERT INTO $chatUsuario(emisor,mensaje,tiempo) VALUES('$receptor','Su ayuda hará de Trobify un mejor lugar',current_timestamp())";
        $run = mysqli_query($connection,$query);
        mysqli_close($connection);   

      }
    ?>

      <?php
      include('../db/dbconnectionChat.php');
      $ordenar = "SELECT * FROM ".$chatUsuario."
                  ORDER BY idMensaje ASC";

      $run = mysqli_query($connection,$ordenar);
      while($resultado = mysqli_fetch_assoc($run)){
        $tiempo = cortarTiempo($resultado['tiempo']);
        if($resultado['emisor']==$usuario){ ?>
          <tr>
            <td colspan="3"></td>
            <td colspan="3" class="miMensaje"><?php echo $resultado['mensaje']; ?></td>
          </tr>
          <tr>
            <td colspan="3"><td>
            <td colspan="3" class="miHora"><?php echo $tiempo; ?></td>
          </tr>
          <?php
        }else{ ?>
      <tr>
          <tr>
            <td  colspan="3" class="suMensaje"><?php echo $resultado['mensaje']; ?></td>
            <td colspan="3"></td>
          </tr>
          <tr>
            <td colspan="3" class="suHora"><?php echo $tiempo ?></td>
            <td colspan="3"><td>
          </tr>
      </tr>
        <?php }
     } 
     mysqli_close($connection);?>

      <?php
        function cortarTiempo($tiempoCompleto){
          $hora = "";
          for($i=10;$i<strlen($tiempoCompleto)-3;$i++){
              $hora = $hora.$tiempoCompleto[$i];
          }
          return $hora;
        }
      ?>
    </tbody>
  </table>

  <div class="zonaEnvio">
    <form action="envioReporte.php?receptor=Trobify" method="post">
      <div class="contenedorZonaEnvio">    
        <input type="text" name="mensaje" placeholder="Escribe un mensaje" autocomplete="off">
        <input type="submit" value="Enviar">
      </div>
    </form>
  </div>

  <div class="conversaciones">
      <a href="reporteProblema.php?receptor=Trobify" class="aChat">
      <div class="contenedorConversaciones">
        <div class="foto">
        <?php
          include('../db/dbconnection.php');
          $ordenar = "SELECT fotoUsuario FROM usuario
                      WHERE usuario='".$receptor."'";
          $buscar = mysqli_query($conn,$ordenar);
          $datoUsuario = mysqli_fetch_assoc($buscar)
        ?>
         <?php echo '<img src="data:image;base64,'.base64_encode($datoUsuario['fotoUsuario']).'" class="imgChat">'; ?>
        </div>
        <div class="mensaje">
          <h6 class="nombre">Trobify</h6>
          <?php
          include('../db/dbconnectionChat.php');
          $ordenar = "SELECT tiempo FROM reportes".$usuario."
                      WHERE usuario='".$receptor."'";
          $buscar = mysqli_query($connection,$ordenar);
          $datoReceptor = mysqli_fetch_assoc($buscar);
          mysqli_close($connection);
        ?>
          <h6><?php echo $datoReceptor['tiempo']; ?></h6>

          <?php
          include('../db/dbconnectionChat.php');
          $ordenar = "SELECT ultimoMensaje FROM reportes".$usuario."
                      WHERE usuario='".$receptor."'";
          $buscar = mysqli_query($connection,$ordenar);
          $datoReceptor = mysqli_fetch_assoc($buscar);
          mysqli_close($connection);
        ?>        
          <h6 class="ultimoMensaje"><?php echo $datoReceptor['ultimoMensaje']; ?></h6>
        </div>
      </div>
      </a>      
  </div>

  <div class="inmueble">
      <div class="contenedorInmueble">
       <div class="receptor">
        <h1><?php echo $receptor; ?></h1>
        <?php
          include('../db/dbconnection.php');
          $ordenar = "SELECT fotoUsuario FROM usuario
                      WHERE usuario='".$receptor."'";
          $buscar = mysqli_query($conn,$ordenar);
          $datoUsuario = mysqli_fetch_assoc($buscar);
          mysqli_close($conn);
        ?>        
         <?php echo '<img src="data:image;base64,'.base64_encode($datoUsuario['fotoUsuario']).'" class="imgReceptor">'; ?>
          
          <?php
            include('../db/dbconnection.php');
            $ordenar = "SELECT idUsuario FROM usuario
                        WHERE usuario='".$receptor."'";
            $buscar = mysqli_query($conn,$ordenar);
            $datoUsuario = mysqli_fetch_assoc($buscar);
            mysqli_close($conn);
          ?>      

<h5> En Trobify queremos lo mejor para ti y para todos, es por eso que nos importa mucho tu opinión y criticas, para así lograr trabajar en ellas y hacer de Trobify un mejor sitio, nuestro equipo  conformado por 4 talentosos estudiantes, está interesado en hacer de este un mejor proyecto, y gracias a tu ayuda y comentarios, sin duda alguna lo lograremos</h5>
           
        </div>    
        </div>
      </div>
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