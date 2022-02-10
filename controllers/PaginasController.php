<?php
namespace Controllers;

use MVC\Router;
use Model\Cita;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController{

   public static function index(Router $router){
       $inicio = true;
      $router->render('paginas/index',[
        'inicio' => $inicio
      ]);
   }
   public static function nosotros(Router $router){
      $router->render('paginas/nosotros');
   }
   public static function servicios(Router $router){
    $router->render('paginas/servicios');
   }
   public static function contacto(Router $router){
       $mensaje = null;

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $respuestas = $_POST['contacto'];

        // debuguear($_POST);
       //Crear una insyancia de PHPMailer
       $mail = new PHPMailer();
       //Configurar SMTP
       $mail->isSMTP();
       $mail->Host = 'smtp.mailtrap.io';
       $mail->SMTPAuth = true;
       $mail->Username = '4be3aefcfea42e';
       $mail->Password = '39172a5e16a890';
       $mail->SMTPSecure = 'tls'; 
       $mail->Port = 2525;

       // Configurar el contenido del mail
       $mail->setFrom('admin@coopersveterinaria.com');
       $mail->addAddress('admin@coopersveterinaria.com','COOPERSVETERINARIA.com');
       $mail->Subject =  'Tines un Nuevo Mnesaje';

       //Habilitar HTML
       $mail->isHTML(true);
       $mail->CharSet = 'UTF-8';


       //Definir el contenido
       $contenido = '<html>';
       $contenido .= '<p>Tienes un nuevo mensaje de Cita</p>';
       $contenido .= '<p>Nombre Propietario: ' . $respuestas['nombre_propietario'] . '</p>';
       $contenido .= '<p>Correo Origen: ' . $respuestas['correo'] . '</p>';
       $contenido .= '<p>Teléfono Contacto: ' . $respuestas['telefono'] . '</p>';
       $contenido .= '<p>Fecha Cita: ' . $respuestas['fecha'] . '</p>';
       $contenido .= '<p>Hora Cita: ' . $respuestas['hora'] . '</p>';
       $contenido .= '<p>Nombre Mascota: ' . $respuestas['nombre_mascota'] . '</p>';
       $contenido .= '<p>Tipo Mascota: ' . $respuestas['tipo'] . '</p>';
       $contenido .= '<p>Otro Tipo Mascota: ' . $respuestas['otrotipo'] . '</p>';
       $contenido .= '<p>Raza Mascota: ' . $respuestas['raza'] . '</p>';
       $contenido .= '<p>Mensaje: ' . $respuestas['comentario'] . '</p>';
       $contenido .= '</html>';
       $mail->Body = $contenido;
       $mail->AltBody = 'Esto es texto alternativo';

       //Enviar el email
       if($mail->send()){
           $mensaje = "Mensaje Enviado Correctamente";
       }else {
        $mensaje = "El mensaje no se pudo enviar";
       }
    }
    $router->render('paginas/contacto', [
        'mensaje' => $mensaje
    ]);
   }

}