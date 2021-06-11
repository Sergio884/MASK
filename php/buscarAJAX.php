<?php
    include("db.php");
    
    //USUARIO LOGGEADO
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


    $estado = $_POST['estado'];
    $tipo = $_POST['tipo'];
    $dorm = $_POST['dormitorios'];
    $venta = $_POST['venta'];
    //QUERY BUSQUEDA
    $querysearch = "SELECT idInmueble, Titulo, Estado, Costo, (SELECT Foto FROM inmueblefoto WHERE inmueblefoto.idInmueble = inmueble.idInmueble LIMIT 1) AS fotos FROM inmueble WHERE Estado like '$estado' AND TipoInmueble like '$tipo' AND NumeroDormitorios like '$dorm' AND VentaRenta like '$venta'";    
    //QUERY FAVORITOS
    $queryFav = "SELECT * FROM favoritos WHERE idUsuario = $idUsu";
    $resultFav = mysqli_query($conn, $queryFav); 
    $result_search = mysqli_query($conn, $querysearch);

    $arrayFav = Array();
    while($rowFav = mysqli_fetch_array($resultFav)){
        $arrayFav[] = $rowFav['idInmueble'];
    }

    if(isset($_POST['indice'])){
        $id = $_POST['indice'];
        if(in_array($id, $arrayFav)){
            $queryInFav ="DELETE FROM favoritos WHERE idInmueble = $id AND idUsuario = $idUsu";
            $resultInFav = mysqli_query($conn, $queryInFav);
        }else{
            $queryInFav = "INSERT INTO favoritos VALUES (null, $id, $idUsu)";
            $resultInFav = mysqli_query($conn, $queryInFav);
        }
        $arrayFav = Array();
        $resultFav = mysqli_query($conn, $queryFav); 
        while($rowFav = mysqli_fetch_array($resultFav)){
            $arrayFav[] = $rowFav['idInmueble'];
        }
    }
    if(!$result_search){
        echo 'query failed';
    }
    if(mysqli_num_rows($result_search) <1){
        echo 'No se encontraron datos';
    }else{
        while($row = mysqli_fetch_array($result_search)){
            //comprobar con un if si esta en la tabla de favoritos e imprimir un color o el otro del botón
            $colorBoton = 'light';
            if(in_array($row['idInmueble'], $arrayFav)){
                $colorBoton = 'danger';
            }

            echo "<div class='col mb-3'>
            <div class='card'>
            <button type='button' class='badge badge-pill badge-".$colorBoton." favorito' onclick='favoritos(".$row['idInmueble'].")'><i class='fas fa-heart'></i></button>
             <img src='data:image/jpg;base64, ".base64_encode($row['fotos'])."' height='200' class='card-img-top'>
             <div class='card-body'>
                    <h5 class='card-title'>".$row['Titulo']. "</h5>
                    <h6>Estado: " .$row['Estado']. "</h6>
                    <p><span class='badge badge-pill badge-secondary'>$". number_format($row['Costo']) ." MXN</span></p>
                    <a href='Publicacion.php?IdInmueble=".$row['idInmueble']."' class='btn btn-primary'>Ver inmueble</a>
                </div>
            </div>
        </div>";
    }
    }
    mysqli_close($conn);
?>