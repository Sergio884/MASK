<?php
  session_start();
  if(!isset($_SESSION['usuario'])){
    header("location: ../html/Login.html");
  }
  $usuario = $_SESSION['usuario'];
  include('../db/dbconnection.php');
  $sql = "SELECT * FROM Usuario WHERE Usuario='".$usuario."' OR Correo='".$usuario."';";
  $result = mysqli_query($conn, $sql);
  if(mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_assoc($result);
    $idUsuario = $row['IdUsuario'];
    echo "<table class=\"table table-striped tab-sm\">
      <thead class=\"thead-dark\">
        <tr>
          <th scope=\"col\">Inmueble</th>
          <th scope=\"col\">Fecha</th>
          <th scope=\"col\"></th>
          <th scope=\"col\"></th>
        </tr>
      </thead>
    <tbody>";

    $sql = "SELECT * FROM Historial WHERE IdUsuario='".$idUsuario."' ORDER BY Fecha DESC";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_array($result)){
        $IdInmueble = $row['IdInmueble'];
        $Fecha = $row['Fecha'];
        $sql = "SELECT * FROM Inmueble WHERE IdInmueble = '".$IdInmueble."'";
        $result2 = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result2) > 0){
          while($row2 = mysqli_fetch_array($result2)){
            $Titulo = $row2['Titulo'];
            echo "<tr>";
            echo "<td>".$Titulo."</td>";
            echo "<td>".$Fecha."</td>";
            echo "<td><a href=\"../php/Publicacion.php?IdInmueble=".$IdInmueble."\"><button type=\"button\" class=\"btn btn-sm btn-outline-secondary\"><span class=\"material-icons-outlined\">visibility</span></button></a></td>";
            echo "<td><button type=\"button\" class=\"btn btn-sm btn-outline-secondary\" onclick=\"EliminarHistorial('".$idUsuario."','".$IdInmueble."')\"><span class=\"material-icons-outlined\">delete</span></button></td>";
            echo "</tr>";
          }
        }
      }
    }
    echo "</tbody>
    </table>";
  }
  else{
    echo "Error en la sesión";
  }
  mysqli_close($conn);
 ?>
