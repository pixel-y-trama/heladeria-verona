//Menú
var btnMenu=document.getElementById("btnMenu");
var menu=document.getElementById("menu");

//var cantidadHijosMenu=menu.getElementsByTagName("a").length;
//var alturaHijoMenu = menu.getElementsByTagName("a")[0].offsetHeight;

var isShowing=false;
var contador=1;
//btnMenu.onclick=function(){
//    if(isShowing===false){
//        menu.style.height = (cantidadHijosMenu*alturaHijoMenu)+"px";
//        isShowing=true;
//    }else{
//        menu.style.height = "0px";
//        isShowing=false;
//    }
//}

btnMenu.onclick=function(){
    if(isShowing===false){
        $('#menu').css('display','block');
        isShowing=true;
    }else{
        $('#menu').css('display','none');
        isShowing=false;
    }
}

document.querySelector( "#btnMenu" )
  .addEventListener( "click", function() {
    this.classList.toggle( "active" );
  });
  

//marcar elemento de menú activo
var url= window.location.href;
var enlaces=menu.getElementsByTagName("a");
//comparar
for(var i=0; i<enlaces.length ; i++){
    if(enlaces[i].href == url){
        enlaces[i].className = "activo";
    }
}


//para que suba despacio al dar a "Subir"
$("#btnUP").click(function() {
    $('html, body').animate({
        scrollTop: $(".wrapper").offset().top
    }, 1500);
});

$(document).on("scroll", function(){
    //sacamos el desplazamiento actual de la página
    var desplazamientoActual = $(document).scrollTop();
    //accedemos al control de "ir arriba"
    var controlArriba = $("#btnUP");
    //compruebo si debo mostrar el botón
    if(desplazamientoActual > 300 && controlArriba.css("display") == "none"){
        controlArriba.fadeIn(800);
    }
    //controlo si debo ocultar el botón
    if(desplazamientoActual < 300 && controlArriba.css("display") == "block"){
        controlArriba.fadeOut(800);
    }
});



$('a[href*="#"]:not([href="#"])').click(function() {
  if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
    var target = $(this.hash);
    target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
    if (target.length) {
      $('html, body').animate({
        scrollTop: target.offset().top
      }, 1500);
      return false;
    }
  }
});













//$("#contacto").click(function () {
//    $('html,body').animate({
//        scrollTop: $(".contacto").offset().top
//    }, 4000);
//});
//
//
