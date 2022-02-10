<?php

if(!isset($_SESSION)){
  session_start();
}
  $auth = $_SESSION['login'] ?? false;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/build/css/app.css">
    <title>COOPERS</title>

</head>

<body>
    <header class="site-header <?php echo $inicio ? 'inicio' : ''; ?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/index.php">
                    <img class="imagen-coopers" src="/build/img/logo-02.png" alt="Logotipo ADOPTA PET">
                </a>
                <div class="mobile-menu">
                    <a href="#navegacion">
                        <img src="/build/img/barras.svg" alt="Icono Menu">
                    </a>
                </div>
                <nav id="navegacion" class="navegacion">
                    <a href="Nosotros.php">Nosotros</a>
                    <a href="Servicios.php">Servicios</a>
                    <a href="Contacto.php">Contacto</a>
                    <?php if($auth): ?>
                    <a href="cerrar-sesion.php">Cerrar Sesión</a>
                    <?php endif; ?>
                </nav>
            </div>
            <div class="header-texto">
                <h1>CLÍNICA VETERINARIA</h1>
                <p>Urgencias veterinarias 24hrs</p>
            </div>
        </div>
    </header>
