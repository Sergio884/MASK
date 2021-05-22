<?php
  session_start();

  if(isset($_SESSION['usuario'])){
    echo "Si";
  }else{
    echo "No";
  }

?>
