<?php
namespace Model;


class Cita{

    //Base de Datos 
    protected static $db;
    protected static $columnasDB = ['nombre_propietario', 'correo', 'telefono','id','fecha','hora','nombre_mascota','tipo','otrotipo','raza','comentario'];
    
    //Errores
    protected static  $errores = [];

    public $nombre_propietario;
    public $correo;
    public $telefono;
    public $id;
    public $fecha;
    public $hora;
    public $nombre_mascota;
    public $tipo;
    public $otrotipo;
    public $raza;
    public $comentario;

    //Definir la conexión a la BD
       public static function setDB($database){
        self::$db = $database;
       }

    public function __construct($args = [])
    {
        $this->nombre_propietario = $args['nombre_propietario'] ?? ''; 
        $this->correo = $args['correo'] ?? '';         
        $this->telefono = $args['telefono'] ?? ''; 
        $this->id = $args['id'] ?? null; 
        $this->fecha = $args['fecha'] ?? ''; 
        $this->hora = $args['hora'] ?? ''; 
        $this->idmascota = $args['idmascota'] ?? ''; 
        $this->idpropietario = $args['idpropietario'] ?? ''; 
        $this->nombre_mascota = $args['nombre_mascota'] ?? ''; 
        $this->tipo = $args['tipo'] ?? ''; 
        $this->otrotipo = $args['otrotipo'] ?? ''; 
        $this->raza = $args['raza'] ?? ''; 
        $this->comentario = $args['comentario'] ?? ''; 
    }
    public function guardar(){
        
        if(!is_null($this->id)){
            //Actualizar
            $this->actualizar();
        }else{
            //Crear un nuevo registro
            $this->crear();
        }
    }
    public function crear(){

        //Sanitizar los datos
       $atributos = $this->sanitizarAtributos();
     
        $insertpropietario = self::$db->prepare( " INSERT INTO propietario (nombre_propietario, correo, telefono) VALUES ( ?,?,?) ");
        $insertpropietario->bind_param("sss", $atributos['nombre_propietario'],$atributos['correo'], $atributos['telefono'] );
        $resultado = $insertpropietario->execute();

        $insertmascota = self::$db->prepare( " INSERT INTO mascota(nombre_mascota, tipo, otrotipo, raza, comentario) VALUES (?,?,?,?,?)");
        $lastid = mysqli_insert_id(self::$db); 
        $insertmascota->bind_param("sssss", $atributos['nombre_mascota'], $atributos['tipo'], $atributos['otrotipo'], $atributos['raza'], $atributos['comentario']);
        $resultado = $insertmascota->execute(); 

        $insertcitas = self::$db->prepare (" INSERT INTO cita ( fecha, hora, idmascota, idpropietario) VALUES (?,?,?,?) ");
        $insertcitas->bind_param("ssii", $atributos['fecha'], $atributos['hora'], $lastid, $lastid);
        $resultado = $insertcitas->execute();
        
        if($resultado){  
            header('Location: /admin?resultado=1');
            mysqli_stmt_close($resultado);
          }
       
        
    }
    //PASAR EL VALOR AL UPDATE DE LA TABLA PARA INVESTIGAR
    public function actualizar(){
        //Sanitizar los datos
       $atributos = $this->sanitizarAtributos();
       
       $valores = [];

       foreach($atributos as $value){
           $valores[] = "{$value}";
       }
      $updatepropietario = " UPDATE propietario  INNER JOIN cita ON  propietario.id = cita.idpropietario SET propietario.nombre_propietario = '$valores[0]' , propietario.correo = '$valores[1]' , propietario.telefono= '$valores[2]' ";  
      $updatepropietario .= " WHERE cita.id = '" . self::$db->escape_string($this->id) . "' ";
      self::$db->query($updatepropietario);
      $updatemascota = " UPDATE mascota  INNER JOIN cita ON  mascota.id = cita.idmascota SET mascota.nombre_mascota = '$valores[5]', mascota.tipo = '$valores[6]', mascota.otrotipo= '$valores[7]' , mascota.raza = '$valores[8]', mascota.comentario = '$valores[9]' ";
      $updatemascota .= " WHERE cita.id = '" . self::$db->escape_string($this->id) . "' ";
      self::$db->query($updatemascota);
      $updatecita = " UPDATE cita SET fecha = '$valores[3]', hora = '$valores[4]' ";
      $updatecita .= " WHERE cita.id = '" . self::$db->escape_string($this->id) . "' ";
      $actualizacion = self::$db->query($updatecita);

      if($actualizacion){  
        header('Location: /admin?resultado=2');
      }

    }

    //ELiminar un registro
    public function eliminar(){
     
        $consultaeliminar = "DELETE c, m, p FROM cita c LEFT JOIN mascota m on c.idmascota = m.id LEFT JOIN propietario p ON p.id = c.idpropietario WHERE c.id = " . self::$db->escape_string($this->id);
        $resultado = self::$db->query($consultaeliminar);
        if($resultado){
            header('location: /admin?resultado=3');
        }
    }

    //Identificar y unir los atributos de la BD
    public function atributos(){
        $atributos = [];
        foreach(self::$columnasDB as $columna ){
            if($columna === 'id') continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }
    public function sanitizarAtributos(){
        $atributos = $this->atributos();
        $sanitizando = [];

        foreach($atributos as $key => $value ){
            $sanitizando[$key] = self::$db->escape_string($value);
        }
        return $sanitizando;
    }

    //Validación
    public static function getErrores(){
        return self::$errores;
    }
  public function validar(){
    if(!$this->nombre_propietario || !$this->correo || !$this->telefono|| !$this->fecha|| !$this->hora|| !$this->nombre_mascota|| !$this->tipo  || !$this->comentario){
        self::$errores[] = "1";
    }

  }

  //Lista todos los registros
  public static function all(){
    //Escribir el Query 
   $query = "SELECT * FROM cita INNER JOIN mascota ON mascota.id = cita.idmascota INNER JOIN propietario ON propietario.id = cita.idpropietario ";
   $resultado = self::consultarSQL($query);

   return $resultado;

  }

  //Busca una registro por su id
  public static function find($id){
    $consulta = "SELECT * FROM cita INNER JOIN mascota ON mascota.id = cita.idmascota INNER JOIN propietario ON propietario.id = cita.idpropietario  WHERE cita.id = ${id} ";
    $resultado = self::consultarSQL($consulta);
    return (array_shift($resultado)); 

}
  

  public static function consultarSQL($query){
   //Consultar la base de datos
   $resultado = self::$db->query($query);
    
   //Iterar la base de datos
   $array = [];
   while($registro = $resultado->fetch_assoc()){
       $array[] = self::crearObjeto($registro);
   }
   //liberar la memoria
   $resultado->free();
   //retornar los resultados
   return $array;
  }
  protected static function crearObjeto($registro){
     $objeto = new self;
     foreach($registro as $key => $value ){
         if(property_exists( $objeto, $key )){
           $objeto->$key = $value;
         }
     }    
     return $objeto ;
  } 

  // Sincroniza el objeto en memoria con los cambios realizados por el usuario
  public function sincronizar($args = []){
     foreach($args as $key => $value){
         if(property_exists($this, $key ) && !is_null($value)){
             $this->$key = $value;
         }
     }
  }

}

