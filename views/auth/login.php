<main class="section contenedor">
        <h3 data-cy="heading" class="centrar-texto">INICIAR SESION</h3>
        <?php foreach($errores  as  $error): ?>
         <div  data-cy="alerta-login" class="alerta error"><?php  echo $error; ?></div>

        <?php endforeach; ?>
         <form data-cy="formulario-login" class="formulario" method="POST" action="/login" novalidate>
          <fieldset> 
            <legend>INGRESA TU USUARIO</legend>

            <label for="email">E-mail:*</label>
            <input type="email" name="email" placeholder="Tu correo"id="email" >

            <label for="password">Contraseña:*</label>
            <input  type="password" id="password" name="password" placeholder="Tu contraseña" >
          </fieldset>
          <div class="alinear-derecha">
          <input type="submit" value="Iniciar Sesión" class="boton-formulario  boton-rojo">
          </div>
         </form>        
    </main>