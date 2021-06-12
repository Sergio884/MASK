<?php
     include("../db/db.php");   

    if(!isset($_SESSION['usuario'])){
       echo 'Usuario no encontrado';
    }
    $usuario = $_SESSION['usuario'];
    $queryUsu = "SELECT * FROM usuario WHERE Usuario = '$usuario'";
    $resultUsu = mysqli_query($conn, $queryUsu);
    if(!$resultUsu){
        echo 'query failed';
    }else{
    if(mysqli_num_rows($resultUsu) > 0){
        $rowUsu = mysqli_fetch_assoc($resultUsu);
        $idUsu = $rowUsu['IdUsuario'];
    }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Favoritos</title>
    <!--BOOSTRAP 4-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!--Font awesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <link rel="stylesheet" href="../estilos/buscar.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js" type="text/javascript"></script>
</head>
<body>

<div class="container">
    <br>
    <!--HEADER-->
    <h1>Favoritos</h1>
    <!--CARDS INMUEBLES-->
    <?php 
        $query = "SELECT inmueble.idInmueble, Titulo, Estado, Costo, (SELECT Foto FROM inmueblefoto WHERE inmueblefoto.idInmueble = inmueble.idInmueble LIMIT 1) AS fotos FROM inmueble, favoritos WHERE Estado like '%%' AND TipoInmueble like '%%' AND NumeroDormitorios like '%%' AND VentaRenta like '%%' AND inmueble.idInmueble = favoritos.idInmueble AND favoritos.IdUsuario = $idUsu";    
        $result = mysqli_query($conn, $query);
        if(!$result){
            echo 'query failed';
        }
        if(mysqli_num_rows($result) < 1){
            echo 'No se encontraron datos';
        }else{
    ?>
    <div class="row row-cols-1 row-cols-md-3">
        <?php
        while($row = mysqli_fetch_array($result)){
        ?>
            <div class='col mb-3'>
            <div class='card'>
            <img src='data:image/jpg;base64,<?php echo base64_encode($row['fotos']); ?>' height='200' class='card-img-top'>
            <div class='card-body'>
                    <h5 class='card-title'><?=$row['Titulo'] ?></h5>
                    <h6>Estado: <?=$row['Estado'] ?></h6>
                    <p><span class='badge badge-pill badge-secondary'>$ <?= number_format($row['Costo'])?> MXN</span></p>
                    <a href='Publicacion.php?IdInmueble=<?=$row['idInmueble'] ?>' class='btn btn-primary'>Ver inmueble</a>
                    <a href='favoritosDelete.php?id=<?=$row['idInmueble'] ?>&idUsu=<?=$idUsu?>' class='btn btn-danger'>Eliminar de favoritos</a>
                </div>
            </div>
        </div>
        <?php    
        }
        }
        ?>
    </div>
</div>
<!--SCRIPTS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
</body>
</html>

    