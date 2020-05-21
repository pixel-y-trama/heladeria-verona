<?php
if(isset($_POST['email'])) {
 
    // Edita las dos líneas siguientes con tu dirección de correo y asunto personalizados
 
    $email_to = "jaime.mena8@gmail.com";
 
    $email_subject = "Tu Asunto de correo";   
 
    function died($error) {
 
        // si hay algún error, el formulario puede desplegar su mensaje de aviso
 
        echo "Lo sentimos, hubo un error en sus datos y el formulario no puede ser enviado en este momento. ";
 
        echo "Detalle de los errores.<br /><br />";
        
        echo $error."<br /><br />";
 
        echo "Porfavor corrija estos errores e inténtelo de nuevo.<br /><br />";
        die();
    }
 
    // Se valida que los campos del formulairo estén llenos
 
    if(!isset($_POST['name']) ||
 
        !isset($_POST['email']) ||
 
        !isset($_POST['subject']) ||
 
        !isset($_POST['message'])) {
 
        died('Lo sentimos pero parece haber un problema con los datos enviados.');       
 
    }
 //En esta parte el valor "name" nos sirve para crear las variables que recolectaran la información de cada campo
    
    $name = $_POST['name']; // requerido
 
    $email_from = $_POST['email']; // requerido
 
    $subject = $_POST['subject']; // no requerido 

    $message = $_POST['message']; // requerido
 
    $error_message = "Error";

//En esta parte se verifica que la dirección de correo sea válida 
    
   $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
 
    $error_message .= 'La dirección de correo proporcionada no es válida.<br />';
 
  }

//En esta parte se validan las cadenas de texto

    $string_exp = "/^[A-Za-z .'-]+$/";

  if(!preg_match($string_exp,$name)) {
 
    $error_message .= 'El formato del nombre no es válido<br />';
 
  }
 
  if(strlen($message) < 2) {
 
    $error_message .= 'El formato del texto no es válido.<br />';
 
  }
 
  if(strlen($error_message) < 0) {
 
    died($error_message);
 
  }
  
  ///======================
  
  if (mail($name, $email_from, $subject, $message)){
		$success = "El mensaje se ha enviado correctamente.";
	}else{
		$error = "El envío del mensaje ha dado error, prueba otra vez.";
	}
 

        
//A partir de aqui se contruye el cuerpo del mensaje tal y como llegará al correo

    $email_message = "Contenido del Mensaje.\n\n";
 
     
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
 
     
 
    $email_message .= "Nombre: ".clean_string($name)."\n";
 
    $email_message .= "Email: ".clean_string($email_from)."\n";
 
    $email_message .= "Asunto: ".clean_string($subject)."\n";
 
    $email_message .= "Mensaje: ".clean_string($message)."\n";
  
 
//Se crean los encabezados del correo
 
$headers = 'From: '.$email_from."\r\n".
 
'Reply-To: '.$email_from."\r\n" .
 
'X-Mailer: PHP/' . phpversion();
 
mail($email_to, $email_subject, $email_message, $headers);  
 
?>

<!-- incluye aqui tu propio mensaje de Éxito-->


<!DOCTYPE html>
<html>
    <head>
        <title>Verona Helado artesanal</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="styles.css" rel="stylesheet" type="text/css"/>
        <link href="responsive.css" rel="stylesheet" type="text/css"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js" type="text/javascript"></script>
        <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" />
        <meta name="description" content="Verona Helado artesanal. Elaboración propia diaria de helados, chocolates, tortitas, crepes y muchos productos más.">
        <meta name="keywords" content="heladería artesana Verona, helados, cafés, granizados, crepes, batidos, gofres, tortitas, chocolates, pedido a domicilio, Arganda del Rey, ice creams, helados para llevar, take away">
    </head>
    <body>
        <div class="wrapper">
            <header>
                <div id="wrapperRRSS">
                    <div id="telefono">
                        <p>Pedidos <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAFo9M/3AAAACXBIWXMAAAsSAAALEgHS3X78AAAA/klEQVQ4y42R0Y3CMBBEn11B6CB0EKQtADq4EqCD6+Do5EogHYQCRiIdQAekA+7He7KMjTI/cdbr2ZlZeIOkI0AEfr3yLenlHSFrfflhyDkicMuLEbj+EzqHpCfQAQRJPXAHMLNQ6opm9uADcllOuwAPYAC2oWJ1D0zpd+PFW2tETNSDpHO1we0AP60Gd3FqusjS3pjZUjIA7NL36euRdClzGIDSzVjLYQL2wGxmu5C9nrIkt6WWTzmd02iPowPukrpVBMBYqY+rFZjZXMn4a62CPMW+sAIwAwczWxLhMYV3fSMo1jEVRC2cQusmTbykldUwA4fASiSLvT/2kP8ARPp3ENKjhAgAAAAASUVORK5CYII=" width="15" height="15"/> <a href="tel:+34918759997">91 875 99 97</a></p>
                    </div>
                    <div id="rrss">
                        <a href="https://www.facebook.com/VeronaHeladoArtesanal" id="logo2" target="_blank"></a>
<!--                        <a href="#" id="logo3" target="_blank"></a>-->
                        <a href="https://www.instagram.com/veronaheladoartesanal" id="logo4" target="_blank"></a>
                    </div>
                </div>
                <a href="index.html"><img src="images/Verona_Helado_Artesanal-1.png" alt="Verona Helado Artesanal" id="logo_verona"></a>
                <div id="btnMenu"><a id="btnMenu" href="#"><span></span></a></div>
                <nav id="menu">
                    <ul>
                        <li><a href="index.html" id="logo1"></a></li>
                        <li><a href="#sobrenosotros">Sobre nosotros</a></li>
                        <li><a href="#sabores">Sabores</a></li>
                        <li><a href="promociones.html">Promociones</a></li>
                        <li><a href="#pedidos">Pedidos</a></li>
                        <li><a href="#contacto">Dónde estamos</a></li>
                        <li><a href="#contacto">Contacto</a></li>
                    </ul>
                </nav>
                
            </header>
            <main id="error404Main">
                <div id="error404Txt">
                    <p id="error404Txt2">¡Gracias! Nos pondremos en contacto contigo a la brevedad posible.</p>
                </div>
                
                <a href="#" id="btnUP">Subir</a>
            </main>
            <footer>
                <p>© 2017 Verona Helado artesanal. Todos los derechos reservados.</p>
                <div>
                    <a href="https://www.facebook.com/VeronaHeladoArtesanal" id="logo2" target="_blank"></a>
<!--                    <a href="#" id="logo3" target="_blank"></a>-->
                    <a href="https://www.instagram.com/veronaheladoartesanal" id="logo4" target="_blank"></a>
                </div>
                <ul id="legal">
                    <li><a href="index.html#contacto">Contacto</a></li>
                    <li><a href="politicadecookies.html" target="_blank">Política de cookies</a></li>
                    <li><a href="terminos_y_condiciones.html" target="_blank">Términos y condiciones de uso</a></li>
                </ul>
                
            </footer>
            <div id="designby"><p>Diseñada por <a href="https://es.linkedin.com/in/jaime-mena-martinez" target="_blank">MENA Graphic & Web</a></p></div>
        </div>
        <div id="cookiesWrap">
            <div id="infobox">
                <p>Esta web utiliza cookies para obtener datos estadísticos de la navegación de sus usuarios. Si continúa navegando acepta su uso.
                <a href="politicadecookies.html" target="_blank">Más información</a>
                <a onclick="aceptar_cookies();" style="cursor:pointer;">Cerrar</a></p>
            </div>
        </div>
        <script src="js/slider.js" type="text/javascript"></script>
        <script src="js/menu.js" type="text/javascript"></script>
        <script src="js/cookies.js" type="text/javascript"></script>
    </body>
</html>
 

<?php
 header( "refresh:2;index.html" );
 exit();
}
 
?>