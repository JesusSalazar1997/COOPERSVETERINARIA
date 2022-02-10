<?php

namespace Model;

class Admin extends Cita {

    //Base de datos
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id', 'email', 'password'];


    //Errores
    protected static  $errores = [];

    public $id; 
    public $email;
    public $password;

    public function __construct($args =[]){
        $this-> id = $args['id']  ?? null;
        $this-> email = $args['email']  ?? '';
        $this-> password = $args['password']  ?? '';
    }
    
    public function validar(){
        if(!$this->email){
            self::$errores[] = 'EL CORREO ES OBLIGATORIO'; 
        }
        if(!$this->password){
            self::$errores[] = 'LA CONTRASEÑA ES OBLIGATORIA'; 
        }

        return self::$errores;
    }

    public function existeUsuario(){
        //Revisar si un suario existe o no
        $query = "SELECT * FROM " . self::$tabla . " WHERE email = '" . $this->email . "' LIMIT 1";
        $resultado = self::$db->query($query);
        if(!$resultado->num_rows){
            self::$errores[] = 'EL USUARIO INGRESADO NO ES EL CORRECTO';
            return;
        }
        return $resultado;
    }
    public function comprobarPassword($resultado){
        $usuario = $resultado->fetch_object();
        $autenticado = password_verify($this->password, $usuario->password);
        if(!$autenticado){
            self::$errores[] = 'EL PASSWORD ES INCORRECTO';
        }
        return $autenticado;
    }

    public function autenticar(){
        session_start();

        //Llenar el arreglo de session
        $_SESSION['usuario'] = $this->email;
        $_SESSION['login'] = true;

        header('Location: /admin');
    }
     
}