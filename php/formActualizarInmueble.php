<?php 

$idInmueble = $_GET['IdInmueble'];
include('../db/dbconnection.php');

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

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../estilos/forms.css">
    <link rel="stylesheet" href="../estilos/gridInmueble.css">
    <script src="../JS/ValidacionFormInmueble.js"></script>
    <title>Document</title>
</head>
<body onload="return ocultar();"> <!-- action="saveFormInmueble.php" method="POST"-->
    <form onsubmit="return validar();" action="saveActualizarInmueble.php?IdInmueble=<?php echo($idInmueble) ?>"  method="POST" class="formulario" enctype="multipart/form-data" >
        <fieldset>
        <legend>¿Que tipo de alojamiento tienes?</legend>
           <div class="contenedor-campos" id="contenedor1">
                <div class="entradas titulo">
                    <label>Titulo</label>
                    <input name="titulo" value="<?php echo($Titulo);?>"placeholder="eje:Casa de dos pisos">
                </div>
                <div class="entradas alojamiento">
                    <label>¿Que tipo de propiedad tienes?</label>
                    <select name="tipoPropiedad" class="Lista">
                        <option value="1" <?php if($TipoInmueble=='1'){echo("selected");}?> >Propiedad entera</option>
                        <option value="2" <?php if($TipoInmueble=='2'){echo("selected");}?> >Propiedad compartida</option>
                        <option value="3" <?php if($TipoInmueble=='3'){echo("selected");}?> >Departamento entero</option>
                        <option value="4" <?php if($TipoInmueble=='4'){echo("selected");}?> >Departamento compartido</option>   
                    </select>
                </div>
                <div class="entradas tipoVenta">
                    <label>¿Cual es el tipo de venta?</label>
                    <select name="tipoVenta" class="Lista">
                        <option value="1" <?php if($VentaRenta=='1'){echo("selected");}?>>Renta</option>
                        <option value="0"  <?php if($VentaRenta=='2'){echo("selected");}?>>Venta</option>       
                    </select>
                </div>
                <div class="entradas ">
                    <label>¿Cuantos Metros Cuadrados Tiene?</label>
                    <input name="metrosCuadrados"id="metrosCuadrados" placeholder="eje: 50 " value="<?PHP echo($MetrosCuadrados)   ?>">
                </div> 
                <div class="entradas ">
                    <label>¿Que Costo Tendra el Inmueble en Trobify?</label>
                    <input name="costo"id="costo" placeholder="eje: 1000000 " value="<?PHP echo($Costo)?>">
                </div> 
                <div class="entradas dormitorios">
                    <label>¿Cuantos dormitorios tiene la propiedad?</label>
                    <select name="numDormitorios"onchange="return validarMas();"  id="Dormitorio"class="Lista">
                        <option disabled>0 Dormitorios</option>
                        <option value="1" <?php if($NumeroDormitorio=='1'){echo("selected");}?> >1 Dormitorio</option>
                        <option value="2" <?php if($NumeroDormitorio=='2'){echo("selected");}?> >2 Dormitorios</option>
                        <option value="3" <?php if($NumeroDormitorio=='3'){echo("selected");}?> >3 Dormitorios</option>
                        <option value="4" <?php if($NumeroDormitorio=='4'){echo("selected");}?> >4 Dormitorios</option>
                        <option value="5" <?php if($NumeroDormitorio=='5'){echo("selected");}?> >5 Dormitorios</option>
                        <?php if(intval($NumeroDormitorio)>5){?>
                            <option value="<?PHP echo($NumeroDormitorio)?>" selected ><?PHP echo($NumeroDormitorio)?> Dormitorios</option><?PHP } ?> 
                        <option value="-1" >Mas Dormitorios</option>     
                    </select>
                    <input class="inputSelect" name="masDormitorio"id="masDormitorio"placeholder="Ejemplo: 10" >    
                </div>
                <div class="entradas banios">
                    <label>¿Cuantos baños tiene la propiedad?</label>
                    <select name="numBanios" onchange="return validarMas();" id="Banios"class="Lista">
                        <option disabled selected="selected">0 Baños</option>
                        <option value="1" <?php if($NumeroBanios=='1'){echo("selected");}?> >1 Baño</option>
                        <option value="2" <?php if($NumeroBanios=='2'){echo("selected");}?> >2 Baños</option>
                        <option value="3" <?php if($NumeroBanios=='3'){echo("selected");}?> >3 Baños</option>
                        <option value="4" <?php if($NumeroBanios=='4'){echo("selected");}?> >4 Baños</option>
                        <option value="5" <?php if($NumeroBanios=='5'){echo("selected");}?> >5 Baños</option>
                        <?php if(intval($NumeroBanios)>5){?>
                            <option value="<?PHP echo($NumeroBanios)?>" selected ><?PHP echo($NumeroBanios)?> Baños</option><?PHP } ?> 
                        <option value="-1" >Mas Baños</option>     
                    </select>
                    <input class="inputSelect" name="masBanios"id="masBanios"type="number" placeholder="eje: 10">    
                </div>
                
            </div>
        </fieldset>
        <fieldset>
            <legend>Ubicacion del Inmueble</legend>
            <div class="contenedor-campos2">
                <div class="entradas estado">
                    <label>¿Estado de la República donde Encuentra?</label>
                    <select name="estado"class="Lista" id="Estado"name="estado">
                        <option disabled selected="selected">Seleccione uno...</option>
                        <option value="Aguascalientes" <?php if($Estado=='Aguascalientes'){echo("selected");}?> >Aguascalientes</option>
                        <option value="Baja California" <?php if($Estado=='Baja California'){echo("selected");}?> >Baja California</option>
                        <option value="Baja California Sur" <?php if($Estado=='Baja California Sur'){echo("selected");}?> >Baja California Sur</option>
                        <option value="Campeche" <?php if($Estado=='Campeche'){echo("selected");}?> >Campeche</option>
                        <option value="Chiapas" <?php if($Estado=='Chiapas'){echo("selected");}?> >Chiapas</option>
                        <option value="Chihuahua" <?php if($Estado=='Chihuahua'){echo("selected");}?> >Chihuahua</option>
                        <option value="CDMX" <?php if($Estado=='CDMX'){echo("selected");}?> >Ciudad de México</option>
                        <option value="Coahuila" <?php if($Estado=='Coahuila'){echo("selected");}?> >Coahuila</option>
                        <option value="Colima" <?php if($Estado=='Colima'){echo("selected");}?> >Colima</option>
                        <option value="Durango" <?php if($Estado=='Durango'){echo("selected");}?> >Durango</option>
                        <option value="Estado de México" <?php if($Estado=='Estado de México'){echo("selected");}?> >Estado de México</option>
                        <option value="Guanajuato" <?php if($Estado=='Guanajuato'){echo("selected");}?> >Guanajuato</option>
                        <option value="Guerrero" <?php if($Estado=='Guerrero'){echo("selected");}?> >Guerrero</option>
                        <option value="Hidalgo" <?php if($Estado=='Hidalgo'){echo("selected");}?> >Hidalgo</option>
                        <option value="Jalisco" <?php if($Estado=='Jalisco'){echo("selected");}?> >Jalisco</option>
                        <option value="Michoacán" <?php if($Estado=='Michoacán'){echo("selected");}?> >Michoacán</option>
                        <option value="Morelos" <?php if($Estado=='Morelos'){echo("selected");}?> >Morelos</option>
                        <option value="Nayarit" <?php if($Estado=='Nayarit'){echo("selected");}?> >Nayarit</option>
                        <option value="Nuevo León" <?php if($Estado=='Nuevo León'){echo("selected");}?> >Nuevo León</option>
                        <option value="Oaxaca" <?php if($Estado=='Oaxaca'){echo("selected");}?> >Oaxaca</option>
                        <option value="Puebla" <?php if($Estado=='Puebla'){echo("selected");}?> >Puebla</option>
                        <option value="Querétaro" <?php if($Estado=='Querétaro'){echo("selected");}?> >Querétaro</option>
                        <option value="Quintana Roo" <?php if($Estado=='Quintana Roo'){echo("selected");}?> >Quintana Roo</option>
                        <option value="San Luis Potosí" <?php if($Estado=='San Luis Potosí'){echo("selected");}?> >San Luis Potosí</option>
                        <option value="Sinaloa" <?php if($Estado=='Sinaloa'){echo("selected");}?> >Sinaloa</option>
                        <option value="Sonora" <?php if($Estado=='Sonora'){echo("selected");}?> >Sonora</option>
                        <option value="Tabasco" <?php if($Estado=='Tabasco'){echo("selected");}?> >Tabasco</option>
                        <option value="Tamaulipas" <?php if($Estado=='Tamaulipas'){echo("selected");}?> >Tamaulipas</option>
                        <option value="Tlaxcala" <?php if($Estado=='Tlaxcala'){echo("selected");}?> >Tlaxcala</option>
                        <option value="Veracruz" <?php if($Estado=='Veracruz'){echo("selected");}?> >Veracruz</option>
                        <option value="Yucatán" <?php if($Estado=='Yucatán'){echo("selected");}?> >Yucatán</option>
                        <option value="Zacatecas" <?php if($Estado=='Zacatecas'){echo("selected");}?> >Zacatecas</option>
                    </select>
                </div>
                <div class="entradas ubicacion">
                    <label>¿Cual es la Ciudad de tu Inmueble?</label>
                    <input name="ciudad" id="Ubicacion"placeholder="Ecatepec De Morelos" value="<?PHP echo($Ciudad)?>">
                </div>
                <div class="entradas direccion">
                    <label>¿Cual es la Dirección de tu Inmueble?</label>
                    <input name="direccion"id="Direccion"placeholder="eje: Av Bosques,52 " value="<?PHP echo($Direccion)?>">
                </div>
                <div class="entradas cp">
                    <label>¿Cual es la CP de tu Inmueble? </label>
                    <input name="cp" id="CodigoPostal" placeholder="eje: 55243 " value="<?PHP echo($CP)?>">
                </div> 
                
        </fieldset>
        <fieldset>
            <legend>características del Inmueble</legend>
            <div class="contenedor-campos3">
                <div class="entradas descripcion">
                    <label>Describe el Inmueble</label>
                    <textarea name="descripcion" rows="5"id="descripcion" placeholder="eje: Es un Inmueble de fachada azul... " > <?PHP echo($Descripcion)?> </textarea>
                </div>
                <div class="entradas SubirFotos">
                    <label>Sube imagenes para tu inmueble</label>
                        <div class="div_file"id="div_file">
                            <p class="txtBtn"id="texto">Subir imagenes</p>
                            <input class="btn_enviar"id="btn_enviar" name="file[]"  type="file" multiple/>
                        </div>
                </div>
            </div>
        </fieldset>
        <div class="entradas">
            <input name="save_task"class="boton" type="submit" value="Actualizar">
        </div>
                
    </form>
</body>
</html>