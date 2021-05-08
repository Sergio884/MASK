function validar(){

    let ubicacion, baños, estado, direccion, codigoPostal;
    ubicacion=document.getElementById("Ubicacion").value;
    baños=document.getElementById("Baños").value;
    estado=document.getElementById("Estado").value;
    direccion=document.getElementById("Direccion").value;
    codigoPostal=document.getElementById("CodigoPostal").value;

    if(validarUbicacion(ubicacion)==0){
        return false;
    }
    else{
        return true;
    }

}


function validarUbicacion(ubicacion){
    if(ubicacioon==''){
        alert('No ingreso una Ubicacion');
        return 0;
    }
    else{
        return 1;
    }
}


function ocultar(){
    console.log("Si entra");
    document.getElementById("masDormitorio").style.display="none";
    document.getElementById("masBanios").style.display="none";
}


function validarDormitorio(){
    dormitorio=document.getElementById("Dormitorio").value;
   if(dormitorio==="-1"){
       document.getElementById("masDormitorio").style.display="block";
       document.getElementById("contenedor1").style.paddingBottom="4rem";
   }
   else{
       document.getElementById("masDormitorio").style.display="none";
       document.getElementById("contenedor1").style.paddingBottom="1rem";
   }
}

function validarMas(){
    banios=document.getElementById("Banios").value;
    dormitorio=document.getElementById("Dormitorio").value;
   if(banios==="-1" ){
       document.getElementById("masBanios").style.display="block";
       document.getElementById("contenedor1").style.paddingBottom="4rem";
   }
   else if( dormitorio==="-1"){
    document.getElementById("masDormitorio").style.display="block";
    document.getElementById("contenedor1").style.paddingBottom="4rem";
   }
   
   if(dormitorio!="-1"){
        document.getElementById("masDormitorio").style.display="none";
        if(banios!=="-1" && dormitorio!=="-1")
            document.getElementById("contenedor1").style.paddingBottom="1rem";
   }
   if(banios!=="-1"){
       document.getElementById("masBanios").style.display="none";
       if(banios!=="-1" && dormitorio!=="-1")
            document.getElementById("contenedor1").style.paddingBottom="1rem";
   }
}

