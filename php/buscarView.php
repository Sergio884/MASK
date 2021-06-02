<?php
    include("db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Busqueda de inmuebles</title>
    <!--BOOSTRAP 4-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!--Font awesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <link rel="stylesheet" href="../estilos/buscar.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js" type="text/javascript"></script>
</head>
<body>
<!--HEADER-->
<header class="imagenFondo">
    <div class="container">
        <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
            <h1 class="display-4 textoPrincipal">Buscar Inmuebles</h1>
            <div class="container">
            <p class="texto">En Trobify puedes encontrar gran variedad de casas y departamentos<br> que se ajustan a tus necesidades alrededor de todo México. <br>¡Comienza ahora tu experiencia en el mundo de Trobify!</p>
            </div>
        </div>
         <!--FILTROS DE BUSQUEDA-->
         <div class="row">
                    <div class="col-md-3">
                        <select name="estado" id="estado" class="form-control">
                            <option value="%%">Estado...</option>
                            <option value="Aguascalientes">Aguascalientes</option>
                            <option value="Baja California">Baja California</option>
                            <option value="Baja California Sur">Baja California Sur</option>
                            <option value="Campeche">Campeche</option>
                            <option value="Chiapas">Chiapas</option>
                            <option value="Chihuahua">Chihuahua</option>
                            <option value="Ciudad de Mexico">Ciudad de México</option>
                            <option value="Coahuila">Coahuila</option>
                            <option value="Colima">Colima</option>
                            <option value="Durango">Durango</option>
                            <option value="Estado de Mexico">Estado de México</option>
                            <option value="Guanajuato">Guanajuato</option>
                            <option value="Guerrero">Guerrero</option>
                            <option value="Hidalgo">Hidalgo</option>
                            <option value="Jalisco">Jalisco</option>
                            <option value="Michoacán">Michoacán</option>
                            <option value="Morelos">Morelos</option>
                            <option value="Nayarit">Nayarit</option>
                            <option value="Nuevo Leon">Nuevo León</option>
                            <option value="Oaxaca">Oaxaca</option>
                            <option value="Puebla">Puebla</option>
                            <option value="Querétaro">Querétaro</option>
                            <option value="Quintana Roo">Quintana Roo</option>
                            <option value="San Luis Potosi">San Luis Potosí</option>
                            <option value="Sinaloa">Sinaloa</option>
                            <option value="Sonora">Sonora</option>
                            <option value="Tabasco">Tabasco</option>
                            <option value="Tamaulipas">Tamaulipas</option>
                            <option value="Tlaxcala">Tlaxcala</option>
                            <option value="Veracruz">Veracruz</option>
                            <option value="Yucatan">Yucatán</option>
                            <option value="Zacatecas">Zacatecas</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select name="tipo" id="tipo" class="form-control">
                            <option value="%%">Tipo...</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select name="dormitorios" id="dormitorios" class="form-control">
                            <option value="%%">Dormitorios...</option>
                            <option value="2">2</option>
                            <option value="6">6</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select name="venta" id="venta" class="form-control">
                            <option value="%%">Venta...</option>
                        </select>
                    </div>
                    <div class="col-md-1">
                        <button type="button" class="btn btn-primary botonesPrincipales" id="boton">Buscar</button>
                    </div>
                    <div class="col-md-1">
                        <button type="button" class="btn btn-danger botonesPrincipales" id="clear">Limpiar</button>
                    </div>
                </div>
    </div>
    
</header>
<?php/* 
               $querynav = "SELECT * FROM inmueble"; 
               $result_in = mysqli_query($conn, $querynav);
               $num = mysqli_num_rows($result_in);
    */?>
<div class="container">
   
        <br>
        <!--CARDS INMUEBLES-->
        <div class="row row-cols-1 row-cols-md-3" id="contenido"></div>
    </div>



    <script type="text/javascript">

    $('#clear').click(function(data){
        document.getElementById('estado').value = '%%';
        document.getElementById('tipo').value = '%%';
        document.getElementById('dormitorios').value = '%%';
        document.getElementById('venta').value = '%%';
        $('#contenido').html(data);
    });

    
    $('#boton').click(function(){
        var estado = document.getElementById('estado').value;
        var tipo = document.getElementById('tipo').value;
        var dormitorios = document.getElementById('dormitorios').value;
        var venta = document.getElementById('venta').value;

        var ruta = "estado="+estado+"&tipo="+tipo+"&dormitorios="+dormitorios+"&venta="+venta;
            $.ajax({
                url: "buscarAJAX.php",
                type: 'POST',
                data: ruta,
            })
            .done(function(data){
                $('#contenido').html(data);
            })
            .fail(function(){
                console.log("error");
            });
        });

    //Cambiar el color del boton usando session
    function favoritos(indice){

        var estado = document.getElementById('estado').value;
        var tipo = document.getElementById('tipo').value;
        var dormitorios = document.getElementById('dormitorios').value;
        var venta = document.getElementById('venta').value;

        var ruta = "estado="+estado+"&tipo="+tipo+"&dormitorios="+dormitorios+"&venta="+venta+"&indice="+indice;
        
            $.ajax({
                url: "buscarAJAX.php",
                type: 'POST',
                data: ruta,
            })
            .done(function(data){
                $('#contenido').html(data);
            })
            .fail(function(){
                console.log("error");
            });
        }
        </script>
<!--SCRIPTS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
</body>
</html>

    