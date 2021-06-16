<?php
  $idInmueble = $_GET['IdInmueble'];
  include('../db/dbconnection.php');

  /*Información del inmueble*/
  $sql = "SELECT * FROM Inmueble WHERE IdInmueble=".$idInmueble."";
  $result = mysqli_query($conn, $sql);
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

  /*Conteo de Visitas*/
  $sql = "UPDATE Inmueble SET Visitas = ".$Visitas." WHERE IdInmueble = ".$idInmueble."";
  if(mysqli_query($conn, $sql)){
  }
  /*Historial de visitas*/
  session_start();
  if(isset($_SESSION['usuario'])){
    $miUsuario = $_SESSION['usuario'];
    $sql = "SELECT * FROM Usuario WHERE Usuario='".$miUsuario."' OR Correo='".$miUsuario."';";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
      $row = mysqli_fetch_assoc($result);
      $miIdUsuario = $row['IdUsuario'];
      $sql = "SELECT * FROM Historial WHERE IdUsuario = '".$miIdUsuario."' AND IdInmueble = '".$idInmueble."';";
      $result = mysqli_query($conn, $sql);
      if(mysqli_num_rows($result) > 0){
        $sql = "UPDATE Historial SET Fecha ='".date("y-m-d")."' WHERE IdUsuario = '".$miIdUsuario."' AND IdInmueble = '".$idInmueble."';";
        if(mysqli_query($conn,$sql)){
        }
      }
      else{
        $sql = "INSERT INTO Historial(IdUsuario, IdInmueble, Fecha) VALUES('".$miIdUsuario."','".$idInmueble."','".date("y-m-d")."');";
        if(mysqli_query($conn,$sql)){
        }
      }
    }
  }
  /*Información del vendedor*/
  $sql = "SELECT * FROM Usuario WHERE IdUsuario = ".$IdUsuario."";
  $result = mysqli_query($conn, $sql);
  if(mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_assoc($result);
    $Usuario = $row['Usuario'];
    $Correo = $row['Correo'];
    $Calificacion = $row['Calificacion'];
    $Telefono = $row['Telefono'];
    $ImagenUsuario = $row['FotoUsuario'];
    if($Calificacion >= 4.5){
      $Calificacion = "<img src=\"../imagenes/estrella50.png\">";
    }
    elseif ($Calificacion > 4) {
      $Calificacion = "<img src=\"../imagenes/estrella45.png\">";
    }
    elseif ($Calificacion > 3.5) {
      $Calificacion = "<img src=\"../imagenes/estrella40.png\">";
    }
    elseif ($Calificacion > 3) {
      $Calificacion = "<img src=\"../imagenes/estrella35.png\">";
    }
    elseif ($Calificacion > 2.5) {
      $Calificacion = "<img src=\"../imagenes/estrella30.png\">";
    }
    elseif ($Calificacion > 2) {
      $Calificacion = "<img src=\"../imagenes/estrella25.png\">";
    }
    elseif ($Calificacion > 1.5) {
      $Calificacion = "<img src=\"../imagenes/estrella20.png\">";
    }
    elseif ($Calificacion > 1) {
      $Calificacion = "<img src=\"../imagenes/estrella15.png\">";
    }
    elseif ($Calificacion > 0.5) {
      $Calificacion = "<img src=\"../imagenes/estrella10.png\">";
    }
    elseif ($Calificacion > 0) {
      $Calificacion = "<img src=\"../imagenes/estrella05.png\">";
    }
    else {
      $Calificacion = "<img src=\"../imagenes/estrella00.png\">";
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
        -webkit-box-shadow: 2px 5px 19px -6px rgba(0,0,0,0.55);
       -moz-box-shadow: 2px 5px 19px -6px rgba(0,0,0,0.55);
        box-shadow: 2px 5px 19px -6px rgba(0,0,0,0.55);
        background-image: linear-gradient(to top,#017A80 0%, #00a3a8 90%);
        border-radius: 0.5rem;
        /* padding-right: 1rem; */
        width: 26rem;
        color: #FFFFFF;
      }

    #map{
      height: 500px;
      width: 98%;
    }

    </style>
    <link href="../estilos/carousel.css" rel="stylesheet">

    <title>Trobify</title>
    <script type="text/javascript">
      function favorito(){
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function(){
            if (this.readyState == 4 && this.status == 200){
              alert(this.responseText);
            }
          };
          xmlhttp.open("GET","agregarFavorito.php?idInmueble=<?php echo $idInmueble; ?>",true);
          xmlhttp.send();
      }
    </script>
  </head>
  <body>
    <header>
      <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <?php
            /*Información de las imagenes*/
            $sql = "SELECT * FROM InmuebleFoto WHERE IdInmueble=".$idInmueble."";
            $result = mysqli_query($conn, $sql);
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
          <h3><?php echo $Estado; ?>, <?php echo $Ciudad; ?></h3>
          <h3><?php echo $Direccion; ?>. C.P.: <?php echo $CP; ?></h3>
          <div class="form-group row">
            <div class="col-sm-12">
              <input type="text" readonly class="form-control-plaintext form-control-lg" value="<?php if($VentaRenta == 0){echo "Venta";}else{echo "Renta";} ?>">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-12">
              <input type="text" readonly class="form-control-plaintext form-control-lg" value="<?php if($TipoInmueble == 1){echo "Propiedad Entera";} if($TipoInmueble == 2){echo "Propiedad Compartida";} if($TipoInmueble == 3){echo "Departamento Entero";} if($TipoInmueble == 4){echo "Departamento Compartido";} ?>">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-5">
              <input type="text" readonly class="form-control-plaintext form-control-lg"  value="Metros Cuadrados:">
            </div>
            <div class="col-sm-7">
              <input type="text" readonly class="form-control-plaintext form-control-lg" value="<?php echo $MetrosCuadrados; ?>m²">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-5">
              <input type="text" readonly class="form-control-plaintext form-control-lg"  value="N&uacute;mero de dormitorios:">
            </div>
            <div class="col-sm-7">
              <input type="text" readonly class="form-control-plaintext form-control-lg" value="<?php echo $NumeroDormitorio; ?>">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-5">
              <input type="text" readonly class="form-control-plaintext form-control-lg"  value="N&uacute;mero de baños:">
            </div>
            <div class="col-sm-7">
              <input type="text" readonly class="form-control-plaintext form-control-lg" value="<?php echo $NumeroBanios; ?>">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-3">
              <input type="text" readonly class="form-control-plaintext form-control-lg"  value="Longitud:">
            </div>
            <div class="col-sm-2">
              <input type="text" readonly class="form-control-plaintext form-control-lg"  value="<?php echo $Longitud; ?>">
            </div>
            <div class="col-sm-3">
              <input type="text" readonly class="form-control-plaintext form-control-lg" value="Latitud:">
            </div>
            <div class="col-sm-2">
              <input type="text" readonly class="form-control-plaintext form-control-lg" value="<?php echo $Latitud; ?>">
            </div>
          </div>
          <p><b><h4>Descripci&oacute;n de inmueble</h4></b></p>
          <div class="form-group">
            <textarea readonly class="form-control" rows="25"><?php echo $Descripcion; ?></textarea>
          </div>
        </div>
        <div class="col-md-5 col-lg-4 order-md-last informacionExtra">
          <center>
            <p><img width="250" height="250" <?php echo "src=\"data:image/jpg;base64, ".base64_encode($ImagenUsuario)."\""; ?>></p>
            <p><h2><?php echo $Usuario; ?></h2></p>
            <p><?php echo $Calificacion; ?></p>
            <p><h4><?php echo $Correo; ?></h4></p>
            <p><h4><?php echo $Telefono; ?></h4></p>
            <?php echo "<a href=\"./enviarMensaje.php?receptor=".$Usuario."&idInmueble=".$idInmueble."\">"; ?><button type="button" class="w-100 btn btn-lg btn-light">Mandar mensaje al vendedor</button></a>
            <p></p>
            <button type="button" class="w-100 btn btn-lg btn-light" onclick="favorito()">Guardar a favoritos</button>
            <p></p>
            <p></p>
            <?php echo "<a href=\"./SimuladorHipotecas.php?IdInmueble=".$idInmueble."\""; ?><button type="button" class="w-100 btn btn-lg btn-light">Simular hipoteca</button></a>
            <p></p>
            <p></p>
          </center>
        </div>
      </div>
    </header>

    <!--MAPA-->
    <br>
    <center>
    <div id="map"></div>
    </center>
    <script>
        function iniciarMap(){
        var coord = {lat:<?= $Longitud ?> ,lng: <?= $Latitud ?>};
        var map = new google.maps.Map(document.getElementById('map'),{
            zoom: 10,
            center: coord
        });
        var marker = new google.maps.Marker({
            position: coord,
            map: map
        });
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDMYIaquzXvBkCejCll1ZxSgCmWbjiRO5g&callback=iniciarMap"></script>
    <!--MAPA-->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  </body>
</html>
