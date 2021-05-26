<?php
    include("db.php");

   // $querysearch = "SELECT * FROM inmueble, inmueblefoto WHERE inmueble.idInmueble = inmueblefoto.idInmueble";
    //if(isset($_POST['busqueda'])){
        $estado = $_POST['estado'];
        $tipo = $_POST['tipo'];
        $dorm = $_POST['dormitorios'];
        $venta = $_POST['venta'];
        $querysearch = "SELECT idInmueble, Titulo, Estado, Costo, (SELECT Foto FROM inmueblefoto WHERE inmueblefoto.idInmueble = inmueble.idInmueble LIMIT 1) AS fotos FROM inmueble WHERE Estado like '$estado' AND TipoInmueble like '$tipo' AND NumeroDormitorios like '$dorm' AND VentaRenta like '$venta'";
   
    
    //}
    $result_search = mysqli_query($conn, $querysearch);
    if(!$result_search){
        echo 'query failed';
    }
    if(mysqli_num_rows($result_search) <1){
        echo 'No se encontraron datos';
    }else{
        while($row = mysqli_fetch_array($result_search)){
            echo "<div class='col mb-3'>
            <div class='card'>
            <a href = 'InmuebleFavorito.php?id=".$row['idInmueble']."' class='badge badge-pill badge-light favorito'><i class='fas fa-heart'></i></a>
             <img src='data:image/jpg;base64, ".base64_encode($row['fotos'])."' height='200' class='card-img-top'>
             <div class='card-body'>
                    <h5 class='card-title'>".$row['Titulo']. "</h5>
                    <h6>Estado: " .$row['Estado']. "</h6>
                    <p><span class='badge badge-pill badge-secondary'>$". number_format($row['Costo']) ." MXN</span></p>
                    <a href='Publicacion.php?IdInmueble=".$row['idInmueble']."' class='btn btn-primary'>Ver inmueble</a>
                </div>
            </div>
        </div>";
    }
    }
    mysqli_close($conn);


//Usar AJAX para insertar los datos en favoritos y cambiar el color el botón 
//Debemos enviar el idInmueble a otro archivo a través de AJAX y conseguir el id de la sesión actual
//Una vez hecha la función cambiar de color el botón 


    //$_SESSION['resultado'] = $querysearch;
    //header("Location: index.php");
/*    
    <script type="text/javascript">
        $('#boton').click(function(){
            var esperar = 500;
            $.ajax({
                url: "prueba.html",
                beforeSend : function(){
                    $('#contenido').text('Cargando...');
                },
                success : function(data){
                    setTimeout(function(){
                        $('#contenido').html(data);
                    },esperar
                    );
                }
            });
        });
    </script>
*/

?>
<script>
console.log('fav');
$('#fav').click(function(){
    console.log('fav'); 
});
</script>