<?php
  $idReceptor = $_GET['receptor'];
  $idInmueble = $_GET['idInmueble'];
 ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

    <title>Trobify</title>
    <script type="text/javascript">
      function showHint(fecha, hora){
        if(fecha<="<?php echo date("Y-m-d"); ?>"){
          alert("La fecha no es valida");
        }
        else{
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function(){
            if (this.readyState == 4 && this.status == 200){
              alert(this.responseText);
            }
          };
          xmlhttp.open("GET","registrarVisita.php?receptor=<?php echo $idReceptor; ?>&idInmueble=<?php echo $idInmueble; ?>&fecha="+fecha+"&hora="+hora,true);
          xmlhttp.send();
        }
      }
    </script>
  </head>
  <body class="py-4">
    <main>
      <center><h1>Crear cita para visita</h1></center>
        <div class="container">
          <div class="row mb-3 form-group">
            <div class="col-md-3">
            </div>
            <div class="col-md-6">
              <div class="row mb-3 form-group">
                <div class="col-6">
                  <label for="Fecha">Fecha:</label>
                  <input type="date" class="form-control" id="Fecha">
                </div>
                <div class="col-6">
                  <label for="Hora">Hora:</label>
                  <input type="time" class="form-control" id="Hora">
                </div>
              </div>
              <div class="row mb-3 form-group">
                <div class="col-12">
                  <button class="w-100 btn btn-lg btn-primary" onclick="showHint(Fecha.value, Hora.value)">Crear</button>
                </div>
              </div>
              <div class="row mb-3 form-group">
                <div class="col-12">
                  Le recomendamos que, antes de crear una cita, p&oacute;ngase en contacto con el vendedor del inmueble.
                </div>
              </div>
            </div>
            <div class="col-md-6">
            </div>
          </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
  </body>
</html>
