<?php
if(isset($_POST['email'])) {
 
    // 
 
    $email_to = "karem.alba@capacitacioninformatica.com";
 
    $email_subject = "Contacto desde Web";
 
    function died($error) {
 
        // mensajes de error
 
        echo "Lo sentimos, hubo un error en sus datos y el formulario no puede ser enviado en este momento. ";
 
        echo "Detalle de los errores.<br /><br />";
 
        echo $error."<br /><br />";
 
        echo "Porfavor corrija estos errores e inténtelo de nuevo.<br /><br />";
        die();
    }
 
    // Se valida que los campos del formulairo estén llenos
 
    if(!isset($_POST['first_name']) ||
 
        !isset($_POST['last_name']) ||
 
        !isset($_POST['email']) ||
 
        !isset($_POST['telephone']) ||
 
        !isset($_POST['message'])) {
 
        die('Lo sentimos pero parece haber un problema con los datos enviados.');
 
    }
 //En esta parte el valor "name"  sirve para crear las variables que recolectaran la información de cada campo
 
    $first_name = $_POST['first_name']; // requerido
 
    $last_name = $_POST['last_name']; // requerido
 
    $email_from = $_POST['email']; // requerido
 
    $telephone = $_POST['telephone']; // no requerido 
 
    $message = $_POST['message']; // requerido
 
    $error_message = "";//Linea numero 52;
 
//En esta parte se verifica que la dirección de correo sea válida 
 
   $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
 
    $error_message .= 'La dirección de correo proporcionada no es válida.<br />';
 
  }
 
//En esta parte se validan las cadenas de texto
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$first_name)) {
 
    $error_message .= 'El formato del nombre no es válido<br />';
 
  }
 
  if(!preg_match($string_exp,$last_name)) {
 
    $error_message .= 'el formato del apellido no es válido.<br />';
 
  }
 
  if(strlen($message) < 2) {
 
    $error_message .= 'El formato del texto no es válido.<br />';
 
  }
 
  if(strlen($error_message) > 0) {
 
    die($error_message);
 
  }
 
//Este es el cuerpo del mensaje tal y como llegará al correo
 
    $email_message = "Contenido del Mensaje.\n\n";
 
 
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
 
 
 
    $email_message .= "Nombre: ".clean_string($first_name)."\n";
 
    $email_message .= "Apellido: ".clean_string($last_name)."\n";
 
    $email_message .= "Email: ".clean_string($email_from)."\n";
 
    $email_message .= "Teléfono: ".clean_string($telephone)."\n";
 
    $email_message .= "Mensaje: ".clean_string($message)."\n";
 
 
//Se crean los encabezados del correo
 
$headers = 'From: '.$email_from."\r\n".
 
'Reply-To: '.$email_from."\r\n" .
 
'X-Mailer: PHP/' . phpversion();
 
@mail($email_to, $email_subject, $email_message, $headers);
 
?>
 
 
 
<!-- Mensaje de que fue enviado-->

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="refresh" content="5;URL=http://capacitacioninformatica.com">
        <title>CI</title>
        <meta name="description" content="CI">
        <meta name="keywords" content="Capacitaciones, Informatica, Desarrollo web">
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:400,300|Raleway:300,400,900,700italic,700,300,600">
        <link rel="stylesheet" type="text/css" href="css/jquery.bxslider.css">
        <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/animate.css">
        <link rel="stylesheet" type="text/css" href="css/common.css">
    </head>
    <body>
    <div id="myDiv">
        <!--HEADER-->
        <div style="background: url('img/images4.jpg') no-repeat fixed; background-size: cover; min-height: 637px; position: relative;">
            <div class="bg-color">
                <div class="container">
                    <div class="row">
                        <div class="banner-info text-center wow fadeIn delay-05s">
                            <div class="row">
                                <h1><strong>Gracias por contactarnos. ¡Pronto nos pondremos en contacto con usted!</strong></h1>
                                <h2>Sera redirigido de vuelta en unos segundos.</h2>
                                <hr>
                            </div>
                            <footer id="footer">
                                <div class="container">
                                    <div class="row text-center">
                                        <p>&copy; CI - Derechos reservados.</p>
                                        <div class="credits">
                                            Designed  by <a href="https://capacitacioninformatica.com/">LeonSoft</a>
                                        </div>
                                    </div>
                                </div>
                            </footer>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ HEADER-->

    </div>

    <!--JS-->
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.rotator.js"></script>
    <script src="js/main.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/wow.js"></script>
    <script src="js/custom.js"></script>
    </body>
    </html>
<!--Mensaje Terminado-->

    Gracias! Nos pondremos en contacto contigo a la brevedad
 
<?php
 
}
 
?>