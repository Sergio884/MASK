<?php
  $idInmueble = $_GET['IdInmueble'];
  include('../db/dbconnection.php');

  $sql = "SELECT * FROM Inmueble WHERE IdInmueble=".$idInmueble."";
  $result = mysqli_query($conn, $sql);
  if(mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_assoc($result);
    $Costo = $row['Costo'];
  }
  $sql = "SELECT * FROM InmuebleFoto WHERE IdInmueble=".$idInmueble."";
  $result = mysqli_query($conn, $sql);
  if(mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_assoc($result);
    $imagen = $row['Foto'];
  }
 ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

	<style>
		.informacionPrincipal{
			-webkit-box-shadow: 2px 5px 19px -6px rgba(0,0,0,0.55);
    -moz-box-shadow: 2px 5px 19px -6px rgba(0,0,0,0.55);
    box-shadow: 2px 5px 19px -6px rgba(0,0,0,0.55);
    background-image: linear-gradient(to top,#00a3a8 0%, #017A80 90%);
			color: #F7FFFFFF;
		}
	</style>

	<script type="text/javascript">
		function calcularHipoteca(costo){
      document.getElementById("tabla").style.display = 'inline';
      var cantidad70 = parseInt(costo*0.7);
      document.getElementById("cantidad70").innerHTML= cantidad70;
      var cantidad90 = parseInt(costo*0.9);
      document.getElementById("cantidad90").innerHTML= cantidad90;
      var enganche70 = costo-cantidad70;
      document.getElementById("enganche70").innerHTML = enganche70;
      var enganche90 = costo-cantidad90;
      document.getElementById("enganche90").innerHTML = enganche90;
      var anios5 = document.getElementById("anios5");
      var anios10 = document.getElementById("anios10");
      var anios15 = document.getElementById("anios15");
      var anios20 = document.getElementById("anios20");
      var cantidad70 = parseInt(cantidad70*1.099);
      var cantidad90 = parseInt(cantidad90*1.104);
      if(anios5.checked){
        var pago70 = cantidad70 / 60;
        document.getElementById("pago70").innerHTML = parseInt(pago70);
        var pago90 = cantidad90 / 60;
        document.getElementById("pago90").innerHTML = parseInt(pago90);
      }
      else if(anios10.checked){
        var pago70 = cantidad70 / 120;
        document.getElementById("pago70").innerHTML = parseInt(pago70);
        var pago90 = cantidad90 / 120;
        document.getElementById("pago90").innerHTML = parseInt(pago90);
      }
      else if(anios15.checked){
        var pago70 = cantidad70 / 180;
        document.getElementById("pago70").innerHTML = parseInt(pago70);
        var pago90 = cantidad90 / 180;
        document.getElementById("pago90").innerHTML = parseInt(pago90);
      }
      else if(anios20.checked){
        var pago70 = cantidad70 / 240;
        document.getElementById("pago70").innerHTML = parseInt(pago70);
        var pago90 = cantidad90 / 240;
        document.getElementById("pago90").innerHTML = parseInt(pago90);
      }
		}
	</script>

    <title>Trobify</title>
  </head>
  <body>
    <main>
	
		<div class="container">
			<div class="row mb-3 form-group">
				<div class="col-md-2">
				</div>
				<div class="col-md-8 informacionPrincipal " style="border-radius:1rem; margin-top:1rem;">
        <center><h1>Simula tu hipoteca<sup>*</sup></h1></center>
					<div class="row mb-3 form-group">
						<div class="col-sm-6">
							<div class="row form-group">
								<div class="col-12">
									<center><h4>Costo del inmueble</h4></center>
								</div>
							</div>
							<div class="row mb-3 form-group">
								<div class="col-12">
									<input type="text" readonly class="form-control" id="costo" value="<?php echo($Costo); ?>">
								</div>
							</div>
							<div class="row form-group">
								<div class="col-12">
									<center><h4>Tiempo de pago</h4></center>
								</div>
							</div>
							<div class="row mb-3 form-group">
								<div class="col-md-4">
								</div>
								<div class="col-md-4">
									<div class="form-check">
										<input class="form-check-input" type="radio" id="anios5" name="anios">
										<label class="form-check-label" for="anios5">5 años</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" id="anios10" name="anios">
										<label class="form-check-label" for="anios10">10 años</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" id="anios15" name="anios">
										<label class="form-check-label" for="anios15">15 años</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" id="anios20" name="anios">
										<label class="form-check-label" for="anios20">20 años</label>
									</div>
								</div>
								<div class="col-md-4">
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="row mb-3 form-group">
								<div class="col-12">
									<center><img width="250" height="150" <?php echo "src=\"data:image/jpg;base64, ".base64_encode($imagen)."\""; ?> style="border-radius:1rem;"></center>
								</div>
							</div>
							<div class="row mb-3 form-group">
								<div class="col-12">
									<button class="w-100 btn btn-lg btn-light" onclick="calcularHipoteca(costo.value)">Calcular</button>
								</div>
							</div>
						</div>
					</div>
					<div class="row mb-3 form-group">
						<span id="tabla" style="display:none">
              <table class="table table-striped tab-sm">
                <thead class="thread-dark">
                  <tr>
                    <th>Porcentaje de prestamo</th>
                    <th>Cantidad de prestamo</th>
                    <th>Enganche mínimo</th>
                    <th>Tasa de Interés</th>
                    <th>Pago mensual total</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>70%</td>
                    <td>$<span id="cantidad70"></span></td>
                    <td>$<span id="enganche70"></span></td>
                    <td>9.90%</td>
                    <td>$<span id="pago70"></span></td>
                  </tr>
                  <tr>
                    <td>90%</td>
                    <td>$<span id="cantidad90"></span></td>
                    <td>$<span id="enganche90"></span></td>
                    <td>10.40%</td>
                    <td>$<span id="pago90"></span></td>
                  </tr>
                </tbody>
              </table>
            </span>
					</div>
          <center>*Para un mejor calculo le recomendamos consultar a su banco.</center>
				</div>
				<div class="col-md-2">
				</div>
			</div>
		</div>
	<main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  </body>
</html>
