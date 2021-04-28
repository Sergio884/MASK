<!doctype html>
<html lang="en">
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
          <span id="orden">
          <!--<button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
          <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="3" aria-label="Slide 4"></button>-->
          </span>
        </div>
        <div class="carousel-inner">
          <span id="imagenes">
          <!--
          <div class="carousel-item active">
            <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></svg>

            <div class="container">
              <div class="carousel-caption text-start">
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></svg>

            <div class="container">
              <div class="carousel-caption">
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></svg>

            <div class="container">
              <div class="carousel-caption text-end">
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></svg>

            <div class="container">
              <div class="carousel-caption text-end">
              </div>
            </div>
          </div>
        -->
        </span>
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
          <h1 id="Titulo">Aqui va el Titulo</h1>
          <h2><span  id="Costo">Aqui va el precio</span> <span id="Moneda">MX</span></h2>
          <h3> <span id="Estado">México</span> <span id="Ciudad">México</span> </h3>
          <h3><span id="Direccion">Juan Jose</span> <span id="CP">56883</span></h3>
          <p id="VentaRenta">Venta</p>
          <p id="TipoInmueble">Departamento</p>
          <p>Metros cuadrados: <span id="MetrosCuadrados">100</span>m²</p>
          <p>N&uacute;mero de dormitorios: <span id="NumeroDormitorio">2</span></p>
          <p>N&uacute;mero de baños: <span id="NumeroBanios">1</span></p>
          <p>Longitud: <span id="Longitud">100</span> Latitud<span id="Latitud">100</span></p>
          <p><b>Descripci&oacute;n de inmueble</b></p>
          <p id="Descripcion">Esta bonito </p>
        </div>
        <div class="col-md-5 col-lg-4 order-md-last informacionExtra">
          <center>
            <p><h2>Acciones</h2></p>
            <button type="button" class="w-100 btn btn-lg btn-light">Guardar a favoritos</button>
            <p></p>
            <button type="button" class="w-100 btn btn-lg btn-light">Mandar mensaje al vendedor</button>
          </center>
        </div>
      </div>

    </header>

    <?php
      $idInmueble = $_GET['IdInmueble'];

      $servername = "localhost";
      $username = "root";
      $password = "";

      $conn = mysqli_connect($servername, $username, $password);

      if(!$conn){
        die("Conexion fallida: ".mysqli_connect_error());
      }

      mysqli_select_db($conn, "MASK");

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
        $Visitas = $row['Visitas'];
        $Visitas = $Visitas + 1;
        echo "<script>
                document.getElementById(\"NumeroDormitorio\").innerHTML=\"".$NumeroDormitorio."\";
                document.getElementById(\"NumeroBanios\").innerHTML=\"".$NumeroBanios."\";
                if(\"".$VentaRenta."\"==\"1\"){
                  document.getElementById(\"VentaRenta\").innerHTML=\"Venta\";
                }
                else{
                  document.getElementById(\"VentaRenta\").innerHTML=\"Renta\";
                }
                document.getElementById(\"TipoInmueble\").innerHTML=\"".$TipoInmueble."\";
                if(\"".$TipoInmueble."\"==\"1\"){
                  document.getElementById(\"TipoInmueble\").innerHTML=\"Casa\";
                }
                else{
                  document.getElementById(\"TipoInmueble\").innerHTML=\"Departamento\";
                }
                document.getElementById(\"Titulo\").innerHTML=\"".$Titulo."\";
                document.getElementById(\"Estado\").innerHTML=\"".$Estado."\";
                document.getElementById(\"Ciudad\").innerHTML=\"".$Ciudad."\";
                document.getElementById(\"Direccion\").innerHTML=\"".$Direccion."\";
                document.getElementById(\"CP\").innerHTML=\"".$CP."\";
                document.getElementById(\"MetrosCuadrados\").innerHTML=\"".$MetrosCuadrados."\";
                document.getElementById(\"Descripcion\").innerHTML=\"".$Descripcion."\";
                document.getElementById(\"Costo\").innerHTML=\"".$Costo."\";
                if(\"".$Moneda."\"==\"1\"){
                  document.getElementById(\"Moneda\").innerHTML=\"Pesos mexicanos\";
                }
                else if(\"".$Moneda."\"==\"2\"){
                  document.getElementById(\"Moneda\").innerHTML=\"Dolar\";
                }
                else if(\"".$Moneda."\"==\"3\"){
                  document.getElementById(\"Moneda\").innerHTML=\"Euro\";
                }
                else if(\"".$Moneda."\"==\"4\"){
                  document.getElementById(\"Moneda\").innerHTML=\"Yen\";
                }
                document.getElementById(\"Longitud\").innerHTML=\"".$Longitud."\";
                document.getElementById(\"Latitud\").innerHTML=\"".$Latitud."\";
              </script>";
      }
      $sql = "UPDATE inmueble SET Visitas = ".$Visitas." WHERE idInmueble = ".$idInmueble."";
      if(mysqli_query($conn, $sql)){
      }
      $sql = "SELECT * FROM InmuebleFoto WHERE IdInmueble=".$idInmueble."";
      $result = mysqli_query($conn, $sql);
      if(mysqli_num_rows($result) > 0){
        $Texto = "<script>
          document.getElementById(\"orden\").innerHTML=\"<button type=\\\"button\\\" data-bs-target=\\\"#myCarousel\\\" data-bs-slide-to=\\\"0\\\" class=\\\"active\\\" aria-current=\\\"true\\\" aria-label=\\\"Slide 1\\\"></button>";
        $Contador = 1;
        while ($Contador < mysqli_num_rows($result)) {
          $Texto = $Texto."<button type=\\\"button\\\" data-bs-target=\\\"#myCarousel\\\" data-bs-slide-to=\\\"".$Contador."\\\" aria-label=\\\"Slide ".($Contador+1)."\\\"></button>";
          $Contador = $Contador + 1;
        }
        $Texto = $Texto."\";
                </script>";
        echo $Texto;
        $Activado = "active";
        $Texto = "<script>
          document.getElementById(\"imagenes\").innerHTML=\"";
        while($row = mysqli_fetch_array($result)){
            $Texto = $Texto."<div class=\\\"carousel-item ".$Activado."\\\"><img class=\\\"d-block w-100\\\" src=\\\"data:image/jpg;base64, ".base64_encode($row['Foto'])."\\\"></div>";
            $Activado = "";
        }
        $Texto = $Texto."\";
                </script>";
        echo $Texto;
      }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

  </body>
</html>
