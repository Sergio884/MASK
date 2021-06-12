<?php 
    include("../db/db.php");

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $idUsu = $_GET['idUsu'];
        $query = "DELETE FROM favoritos WHERE idInmueble = $id AND idUsuario = $idUsu";
        $result = mysqli_query($conn, $query);
        if(!$result){
            echo 'query failded';
        }
        header("Location: favoritos.php");
    }

?>