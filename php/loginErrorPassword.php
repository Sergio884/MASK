<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>MASK</title>
  <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../estilos/estiloLogin.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
  </head>   
  <body id="login">
      <section>
          <div class="contenedor">
              <h1>Contraseña incorrecta</h1>
                <div class="contenedor-login">
                  <form action="../php/validacion.php" method="post">
                    <input type="text" name="Usuario" value="<?php echo $_GET['usuario']; ?>" placeholder="&#xf007; Usuario" style="font-family:Arial, FontAwesome" required>
                    <div class="inputPassword"><input type="password" name="Password" placeholder="&#xf084; Contraseña" style="font-family:Arial, FontAwesome"  required>
                      <div class="olvidar">¿Olvidaste tu contraseña? <a class="clickAqui"href="#">CLICK AQUÍ</a></div>
                    </div>
                    <input type="submit" value="Ingresar" id="btn">                
                  </form>                  
                </div>
                <p>¿No tienes cuenta? <a href="registro.html">¡Regístrate ahora!</a></p>
          </div>

      </section>
      
  </body>
</html>