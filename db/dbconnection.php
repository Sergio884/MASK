<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "mask";
$conn =  mysqli_connect($server,$username,$password,$database);

if($conn){
  //echo "Si";
}else {
  echo "Nel" . mysqli_error($conn);
  die($conn);
}
?>
