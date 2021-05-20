<?php
  session_start();
  if(!isset($_SESSION['usuario'])){
    header("location: ../html/Login.html");
  }
  $usuario = $_SESSION['usuario'];
  include('dbconnection.php');
  $sql = "SELECT * FROM Usuario WHERE Usuario='".$usuario."' OR Correo='".$usuario."';";
  $result = mysqli_query($connection, $sql);
  if(mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_assoc($result);
    $idUsuario = $row['IdUsuario'];

    echo "<table class=\"table table-striped tab-sm\">
      <thead class=\"thead-dark\">
        <tr>
          <th scope=\"col\">Cliente</th>
          <th scope=\"col\">Vendedor</th>
          <th scope=\"col\">Inmueble</th>
          <th scope=\"col\">Fecha</th>
          <th scope=\"col\">Hora</th>
          <th scope=\"col\">Editar</th>
          <th scope=\"col\">Eliminar</th>
        </tr>
      </thead>
      <tbody>";

    $sql = "SELECT * FROM Visitas WHERE Interesado='".$idUsuario."' OR Vendedor='".$idUsuario."';";
    $result = mysqli_query($connection, $sql);
    if(mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_array($result)) {
        $Interesado = $row['Interesado'];
        $Vendedor = $row['Vendedor'];
        $Fecha = $row['Fecha'];
        $Hora = $row['Hora'];
        $Inmueble = $row['Inmueble'];
        $sql = "SELECT * FROM Usuario WHERE IdUsuario='".$Interesado."'";
        $result2 = mysqli_query($connection, $sql);
        if(mysqli_num_rows($result2) > 0){
          $row2 = mysqli_fetch_array($result2);
          $UsuarioInteresado = $row2['Usuario'];
        }
        $sql = "SELECT * FROM Usuario WHERE IdUsuario='".$Vendedor."'";
        $result2 = mysqli_query($connection, $sql);
        if(mysqli_num_rows($result2) > 0){
          $row2 = mysqli_fetch_array($result2);
          $VendedorInteresado = $row2['Usuario'];
        }
        $sql = "SELECT * FROM Inmueble WHERE IdInmueble='".$Inmueble."'";
        $result2 = mysqli_query($connection, $sql);
        if(mysqli_num_rows($result2) > 0){
          $row2 = mysqli_fetch_array($result2);
          $Inmueble = $row2['Titulo'];
        }
        echo "<tr>";
        echo "<td>".$UsuarioInteresado."</td>";
        echo "<td>".$VendedorInteresado."</td>";
        echo "<td>".$Inmueble."</td>";
        echo "<td><input type=\"date\" name=\"fecha\" id=\"fecha".$Interesado.$Vendedor."\"  class=\"form-control\" value=\"".$Fecha."\"></td>";
        echo "<td><input type=\"time\" name=\"hora\" id=\"hora".$Interesado.$Vendedor."\" class=\"form-control\" value=\"".$Hora."\"></td>";
        echo "<td><button type=\"button\" class=\"btn btn-sm btn-outline-secondary\" onclick=\"EditarVisita('".$Interesado."','".$Vendedor."','".$Fecha."',fecha".$Interesado.$Vendedor.".value, hora".$Interesado.$Vendedor.".value )\"><span class=\"material-icons-outlined\">edit</span></button></td>";
        echo "<td><button type=\"button\" class=\"btn btn-sm btn-outline-secondary\" onclick=\"EliminarVisita('".$Interesado."','".$Vendedor."','".$Fecha."' )\"><span class=\"material-icons-outlined\">delete</span></button></td>";
        echo "</tr>";
      }
    }
    echo "</tbody>
  </table>";
  }
  else{
    echo "Error en la sesión";
  }
  mysqli_close($connection);
 ?>
