

<?php include('../db/dbconnection.php') ?>


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
    <form onsubmit="return validar();" action="saveFormInmueble.php" method="POST" class="formulario" enctype="multipart/form-data" >
        <fieldset>
        <legend>¿Que tipo de alojamiento tienes?</legend>
           <div class="contenedor-campos" id="contenedor1">
                <div class="entradas titulo">
                    <label>Titulo</label>
                    <input name="titulo" placeholder="eje:Casa de dos pisos">
                </div>
                <div class="entradas alojamiento">
                    <label>¿Que tipo de propiedad tienes?</label>
                    <select name="tipoPropiedad" class="Lista">
                        <option value="1">Propiedad entera</option>
                        <option value="2">Propiedad compartida</option>
                        <option value="3">Departamento entero</option>
                        <option value="4">Departamento compartido</option>   
                    </select>
                </div>
                <div class="entradas tipoVenta">
                    <label>¿Cual es el tipo de venta?</label>
                    <select name="tipoVenta" class="Lista">
                        <option value="1">Renta</option>
                        <option value="0">Venta</option>       
                    </select>
                </div>
                <div class="entradas ">
                    <label>¿Cuantos Metros Cuadrados Tiene?</label>
                    <input name="metrosCuadrados"id="metrosCuadrados" placeholder="eje: 50 ">
                </div> 
                <div class="entradas ">
                    <label>¿Que Costo Tendra el Inmueble en Trobify?</label>
                    <input name="costo"id="costo" placeholder="eje: 1000000 ">
                </div> 
                <div class="entradas dormitorios">
                    <label>¿Cuantos dormitorios tiene la propiedad?</label>
                    <select name="numDormitorios"onchange="return validarMas();"  id="Dormitorio"class="Lista">
                        <option disabled selected="selected">0 Dormitorios</option>
                        <option value="1">1 Dormitorio</option>
                        <option value="2">2 Dormitorios</option>
                        <option value="3">3 Dormitorios</option>
                        <option value="4">4 Dormitorios</option>
                        <option value="5">5 Dormitorios</option>
                        <option value="-1">Mas Dormitorios</option>     
                    </select>
                    <input class="inputSelect" name="masDormitorio"id="masDormitorio"placeholder="Ejemplo: 10">    
                </div>
                <div class="entradas banios">
                    <label>¿Cuantos baños tiene la propiedad?</label>
                    <select name="numBanios" onchange="return validarMas();" id="Banios"class="Lista">
                        <option disabled selected="selected">0 Baños</option>
                        <option value="1">1 Baño</option>
                        <option value="2">2 Baños</option>
                        <option value="3">3 Baños</option>
                        <option value="4">4 Baños</option>
                        <option value="5">5 Baños</option>
                        <option value="-1">Mas Baños</option>     
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
                        <option value="Aguascalientes">Aguascalientes</option>
                        <option value="Baja California">Baja California</option>
                        <option value="Baja California Sur">Baja California Sur</option>
                        <option value="Campeche">Campeche</option>
                        <option value="Chiapas">Chiapas</option>
                        <option value="Chihuahua">Chihuahua</option>
                        <option value="CDMX">Ciudad de México</option>
                        <option value="Coahuila">Coahuila</option>
                        <option value="Colima">Colima</option>
                        <option value="Durango">Durango</option>
                        <option value="Estado de México">Estado de México</option>
                        <option value="Guanajuato">Guanajuato</option>
                        <option value="Guerrero">Guerrero</option>
                        <option value="Hidalgo">Hidalgo</option>
                        <option value="Jalisco">Jalisco</option>
                        <option value="Michoacán">Michoacán</option>
                        <option value="Morelos">Morelos</option>
                        <option value="Nayarit">Nayarit</option>
                        <option value="Nuevo León">Nuevo León</option>
                        <option value="Oaxaca">Oaxaca</option>
                        <option value="Puebla">Puebla</option>
                        <option value="Querétaro">Querétaro</option>
                        <option value="Quintana Roo">Quintana Roo</option>
                        <option value="San Luis Potosí">San Luis Potosí</option>
                        <option value="Sinaloa">Sinaloa</option>
                        <option value="Sonora">Sonora</option>
                        <option value="Tabasco">Tabasco</option>
                        <option value="Tamaulipas">Tamaulipas</option>
                        <option value="Tlaxcala">Tlaxcala</option>
                        <option value="Veracruz">Veracruz</option>
                        <option value="Yucatán">Yucatán</option>
                        <option value="Zacatecas">Zacatecas</option>
                    </select>
                </div>
                <div class="entradas ubicacion">
                    <label>¿Cual es la Ciudad de tu Inmueble?</label>
                    <input name="ciudad" id="Ubicacion"placeholder="Ecatepec De Morelos">
                </div>
                <div class="entradas direccion">
                    <label>¿Cual es la Dirección de tu Inmueble?</label>
                    <input name="direccion"id="Direccion"placeholder="eje: Av Bosques,52 ">
                </div>
                <div class="entradas cp">
                    <label>¿Cual es la CP de tu Inmueble? </label>
                    <input name="cp" id="CodigoPostal" placeholder="eje: 55243 ">
                </div> 
                
        </fieldset>
        <fieldset>
            <legend>características del Inmueble</legend>
            <div class="contenedor-campos3">
                <div class="entradas descripcion">
                    <label>Describe el Inmueble</label>
                    <textarea name="descripcion" rows="5"id="descripcion" placeholder="eje: Es un Inmueble de fachada azul... "></textarea>
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
            <input name="save_task"class="boton" type="submit" value="Enviar">
        </div>
                
    </form>
</body>
</html>

<!-- <input type="file" name="file[]" id="foto" value="Subir Foto" multiple> -->

<!-- <div class="entradas SubirFotos">
                    <label>Subir fotos del inmueble</label>
                    
                </div>   -->