<main class="section contenedor">
        <h3 class="centrar-texto">Administrador de Veterinaria</h3>
        <?php
        if($resultado){
            $mensaje =  mostrarNotificacion(intval($resultado));
            if($mensaje){?>
                <p class="alerta exito"><?php echo s($mensaje) ?></p> 
        <?php }   
         }   ?>

        <div class="boton-ir">
        <a href="/propiedades/crear" class="boton-admin">Nueva Cita</a>
        </div>
        <table class="propiedades">
           <thead>  
               <tr>
                   <th>ID</th>
                   <th>Fecha Cita</th>
                   <th>Hora Cita</th>
                   <th>Nombre Propietario</th>
                   <th>Correo</th>
                   <th>Teléfono</th>
                   <th>Nombre Mascota</th>
                   <th>Tipo</th>
                   <th>Otro Tipo</th>
                   <th>Raza</th>
                   <th>Padecimiento</th>
                   <th>Acciones</th>
               </tr>
           </thead>
           <tbody><!--Mostrar los Resultados -->
           <?php foreach( $citas as $cita ): ?>
               <tr>
                   <td><?php echo $cita->id  ;  ?></td>
                   <td><?php echo $cita->fecha;  ?></td>
                   <td><?php echo $cita->hora;  ?></td>
                   <td><?php echo $cita->nombre_propietario;  ?></td>
                   <td><?php echo $cita->correo;  ?></td>
                   <td><?php echo $cita->telefono;  ?></td>
                   <td><?php echo $cita->nombre_mascota;  ?></td>
                   <td><?php echo $cita->tipo;  ?></td>
                   <td><?php echo $cita->otrotipo;  ?></td>
                   <td><?php echo $cita->raza;  ?></td>
                   <td><?php echo $cita->comentario;  ?></td>
                   <td>
                       <form method="POST" action="/propiedades/eliminar" >
                       <input type="hidden" name="id" value="<?php echo $cita->id ; ?>">
                       <!-- CONTINUAR EN EL VIDEO -->
                       <input type="submit" class="boton-rojo-admin" value="Eliminar">
                       </form>
                       <div class="boton-ir">
                       <a href="/propiedades/actualizar?id=<?php echo $cita->id ;  ?>"  class="boton-verde-editar">Editar</a>
                       </div>
                   </td>
               </tr>
             <?php endforeach;?>
           </tbody>
        </table>
    </main>
