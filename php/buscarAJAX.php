<?php
    include("../db/db.php");
                        //0       1      2
    $arrayTipos = array("Casa", "Casa", "Departamento");

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
    $precio = $_POST['precio'];
    //QUERY BUSQUEDA
    $querysearch = "SELECT IdInmueble, Titulo, Estado, Costo, TipoInmueble, (SELECT Foto FROM inmueblefoto WHERE inmueblefoto.IdInmueble = inmueble.IdInmueble LIMIT 1) AS fotos FROM inmueble WHERE Estado like '$estado' AND TipoInmueble like '$tipo' AND NumeroDormitorios like '$dorm' AND costo <= '$precio'";    
    //QUERY FAVORITOS
    $queryFav = "SELECT * FROM favoritos WHERE idUsuario = $idUsu";
    $resultFav = mysqli_query($conn, $queryFav); 
    $result_search = mysqli_query($conn, $querysearch);

    $arrayFav = Array();
    while($rowFav = mysqli_fetch_array($resultFav)){
        $arrayFav[] = $rowFav['IdInmueble'];
    }

    if(isset($_POST['indice'])){
        $id = $_POST['indice'];
        if(in_array($id, $arrayFav)){
            $queryInFav ="DELETE FROM favoritos WHERE IdInmueble = $id AND idUsuario = $idUsu";
            $resultInFav = mysqli_query($conn, $queryInFav);
        }else{
            $queryInFav = "INSERT INTO favoritos VALUES (null, $id, $idUsu)";
            $resultInFav = mysqli_query($conn, $queryInFav);
        }
        $arrayFav = Array();
        $resultFav = mysqli_query($conn, $queryFav); 
        while($rowFav = mysqli_fetch_array($resultFav)){
            $arrayFav[] = $rowFav['IdInmueble'];
        }
    }
    if(!$result_search){
        echo 'query failed';
    }
    if(mysqli_num_rows($result_search) <1){
        echo 'No se encontraron datos';
    }else{
        while($row = mysqli_fetch_array($result_search)){
            //comprobar con un if si esta en la tabla de favoritos e imprimir un color o el otro del bot??n
            $colorBoton = 'light';
            if(in_array($row['IdInmueble'], $arrayFav)){
                $colorBoton = 'danger';
            }

            echo "<div class='col mb-3'>
            <div class='card'>
            <button type='button' class='badge badge-pill badge-".$colorBoton." favorito' onclick='favoritos(".$row['IdInmueble'].")'><i class='fas fa-heart'></i></button>
             <img src='data:image/jpg;base64, ".base64_encode($row['fotos'])."' height='200' class='card-img-top'>
             <div class='card-body'>
                    <h5 class='card-title'>". $row['Titulo'] ."</h5>
                    <h6>Estado: " .$row['Estado']. "</h6>
                    <p><span class='badge badge-pill badge-secondary'>$". number_format($row['Costo']) ." MXN</span></p>
                    <a href='Publicacion.php?IdInmueble=".$row['IdInmueble']."' class='btn' style='background-color: #00c0c7; color: #ffffff'>Ver inmueble</a>
                </div>
            </div>
        </div>";
    }
    }
    mysqli_close($conn);
?>