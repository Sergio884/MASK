<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>MASK</title>
  <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../estilos/estiloLogin.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
  </head>   
  <body>
  <?php session_start(); 
      $idInmueble = "1";
      $vendedor = "defe";
  ?>
    <a href="chat.php?receptor=<?php echo $vendedor; ?>&idInmueble=<?php echo $idInmueble; ?>">Contactar</a>
  </body>
</html>