<?php
include("db.php");

if(isset($_POST['save_task'])){
    $titulo=$_POST['titulo'];
    $tipoPropiedad=$_POST['tipoPropiedad'];
    $tipoVenta=$_POST['tipoVenta'];
    $numDormitorios=$_POST['numDormitorios'];
    $numBanios=$_POST['numBanios'];
    $estado=$_POST['estado'];
    $ciudad=$_POST['ciudad'];
    $direccion=$_POST['direccion'];
    $cp=$_POST['cp'];
    $costo=$_POST['costo'];
    $masDormitorio=$_POST['masDormitorio'];
    $masBanios=$_POST['masBanios'];
    $metrosCuadrados=$_POST['metrosCuadrados'];
    $descripcion=$_POST['descripcion'];
    $imagenEscapes=base64_encode(file_get_contents($_FILES["image"]["tmp_name"]));
    

    if($numDormitorios==-1){
        $numDormitorios=$masDormitorio;
    }
    if($numBanios==-1){
        $numBanios=$masBanios;
    }

    echo $titulo;
    echo $tipoPropiedad;
    echo $tipoVenta;
    echo $numDormitorios;
    echo $numBanios;
    echo $estado;
    echo $ciudad;
    echo $direccion;
    echo $cp;
    echo $costo;

   

    $query="INSERT INTO inmueble(
            Titulo,
            TipoInmueble,
            VentaRenta,
            Costo,
            Estado,
            Ciudad,
            Direccion,
            CP,
            NumeroDormitorios,
            NumeroBanios,
            MetrosCuadrados,
            Descripcion)
    VALUES ('$titulo',
            '$tipoPropiedad',
            '$tipoVenta',
            '$costo',
            '$estado',
            '$ciudad',
            '$direccion',
            '$cp',
            '$numDormitorios',
            '$numBanios',
            '$metrosCuadrados',
            '$descripcion')
            ";
    
    $query2="INSERT INTO inmueblefoto(Foto) VALUES('$imagenEscapes')";
    
    $result=mysqli_query($conn,$query);
    
    
    
    
    if(!$result){
        die(" Query fail");
    }
    else{
        echo 'Guardado Form';
    }


    $result=mysqli_query($conn,$query2);

    mysqli_close($conn);
    if(!$result){
        die(" Query fail");
    }
    else{
        echo 'Imagen Guardada';
    }

   
}




?>