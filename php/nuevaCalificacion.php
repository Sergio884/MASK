<?php
  $idReceptor = $_GET['receptor'];
  include('dbconnection.php');

  $sql = "SELECT * FROM Usuario WHERE IdUsuario=".$idReceptor.";";
  $result = mysqli_query($conn, $sql);
  if(mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_assoc($result);
    $nombreVendedor = $row['Usuario'];
    $ImagenUsuario = $row['FotoUsuario'];
  }
 ?>
 <!doctype html>
 <html lang="en">
   <head>
     <!-- Required meta tags -->
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">

     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

     <title>Trobify</title>
     <script type="text/javascript">
       function calificar(calificacion){
         if(calificacion<0 || calificacion>5){
           alert("La calificación no es valida");
         }
         else{
           var xmlhttp = new XMLHttpRequest();
           xmlhttp.onreadystatechange = function(){
             if (this.readyState == 4 && this.status == 200){
               alert(this.responseText);
             }
           };
           xmlhttp.open("GET","calificarUsuario.php?receptor=<?php echo $idReceptor; ?>&calificacion="+calificacion,true);
           xmlhttp.send();
         }
       }
     </script>
   </head>
   <body class="py-4">
     <main>
       <center><h1><b><p><h3>Siendo 0 malo y 5 excelente</h3></p>¿C&oacute;mo calificarias el servicio de <?php echo $nombreVendedor; ?>?</b></h1></center>
         <div class="container">
           <div class="row mb-3 form-group">
             <div class="col-md-3">
             </div>
             <div class="col-md-6">
               <div class="row mb-3 form-group">
                 <img width="260" height="250" <?php echo "src=\"data:image/jpg;base64, ".base64_encode($ImagenUsuario)."\""; ?>>
               </div>
               <div class="row mb-3 form-group">
                 <div class="col-sm-4">
                 </div>
                 <div class="col-sm-4">
                   <input type="number"class="form-control" id="Calificacion" max="5" min="0" value="5.0" required>
                 </div>
                 <div class="col-sm-4">
                 </div>
               </div>
               <div class="row mb-3 form-group">
                 <div class="col-12">
                   <button class="w-100 btn btn-lg btn-primary" onclick="calificar(Calificacion.value)">Calificar</button>
                 </div>
               </div>
             </div>
             <div class="col-md-6">
             </div>
           </div>
         </div>
     </main>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
   </body>
 </html>
