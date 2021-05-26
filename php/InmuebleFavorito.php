<?php 
    include("db.php");

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        echo '0';
       // $query = "INSERT INTO favoritos values ";
        header("Location: buscarView.php");
    }
?>