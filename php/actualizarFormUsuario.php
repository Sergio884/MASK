<?php include('../db/dbconnection.php'); 
    session_start();
  if(!isset($_SESSION['usuario'])){
    header("location: ../html/login.html");
  }
  $NomUsuario = $_SESSION['usuario'];



     $query = "SELECT * FROM usuario WHERE Usuario='$NomUsuario'";
     $run = mysqli_query($conn,$query);

     if(mysqli_num_rows($run) > 0){
        $row = mysqli_fetch_assoc($run);
        $password=$row['Password'];
        $nombre=$row['Nombres'];
        $apellidos=$row['Apellidos'];
        $correo=$row['Correo'];
        $telefono=$row['Telefono'];
        $nacimiento=$row['Edad'];

     }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../estilos/forms.css">
    <link rel="stylesheet" href="../estilos/gridUsuario.css">
    <!--<script src="JS/Validacion.js"></script>-->
    <title>Document</title>
</head>
<body onload="return ocultar();">
    <form class="formulario" onsubmit="return validar(); " action="saveActualizarFormUsuario.php" method="POST" enctype="multipart/form-data" >
        <fieldset ><legend>Actualiza tus Datos</legend>
    <div class="contenedor-campos">
        
        <div class="entradas">
            <label name="usuarioL">Usuario</label>
            <input id="nombre" type="text" name="usuario" placeholder="Ej. Jose0308" value="<?php echo($NomUsuario)?>">
        </div>
        <div class="entradas">
            <label name="pass">Contraseña</label>
            <input id="nombre" type="password" name="password" placeholder="Ej. Ejemplo123" value="<?php echo($password)?>">
        </div>
        <div class="entradas">
            <label name="nombreL">Nombres</label>
            <input id="nombre" type="text" name="nombre" placeholder="Ej. José" value="<?php echo($nombre)?>">
        </div>
       
        <div class="entradas">
            <label name="apellido">Apellidos</label>
            <input id="apellido" type="text" name="apellidos" placeholder="Ej. Rodriguez" value="<?php echo($apellidos)?>">
        </div>
        <div class="entradas">
            <label name="correoL">Correo Electrónico</label>
            <input id="correo" type="text" name="correo" placeholder="Ej. ejemplo@mail.com" value="<?php echo($correo)?>">
        </div>
        <div class="entradas">
            <label name="telefonoL">Telefono</label>
            <input id="apellidoM" type="text" name="telefono" placeholder="Ej. 5578946245" value="<?php echo($telefono)?>">
        </div>
        <div class="entradas">
              <label>Fecha de nacimiento</label>
              <input id="nacimiento" type="date" max="2020-02-20" min="1910-02-20"  name="nacimiento" value="<?php echo(date($nacimiento))?>">
        </div> 
        <div class="entradas">
            <label>Sube una foto de Perfil</label>
            <div class="div_file"id="div_file">
                <p class="txtBtn"id="texto">Subir foto</p>
                <input class="btn_enviar"id="btn_enviar" name="image"type="file" />
            </div>
        </div>
    </div> 
    </fieldset>
        <div class="entradas">
            <input name="save_task" class="boton" type="submit" value="Guardar">
        </div>
    </form>
</body>