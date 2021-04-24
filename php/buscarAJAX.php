<?php
    include("db.php");

   // $querysearch = "SELECT * FROM inmueble, inmueblefoto WHERE inmueble.idInmueble = inmueblefoto.idInmueble";
    //if(isset($_POST['busqueda'])){
        $estado = $_POST['estado'];
        $tipo = $_POST['tipo'];
        $dorm = $_POST['dormitorios'];
        $venta = $_POST['venta'];
        $querysearch = "SELECT Titulo, Estado, Costo, (SELECT Foto FROM inmueblefoto WHERE inmueblefoto.idInmueble = inmueble.idInmueble LIMIT 1) AS fotos FROM inmueble WHERE Estado like '$estado' AND TipoInmueble like '$tipo' AND NumeroDormitorios like '$dorm' AND VentaRenta like '$venta'";
   
    
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
             <img src='data:image/jpg;base64, ".base64_encode($row['fotos'])."'  height='200' class='card-img-top'>
                <div class='card-body'>
                    <h5 class='card-title'>".$row['Titulo']. "</h5>
                    <h6>Estado: " .$row['Estado']. "</h6>
                    <p><span class='badge badge-pill badge-secondary'>$". number_format($row['Costo']) ." MXN</span></p>
                    <a href='' class='btn btn-primary'>Más información</a>
                </div>
                <div class='card-footer text-muted'>
                    2 days ago
                </div>
            </div>
        </div>";
    }
    }

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