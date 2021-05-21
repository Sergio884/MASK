<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "maskchat";
$connection =  mysqli_connect($server,$username,$password,$database);

if($connection){
  //echo "Si";
}else {
  echo "Nel" . mysqli_error($connection);
  die($connection);
}
?>
