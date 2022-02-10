<main data-cy="heading-contacto" class="section contenedor">
        <h3 class="centrar-texto">Agenda una Cita</h3>
        
        <?php 
        if($mensaje) {?>
            <p data-cy="alerta-envio-formulario" class='alerta exito'><?php echo $mensaje; ?></p>
        <?php }   ?>
        <form data-cy="formulario-contacto" class="formulario" method="POST" action="/contacto">
        <fieldset>
            <legend>Información del Propietario</legend>

            <label for="nombre_propietario">Nombre Completo Dueño: *</label>
            <input data-cy="input-nombre-propietario" name="contacto[nombre_propietario]" type="text" id="nombre_propietario" placeholder="Tu Nombre" >

            <label for="correo">E-mail: *</label>
            <input data-cy="correo" name="contacto[correo]" type="email" id="correo" placeholder="Correo Electronico" >

            <label for="telefono">Teléfono: *</label>
            <input data-cy="telefono" name="contacto[telefono]" type="text" id="telefono" placeholder="Número Teléfonico"  >

            <legend>Fecha</legend>

            <label for="fecha">Fecha: *</label>
            <input  data-cy="fecha" name="contacto[fecha]" type="date" id="fecha" >

            <label for="hora">Hora: *</label>
            <input data-cy="hora" name="contacto[hora]" type="time" id="hora"  >

            <div class="vacio"></div>

            <legend>Información de la Mascota</legend>

            <label for="nombre_mascota">Nombre Mascota: *</label>
            <input data-cy="nombre-mascota" name="contacto[nombre_mascota]" type="text" id="nombre_mascota" placeholder="Nombre de tu mascota"  >

            <label for="tipo">Tipo de Mascota: *</label>
            <select data-cy="inpt-opciones" name="contacto[tipo]" id="tipo" >
                    <option selected class="gris" disabled value="">--Seleccione--</option>
                    <option value="perro">Perro </option>
                    <option value="gato">Gato </option>
                    <option value="pez">Pez </option>
                    <option value="hamster">Hamster </option>
                    <option value="otro">Otro </option>
            </select>

            <input name="contacto[otrotipo]" type="hidden" id="otrotipo" placeholder="Otro Especifique"  >

            <label for="raza">Raza Mascota: </label>
            <input data-cy="raza" name="contacto[raza]" type="text" id="raza" placeholder="Raza(opcional)" >

            <label  for="comentario">Mensaje ó Padecimiento: *</label>
            <textarea data-cy="input-mensaje" name="contacto[comentario]" id="comentario" placeholder="Asunto"></textarea>
            
            <div class="alinear-derecha">
                <input class="boton-formulario w-sm-100 boton-rojo" type="submit" Value="AGENDAR CITA">
            </div>
        </fieldset>
    </form>
    </main>