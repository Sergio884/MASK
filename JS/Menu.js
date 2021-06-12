function inicio(){
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
      if(this.responseText == "Si"){
        document.getElementById("pantalla").innerHTML = "<iframe src=\"../php/buscarView.php\"></iframe>";
      }
      else{
        window.location.replace("./Login.html");
      }
    }
  };
  xmlhttp.open("GET", "../php/comprobarSesion.php", true);
  xmlhttp.send();
}

function buscar(){
  document.getElementById("pantalla").innerHTML = "<iframe src=\"../php/buscarView.php\"></iframe>";
  document.getElementById("favoritos").classList.remove('active');
  document.getElementById("mensajes").classList.remove('active');
  document.getElementById("notificaciones").classList.remove('active');
  document.getElementById("historial").classList.remove('active');
  document.getElementById("venta").classList.remove('active');
  document.getElementById("publicaciones").classList.remove('active');
  document.getElementById("visitas").classList.remove('active');
  document.getElementById("usuario").classList.remove('active');
  document.getElementById("configuracion").classList.remove('active');
  document.getElementById("problema").classList.remove('active');
  document.getElementById("informacion").classList.remove('active');
}

function favoritos(){
  document.getElementById("pantalla").innerHTML = "<iframe src=\"../php/favoritos.php\"></iframe>";
  document.getElementById("favoritos").classList.add('active');
  document.getElementById("mensajes").classList.remove('active');
  document.getElementById("notificaciones").classList.remove('active');
  document.getElementById("historial").classList.remove('active');
  document.getElementById("venta").classList.remove('active');
  document.getElementById("publicaciones").classList.remove('active');
  document.getElementById("visitas").classList.remove('active');
  document.getElementById("usuario").classList.remove('active');
  document.getElementById("configuracion").classList.remove('active');
  document.getElementById("problema").classList.remove('active');
  document.getElementById("informacion").classList.remove('active');
}

function mensajes(){
  document.getElementById("pantalla").innerHTML = "<iframe src=\"../php/chatInicio.php\"></iframe>";
  document.getElementById("favoritos").classList.remove('active');
  document.getElementById("mensajes").classList.add('active');
  document.getElementById("notificaciones").classList.remove('active');
  document.getElementById("historial").classList.remove('active');
  document.getElementById("venta").classList.remove('active');
  document.getElementById("publicaciones").classList.remove('active');
  document.getElementById("visitas").classList.remove('active');
  document.getElementById("usuario").classList.remove('active');
  document.getElementById("configuracion").classList.remove('active');
  document.getElementById("problema").classList.remove('active');
  document.getElementById("informacion").classList.remove('active');
}

function notificaciones(){
  document.getElementById("pantalla").innerHTML = "<iframe src=\"https://ubuntu.com/\"></iframe>";
  document.getElementById("favoritos").classList.remove('active');
  document.getElementById("mensajes").classList.remove('active');
  document.getElementById("notificaciones").classList.add('active');
  document.getElementById("historial").classList.remove('active');
  document.getElementById("venta").classList.remove('active');
  document.getElementById("publicaciones").classList.remove('active');
  document.getElementById("visitas").classList.remove('active');
  document.getElementById("usuario").classList.remove('active');
  document.getElementById("configuracion").classList.remove('active');
  document.getElementById("problema").classList.remove('active');
  document.getElementById("informacion").classList.remove('active');
}

function miHistorial(){
  document.getElementById("pantalla").innerHTML = "<iframe src=\"./historial.html\"></iframe>";
  document.getElementById("favoritos").classList.remove('active');
  document.getElementById("mensajes").classList.remove('active');
  document.getElementById("notificaciones").classList.remove('active');
  document.getElementById("historial").classList.add('active');
  document.getElementById("venta").classList.remove('active');
  document.getElementById("publicaciones").classList.remove('active');
  document.getElementById("visitas").classList.remove('active');
  document.getElementById("usuario").classList.remove('active');
  document.getElementById("configuracion").classList.remove('active');
  document.getElementById("problema").classList.remove('active');
  document.getElementById("informacion").classList.remove('active');
}

function venta(){
  document.getElementById("pantalla").innerHTML = "<iframe src=\"../php/formRegistroInmueble.php\"></iframe>";
  document.getElementById("favoritos").classList.remove('active');
  document.getElementById("mensajes").classList.remove('active');
  document.getElementById("notificaciones").classList.remove('active');
  document.getElementById("historial").classList.remove('active');
  document.getElementById("venta").classList.add('active');
  document.getElementById("publicaciones").classList.remove('active');
  document.getElementById("visitas").classList.remove('active');
  document.getElementById("usuario").classList.remove('active');
  document.getElementById("configuracion").classList.remove('active');
  document.getElementById("problema").classList.remove('active');
  document.getElementById("informacion").classList.remove('active');
}

function publicaciones(){
  document.getElementById("pantalla").innerHTML = "<iframe src=\"./listaInmuebles.html\"></iframe>";
  document.getElementById("favoritos").classList.remove('active');
  document.getElementById("mensajes").classList.remove('active');
  document.getElementById("notificaciones").classList.remove('active');
  document.getElementById("historial").classList.remove('active');
  document.getElementById("venta").classList.remove('active');
  document.getElementById("publicaciones").classList.add('active');
  document.getElementById("visitas").classList.remove('active');
  document.getElementById("usuario").classList.remove('active');
  document.getElementById("configuracion").classList.remove('active');
  document.getElementById("problema").classList.remove('active');
  document.getElementById("informacion").classList.remove('active');
}

function visitas(){
  document.getElementById("pantalla").innerHTML = "<iframe src=\"./listaVisita.html\"></iframe>";
  document.getElementById("favoritos").classList.remove('active');
  document.getElementById("mensajes").classList.remove('active');
  document.getElementById("notificaciones").classList.remove('active');
  document.getElementById("historial").classList.remove('active');
  document.getElementById("venta").classList.remove('active');
  document.getElementById("publicaciones").classList.remove('active');
  document.getElementById("visitas").classList.add('active');
  document.getElementById("usuario").classList.remove('active');
  document.getElementById("configuracion").classList.remove('active');
  document.getElementById("problema").classList.remove('active');
  document.getElementById("informacion").classList.remove('active');
}

function usuario(){
  document.getElementById("pantalla").innerHTML = "<iframe src=\"https://telegram.org/\"></iframe>";
  document.getElementById("favoritos").classList.remove('active');
  document.getElementById("mensajes").classList.remove('active');
  document.getElementById("notificaciones").classList.remove('active');
  document.getElementById("historial").classList.remove('active');
  document.getElementById("venta").classList.remove('active');
  document.getElementById("publicaciones").classList.remove('active');
  document.getElementById("visitas").classList.remove('active');
  document.getElementById("usuario").classList.add('active');
  document.getElementById("configuracion").classList.remove('active');
  document.getElementById("problema").classList.remove('active');
  document.getElementById("informacion").classList.remove('active');
}

function configuracion(){
  document.getElementById("pantalla").innerHTML = "<iframe src=\"https://ubuntu.com/\"></iframe>";
  document.getElementById("favoritos").classList.remove('active');
  document.getElementById("mensajes").classList.remove('active');
  document.getElementById("notificaciones").classList.remove('active');
  document.getElementById("historial").classList.remove('active');
  document.getElementById("venta").classList.remove('active');
  document.getElementById("publicaciones").classList.remove('active');
  document.getElementById("visitas").classList.remove('active');
  document.getElementById("usuario").classList.remove('active');
  document.getElementById("configuracion").classList.add('active');
  document.getElementById("problema").classList.remove('active');
  document.getElementById("informacion").classList.remove('active');
}

function problema(){
  document.getElementById("pantalla").innerHTML = "<iframe src=\"../php/reporteProblema.php?receptor=\"></iframe>";
  document.getElementById("favoritos").classList.remove('active');
  document.getElementById("mensajes").classList.remove('active');
  document.getElementById("notificaciones").classList.remove('active');
  document.getElementById("historial").classList.remove('active');
  document.getElementById("venta").classList.remove('active');
  document.getElementById("publicaciones").classList.remove('active');
  document.getElementById("visitas").classList.remove('active');
  document.getElementById("usuario").classList.remove('active');
  document.getElementById("configuracion").classList.remove('active');
  document.getElementById("problema").classList.add('active');
  document.getElementById("informacion").classList.remove('active');
}

function informacion(){
  document.getElementById("pantalla").innerHTML = "<iframe src=\"https://ubuntu.com/\"></iframe>";
  document.getElementById("favoritos").classList.remove('active');
  document.getElementById("mensajes").classList.remove('active');
  document.getElementById("notificaciones").classList.remove('active');
  document.getElementById("historial").classList.remove('active');
  document.getElementById("venta").classList.remove('active');
  document.getElementById("publicaciones").classList.remove('active');
  document.getElementById("visitas").classList.remove('active');
  document.getElementById("usuario").classList.remove('active');
  document.getElementById("configuracion").classList.remove('active');
  document.getElementById("problema").classList.remove('active');
  document.getElementById("informacion").classList.add('active');
}
