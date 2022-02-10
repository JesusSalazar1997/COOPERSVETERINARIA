<fieldset>
            <legend>Información del Propietario</legend>

            <label for="nombre_propietario">Nombre Completo Dueño: *</label>
            <input name="cita[nombre_propietario]" type="text" id="nombre_propietario" placeholder="Tu Nombre" value="<?php echo s($cita->nombre_propietario);?>"required>

            <label for="correo">E-mail: *</label>
            <input name="cita[correo]" type="email" id="correo" placeholder="Correo Electronico" value="<?php echo s($cita->correo);?>" required>

            <label for="telefono">Teléfono: *</label>
            <input name="cita[telefono]" type="text" id="telefono" placeholder="Número Teléfonico" value="<?php echo s($cita->telefono);?>"required>

            <legend>Fecha</legend>

            <label for="fecha">Fecha: *</label>
            <input  name="cita[fecha]" type="date" id="fecha" value="<?php echo s($cita->fecha);?>"required>

            <label for="hora">Hora: *</label>
            <input name="cita[hora]" type="time" id="hora" value="<?php echo s($cita->hora);?>" required>

            <div class="vacio"></div>

            <legend>Información de la Mascota</legend>

            <label for="nombre_mascota">Nombre Mascota: *</label>
            <input name="cita[nombre_mascota]" type="text" id="nombre_mascota" placeholder="Nombre de tu mascota"  value="<?php echo s($cita->nombre_mascota);?>"required>

            <label for="tipo">Tipo de Mascota: *</label>
            <select name="cita[tipo]" id="tipo" >
                    <option selected class="gris" disabled value="">--Seleccione--</option>
                    <option value="perro">Perro </option>
                    <option value="gato">Gato </option>
                    <option value="pez">Pez </option>
                    <option value="hamster">Hamster </option>
                    <option value="otro">Otro </option>
            </select>

            <input name="cita[otrotipo]" type="hidden" id="otrotipo" placeholder="Otro Especifique"  value="<?php echo s($cita->otrotipo);?>">

            <label for="raza">Raza Mascota: </label>
            <input name="cita[raza]" type="text" id="raza" placeholder="Raza(opcional)" value="<?php echo s($cita->raza) ;?>">

            <label  for="comentario">Mensaje ó Padecimiento: *</label>
            <textarea name="cita[comentario]" id="comentario" placeholder="Asunto" required><?php echo s($cita->comentario) ;?></textarea>
          
        </fieldset>