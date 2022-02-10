<?php 

namespace Controllers;
use MVC\Router;
use Model\Cita;

class PropiedadController {

    public static function index(Router $router) {
        $citas = Cita::all();
      //Muestra mensaje condicional    
      $resultado = $_GET['resultado'] ?? null;

      $router->render("/propiedades/admin", [ 
            'citas' => $citas,
            'resultado' => $resultado
      ]);
    }
    public static function crear(Router $router) {
        $cita = new Cita;

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $cita = new Cita($_POST['cita']);
            $errores = $cita->validar();
        
          //Revisar que el arreglo de errores este vacio  
          if(empty($errores)){
            
            $cita->guardar();
        
          }
          }
        
        $router->render('propiedades/crear', [
           'cita' => $cita
        ]);
    } 
    public static function actualizar(Router $router){
        $id = validarORedireccionar('/admin');

        $cita = Cita::find($id);

        $errores = Cita::getErrores();
        // Método POST para actualizar 
  if($_SERVER['REQUEST_METHOD'] === 'POST'){
    //Asignar los atributos 
    $args  = $_POST['cita']; 
    
    $cita->sincronizar($args);

    $errores =$cita->validar();

  //Revisar que el arreglo de errores este vacio
  if(empty($errores)){

    $cita->guardar();

  
  }

  }
         $router->render('/propiedades/actualizar', [
           'cita' => $cita,
           'errores' => $errores
           
          ]);
    }
    public static function eliminar(){     
if($_SERVER['REQUEST_METHOD'] === 'POST'){
  $id = $_POST['id'];
  $id = filter_var($id, FILTER_VALIDATE_INT);

  if($id){
      $cita = Cita::find($id);
      $cita->eliminar();

}
      }
    }
}
