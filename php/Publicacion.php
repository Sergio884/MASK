<?php
  $idInmueble = $_GET['IdInmueble'];
  include('dbconnection.php');

  /*Información del inmueble*/
  $sql = "SELECT * FROM Inmueble WHERE IdInmueble=".$idInmueble."";
  $result = mysqli_query($connection, $sql);
  if(mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_assoc($result);
    $NumeroDormitorio = $row['NumeroDormitorios'];
    $NumeroBanios = $row['NumeroBanios'];
    $VentaRenta = $row['VentaRenta'];
    $TipoInmueble = $row['TipoInmueble'];
    $Titulo = $row['Titulo'];
    $Estado = $row['Estado'];
    $Ciudad = $row['Ciudad'];
    $Direccion = $row['Direccion'];
    $CP = $row['CP'];
    $MetrosCuadrados = $row['MetrosCuadrados'];
    $Descripcion = $row['Descripcion'];
    $Costo = $row['Costo'];
    $Moneda = $row['Moneda'];
    $Longitud = $row['Longitud'];
    $Latitud = $row['Latitud'];
    $IdUsuario = $row['IdUsuario'];
    $Visitas = $row['Visitas'];
    $Visitas = $Visitas + 1;
  }

  /*Información del vendedor*/
  $sql = "UPDATE inmueble SET Visitas = ".$Visitas." WHERE idInmueble = ".$idInmueble."";
  if(mysqli_query($connection, $sql)){
  }
  $sql = "SELECT * FROM Usuario WHERE IdUsuario = ".$IdUsuario."";
  $result = mysqli_query($connection, $sql);
  if(mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_assoc($result);
    $Usuario = $row['Usuario'];
    $Correo = $row['Correo'];
    $Calificacion = $row['Calificacion'];
    $Telefono = $row['Telefono'];
    $ImagenUsuario = $row['FotoUsuario'];
    if($Calificacion < 0.5){
      $Calificacion = "<img src=\"../imagenes/estrella00.png\">";
    }
    elseif ($Calificacion < 1) {
      $Calificacion = "<img src=\"../imagenes/estrella05.png\">";
    }
    elseif ($Calificacion < 1.5) {
      $Calificacion = "<img src=\"../imagenes/estrella10.png\">";
    }
    elseif ($Calificacion < 2) {
      $Calificacion = "<img src=\"../imagenes/estrella15.png\">";
    }
    elseif ($Calificacion < 2.5) {
      $Calificacion = "<img src=\"../imagenes/estrella20.png\">";
    }
    elseif ($Calificacion < 3) {
      $Calificacion = "<img src=\"../imagenes/estrella25.png\">";
    }
    elseif ($Calificacion < 3.5) {
      $Calificacion = "<img src=\"../imagenes/estrella30.png\">";
    }
    elseif ($Calificacion < 4) {
      $Calificacion = "<img src=\"../imagenes/estrella35.png\">";
    }
    elseif ($Calificacion < 4.5) {
      $Calificacion = "<img src=\"../imagenes/estrella40.png\">";
    }
    elseif ($Calificacion < 4.8) {
      $Calificacion = "<img src=\"../imagenes/estrella45.png\">";
    }
    else {
      $Calificacion = "<img src=\"../imagenes/estrella50.png\">";
    }
  }
 ?>
<html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/carousel/">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .informacionExtra{
        background-color: #2CCABD;
        color: #FFFFFF;
      }

    </style>
    <link href="../estilos/carousel.css" rel="stylesheet">

    <title>Trobify</title>
  </head>
  <body>
    <header>
      <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <?php
            /*Información de las imagenes*/
            $sql = "SELECT * FROM InmuebleFoto WHERE IdInmueble=".$idInmueble."";
            $result = mysqli_query($connection, $sql);
            if(mysqli_num_rows($result) > 0){
              echo "<button type=\"button\" data-bs-target=\"#myCarousel\" data-bs-slide-to=\"0\" class=\"active\" aria-current=\"true\" aria-label=\"Slide 1\"></button>";
              $Contador = 1;
              while($Contador < mysqli_num_rows($result)){
                echo "<button type=\"button\" data-bs-target=\"#myCarousel\" data-bs-slide-to=\"".$Contador."\" aria-label=\"Slide ".($Contador+1)."\"></buton>";
                $Contador = $Contador + 1;
              }
            }
           ?>
        </div>
        <div class="carousel-inner">
          <?php
            /*Información de las imagenes*/
            $Activado = "active";
            while ($row = mysqli_fetch_array($result)) {
              echo "<div class=\"carousel-item ".$Activado."\"><img class=\"d-block w-100\" src=\"data:image/jpg;base64, ".base64_encode($row['Foto'])."\"></div>";
              $Activado = "";
            }
           ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
      <div class="row g-3">
        <div class="col-md-7 col-lg-8">
          <h1><?php echo $Titulo; ?></h1>
          <h2>$<?php echo $Costo; ?></h2>
          <h3><?php echo $Estado; ?> <?php echo $Ciudad; ?></h3>
          <h3><?php echo $Direccion; ?> <?php echo $CP; ?></h3>
          <p><?php if($VentaRenta == 1){echo "Venta";}else{echo "Renta";} ?></p>
          <p><?php if($TipoInmueble == 1){echo "Casa";}else{echo "Departamento";} ?></p>
          <p>Metros cuadrados: <?php echo $MetrosCuadrados; ?>m²</p>
          <p>N&uacute;mero de dormitorios: <?php echo $NumeroDormitorio; ?></p>
          <p>N&uacute;mero de baños: <?php echo $NumeroBanios; ?></p>
          <p>Longitud: <?php echo $Longitud; ?> Latitud: <?php echo $Latitud; ?></p>
          <p><b>Descripci&oacute;n de inmueble</b></p>
          <p><?php echo $Descripcion; ?></p>
        </div>
        <div class="col-md-5 col-lg-4 order-md-last informacionExtra">
          <center>
            <p><img width="250" height="250" <?php echo "src=\"data:image/jpg;base64, ".base64_encode($ImagenUsuario)."\""; ?>></p>
            <p><h2><?php echo $Usuario; ?></h2></p>
            <p><?php echo $Calificacion; ?></p>
            <p><h4><?php echo $Correo; ?></h4></p>
            <p><h4><?php echo $Telefono; ?></h4></p>
            <?php echo "<a href=\"./enviarMensaje.php?receptor=".$Usuario."&IdInmueble=".$idInmueble."\">"; ?><button type="button" class="w-100 btn btn-lg btn-light">Mandar mensaje al vendedor</button></a>
            <p></p>
            <button type="button" class="w-100 btn btn-lg btn-light">Guardar a favoritos</button>
            <p></p>
            <p></p>
          </center>
        </div>
      </div>
    </header>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  </body>
</html>
