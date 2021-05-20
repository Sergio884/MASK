function inicio(){
  document.getElementById("pantalla").innerHTML = "<iframe width=\"101%\" height=\"370%\" src=\"https://www.wikipedia.org/\" scrolling=\"yes\"></iframe>"
}

function favoritos(){
  document.getElementById("pantalla").innerHTML = "<iframe width=\"101%\" height=\"370%\" src=\"https://ubuntu.com/\" scrolling=\"yes\"></iframe>"
  document.getElementById("favoritos").classList.add('active');
  document.getElementById("mensajes").classList.remove('active');
  document.getElementById("notificaciones").classList.remove('active');
  document.getElementById("venta").classList.remove('active');
  document.getElementById("publicaciones").classList.remove('active');
  document.getElementById("visitas").classList.remove('active');
  document.getElementById("usuario").classList.remove('active');
  document.getElementById("configuracion").classList.remove('active');
  document.getElementById("problema").classList.remove('active');
  document.getElementById("informacion").classList.remove('active');
}

function mensajes(){
  document.getElementById("pantalla").innerHTML = "<iframe width=\"101%\" height=\"370%\" src=\"../php/chatInicio.php\" scrolling=\"yes\"></iframe>"
  document.getElementById("favoritos").classList.remove('active');
  document.getElementById("mensajes").classList.add('active');
  document.getElementById("notificaciones").classList.remove('active');
  document.getElementById("venta").classList.remove('active');
  document.getElementById("publicaciones").classList.remove('active');
  document.getElementById("visitas").classList.remove('active');
  document.getElementById("usuario").classList.remove('active');
  document.getElementById("configuracion").classList.remove('active');
  document.getElementById("problema").classList.remove('active');
  document.getElementById("informacion").classList.remove('active');
}

function notificaciones(){
  document.getElementById("pantalla").innerHTML = "<iframe width=\"101%\" height=\"370%\" src=\"https://ubuntu.com/\" scrolling=\"yes\"></iframe>"
  document.getElementById("favoritos").classList.remove('active');
  document.getElementById("mensajes").classList.remove('active');
  document.getElementById("notificaciones").classList.add('active');
  document.getElementById("venta").classList.remove('active');
  document.getElementById("publicaciones").classList.remove('active');
  document.getElementById("visitas").classList.remove('active');
  document.getElementById("usuario").classList.remove('active');
  document.getElementById("configuracion").classList.remove('active');
  document.getElementById("problema").classList.remove('active');
  document.getElementById("informacion").classList.remove('active');
}

function venta(){
  document.getElementById("pantalla").innerHTML = "<iframe width=\"101%\" height=\"370%\" src=\"https://telegram.org/\" scrolling=\"yes\"></iframe>"
  document.getElementById("favoritos").classList.remove('active');
  document.getElementById("mensajes").classList.remove('active');
  document.getElementById("notificaciones").classList.remove('active');
  document.getElementById("venta").classList.add('active');
  document.getElementById("publicaciones").classList.remove('active');
  document.getElementById("visitas").classList.remove('active');
  document.getElementById("usuario").classList.remove('active');
  document.getElementById("configuracion").classList.remove('active');
  document.getElementById("problema").classList.remove('active');
  document.getElementById("informacion").classList.remove('active');
}

function publicaciones(){
  document.getElementById("pantalla").innerHTML = "<iframe width=\"101%\" height=\"370%\" src=\"./listaInmuebles.html\" scrolling=\"yes\"></iframe>"
  document.getElementById("favoritos").classList.remove('active');
  document.getElementById("mensajes").classList.remove('active');
  document.getElementById("notificaciones").classList.remove('active');
  document.getElementById("venta").classList.remove('active');
  document.getElementById("publicaciones").classList.add('active');
  document.getElementById("visitas").classList.remove('active');
  document.getElementById("usuario").classList.remove('active');
  document.getElementById("configuracion").classList.remove('active');
  document.getElementById("problema").classList.remove('active');
  document.getElementById("informacion").classList.remove('active');
}

function visitas(){
  document.getElementById("pantalla").innerHTML = "<iframe width=\"101%\" height=\"370%\" src=\"./listaVisita.html\" scrolling=\"yes\"></iframe>"
  document.getElementById("favoritos").classList.remove('active');
  document.getElementById("mensajes").classList.remove('active');
  document.getElementById("notificaciones").classList.remove('active');
  document.getElementById("venta").classList.remove('active');
  document.getElementById("publicaciones").classList.remove('active');
  document.getElementById("visitas").classList.add('active');
  document.getElementById("usuario").classList.remove('active');
  document.getElementById("configuracion").classList.remove('active');
  document.getElementById("problema").classList.remove('active');
  document.getElementById("informacion").classList.remove('active');
}

function usuario(){
  document.getElementById("pantalla").innerHTML = "<iframe width=\"101%\" height=\"370%\" src=\"https://telegram.org/\" scrolling=\"yes\"></iframe>"
  document.getElementById("favoritos").classList.remove('active');
  document.getElementById("mensajes").classList.remove('active');
  document.getElementById("notificaciones").classList.remove('active');
  document.getElementById("venta").classList.remove('active');
  document.getElementById("publicaciones").classList.remove('active');
  document.getElementById("visitas").classList.remove('active');
  document.getElementById("usuario").classList.add('active');
  document.getElementById("configuracion").classList.remove('active');
  document.getElementById("problema").classList.remove('active');
  document.getElementById("informacion").classList.remove('active');
}

function configuracion(){
  document.getElementById("pantalla").innerHTML = "<iframe width=\"101%\" height=\"370%\" src=\"https://ubuntu.com/\" scrolling=\"yes\"></iframe>"
  document.getElementById("favoritos").classList.remove('active');
  document.getElementById("mensajes").classList.remove('active');
  document.getElementById("notificaciones").classList.remove('active');
  document.getElementById("venta").classList.remove('active');
  document.getElementById("publicaciones").classList.remove('active');
  document.getElementById("visitas").classList.remove('active');
  document.getElementById("usuario").classList.remove('active');
  document.getElementById("configuracion").classList.add('active');
  document.getElementById("problema").classList.remove('active');
  document.getElementById("informacion").classList.remove('active');
}

function problema(){
  document.getElementById("pantalla").innerHTML = "<iframe width=\"101%\" height=\"370%\" src=\"https://telegram.org/\" scrolling=\"yes\"></iframe>"
  document.getElementById("favoritos").classList.remove('active');
  document.getElementById("mensajes").classList.remove('active');
  document.getElementById("notificaciones").classList.remove('active');
  document.getElementById("venta").classList.remove('active');
  document.getElementById("publicaciones").classList.remove('active');
  document.getElementById("visitas").classList.remove('active');
  document.getElementById("usuario").classList.remove('active');
  document.getElementById("configuracion").classList.remove('active');
  document.getElementById("problema").classList.add('active');
  document.getElementById("informacion").classList.remove('active');
}

function informacion(){
  document.getElementById("pantalla").innerHTML = "<iframe width=\"101%\" height=\"370%\" src=\"https://ubuntu.com/\" scrolling=\"yes\"></iframe>"
  document.getElementById("favoritos").classList.remove('active');
  document.getElementById("mensajes").classList.remove('active');
  document.getElementById("notificaciones").classList.remove('active');
  document.getElementById("venta").classList.remove('active');
  document.getElementById("publicaciones").classList.remove('active');
  document.getElementById("visitas").classList.remove('active');
  document.getElementById("usuario").classList.remove('active');
  document.getElementById("configuracion").classList.remove('active');
  document.getElementById("problema").classList.remove('active');
  document.getElementById("informacion").classList.add('active');
}
