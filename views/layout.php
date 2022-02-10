<?php

if(!isset($_SESSION)){
  session_start();
}
  $auth = $_SESSION['login'] ?? false;

  if(!isset($inicio)){
      $inicio = false;
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../build/css/app.css">
    <title>COOPERS</title>

</head>

<body>
    <header class="site-header <?php echo $inicio ? 'inicio' : ''; ?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/">
                    <img class="imagen-coopers" src="/build/img/logo-02.png" alt="Logotipo ADOPTA PET">
                </a>
                <div class="mobile-menu">
                    <a href="#navegacion">
                        <img src="/build/img/barras.svg" alt="Icono Menu">
                    </a>
                </div>
                <nav data-cy="navegacion-header" id="navegacion" class="navegacion">
                    <a href="/nosotros">Nosotros</a>
                    <a href="/servicios">Servicios</a>
                    <a href="/contacto">Contacto</a>
                    <?php if($auth): ?>
                    <a href="/logout">Cerrar Sesión</a>
                    <?php endif; ?>
                </nav>
            </div>
            <div class="header-texto">
                <h1 data-cy='heading-sitio'>CLÍNICA VETERINARIA</h1>
                <p data-cy='p-sitio'>Urgencias veterinarias 24hrs</p>
            </div>
        </div>
    </header>



<?php echo $contenido; ?>




    <footer class="site-footer ">
        <div class="contenedor contenedor-footer ">
            <nav data-cy="navegacion-footer"class="navegacion ">
                <a href="/nosotros ">Nosotros</a>
                <a href="/servicios ">Servicios</a>
                <a href="/contacto ">Contacto</a>
            </nav>
            <p class="urgencias ">Urgencias veterinarias 24hrs: <span>449-120-45-10</span></p>
            <p class="copyright "><span>COOPERS</span> Todos los derechos Reservados <?php echo date('Y') ?> &copy;</p>
        </div>
    </footer>

    <script src="../build/js/bundle.js "></script>
    <script src="../build/js/bundleform.js"></script>
</body>

</html>