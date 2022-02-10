<?php

function conectarDB() : mysqli {
    $db = new mysqli('localhost','root', 'password', 'veterinaria');
    if(!$db){
        echo "Erro no se pudo conectar";
        exit;   
    }
    return $db;
}

