/////////////////////////////////////////////////////////////
//INSERTAR INFO EN HTML

var content_slider = document.getElementById("content_slider");
var content_btn = document.getElementById("content_btn");

//Crear clase(plantilla) para instanciar objetos
function foto(valueTitulo,valueImg, valueAlt){
    this.titulo = valueTitulo;
    this.rutaImagen = valueImg;
    this.alt = valueAlt;
}

var foto1 = new foto("Helados para saborear", "../images/imgs/_DSC5890.jpg","Niño comiendo helado");
var foto2 = new foto("Como más te guste", "../images/imgs/_DSC6980.jpg","Copa de helado artesano");
var foto3 = new foto("Para llevar o a domicilio", "../images/imgs/_DSC6908.jpg","Helado artesano para llevar o a domicilio");
var foto4 = new foto("Crepes", "../images/imgs/_DSC7113.jpg","Crepes artesanos");

var listaFotos = new Array(foto1,foto2,foto3,foto4);

//Insertamos fotos en el html
for(var i=0; i<listaFotos.length; i++){
    content_slider.innerHTML += "<div style='background:url("+listaFotos[i].rutaImagen+") no-repeat center; background-size:cover' class='foto'><h3>"+listaFotos[i].titulo+"</h3></div>";
}


////////////////////////////////////////////////////////////////
//RECALCULAR TAMAÑOS
//
//Una vez creados los div que contienen las fotos, lo selecciono
var fotos = content_slider.getElementsByClassName("foto");


//1-Recalculamos tamaño del contenedor en función del número de fotos que contenga
content_slider.style.width = fotos.length*100+"%";
content_btn.style.width = ((fotos.length*20)+(5*(fotos.length-1)))+"px";

for(var i=0; i<fotos.length; i++){
    fotos[i].style.width = 100/fotos.length + "%";
    content_btn.innerHTML += "<div onclick='mostrarFoto("+i+")' class='btn_slider'></div>";
}

/////////////////////////////////////////////////////////////////////
//START -----> Empezamos a mover el content_slider al entrar al documento
var pos_left = 0;

var puntitos = document.getElementsByClassName("btn_slider");
puntitos[0].style.background =  "#DC911B";
var contador=0;

var animacion = setInterval(cambiarFoto,4000);

function cambiarFoto(){
    //Mov contenedor fotos
    pos_left += 100;
    if(pos_left == fotos.length*100 ){
        pos_left=0;
        content_slider.className ="";
    }else{
        content_slider.className ="slider_animate";
    }
    content_slider.style.left = "-"+pos_left+"%";
    
    //color punto
    contador++;
    if(contador==puntitos.length){
        contador=0;
    }
    for(var i=0; i<puntitos.length; i++){
        if(contador==i){
            puntitos[i].style.background =  "#e7b142"; //punto en el que está
        }else{
            puntitos[i].style.background =  "#fff"; //punto no visitado
        }
    }
}


function mostrarFoto(pos){
    pos_left = (pos*100)-100;
    contador = pos-1;
    cambiarFoto();
}

///////////////////////////////////////////////////////
//EVENTOS
content_slider.onmouseover = parar;
content_btn.onmouseover = parar;
function parar(){
    clearInterval(animacion);
}

content_slider.onmouseout = reanimar;
content_btn.onmouseout = reanimar;
function reanimar(){
    animacion = setInterval(cambiarFoto,3000);
}



//$(document).ready(function(){
//    $('nav ul li a[href^="#"], #btnUP a').on('click',function (e) {
//        e.preventDefault();
//
//        var target = this.hash;
//        var $target = $(target);
//
//        $('html, body').stop().animate({
//            'scrollTop': $target.offset().top
//        }, 1000, 'swing', function () {
//            window.location.hash = target;
//        });
//    }); 
// 
//});
//
//
