//Constantes y selectores
const formulario = document.querySelector('.formulario');
const main = document.querySelector('.vacio');
const nombrePropietario = document.querySelector('#nombre_propietario');
const email = document.querySelector('#correo');
const telefono = document.querySelector('#telefono');
const fecha = document.querySelector('#fecha');
const hora = document.querySelector('#hora');
const nombreMascota = document.querySelector('#nombre_mascota');
const tipoMascota = document.querySelector('#tipo');
const OtroTipoMascota = document.querySelector('#otrotipo');
const razaMascota = document.querySelector('#raza');
const mensaje = document.querySelector('#comentario');

const datos = {
    nombrePropietario: '',
    email: '',
    telefono: '',
    fecha: '',
    hora: '',
    nombreMascota: '',
    tipoMascota: '',
    razaMascota: '',
    mensaje: ''

}



document.addEventListener('DOMContentLoaded', function() {
    iniciarApp();
})

function iniciarApp() {
    //Almacena el nombre del Propietario
    nombreCita();
    //Almacena el email del propietario
    emailCita();
    //Almacena el número del propietario
    telefonoCita();
    //Deshabilitar dias pasados
    deshabilitarFechaAnterior();
    //Almacena la fecha de la cita en el Objeto
    fechaCita();
    //Almacena la hora de la fecha
    horaCita();
    //Almacena el nombre de la mascota
    nombreMascotaCita();
    //Almacenta el tipo de la mascota
    tipoMascotaCita();
    //Almacena la raza de la mascota
    razaMascotaCita();
    //Almacena el mensaje
    mensajeCita();

}

function nombreCita() {
    nombrePropietario.addEventListener('input', e => {
        const nombrePro = e.target.value.trim();

        if (nombrePro === '' || nombrePro.length < 3) {
            const alerta = document.querySelector('.alerta');
            if (alerta) {
                alerta.remove();
            }
            mostrarAlerta('Nombre no valido', true);
        } else {
            const alerta = document.querySelector('.alerta');
            if (alerta) {
                alerta.remove();
            }
            datos.nombrePropietario = nombrePro;
            mostrarAlerta('Nombre Valido');
        }

    })
}

function emailCita() {
    email.addEventListener('input', e => {
        const emailCl = e.target.value.trim();
        const re = /^([\da-z_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;
        if (!re.exec(emailCl)) {
            const alerta = document.querySelector('.alerta');
            if (alerta) {
                alerta.remove();
            }
            mostrarAlerta('Correo no valido', true)
        } else {
            const alerta = document.querySelector('.alerta');
            if (alerta) {
                alerta.remove();
            }
            mostrarAlerta('Correo valido')
            datos.email = emailCl;
        }
    })
}

function telefonoCita() {
    telefono.addEventListener('input', e => {
        let valor = e.target.value.trim();
        if (!/^[0-9]+$/.test(valor) || valor.length < 10 || valor === '') {
            e.preventDefault();
            const alerta = document.querySelector('.alerta');
            if (alerta) {
                alerta.remove();
            }
            mostrarAlerta('Telefono no valido', true);
        } else {
            const alerta = document.querySelector('.alerta');
            if (alerta) {
                alerta.remove();
            }
            mostrarAlerta('Telefono valido')
            datos.telefono = valor;
        }
    })
}

function fechaCita() {
    fecha.addEventListener('input', e => {

        const dia = new Date(e.target.value).getUTCDay();
        if ([0].includes(dia)) {
            e.preventDefault();
            fecha.value = '';
            mostrarAlerta('Los domingos no tenemos servicio', true);
        } else {
            datos.fecha = fecha.value;

        }
    })
}

function deshabilitarFechaAnterior() {
    const fechaActual = new Date().toISOString().slice(0, 10);
    fecha.min = fechaActual;
}

function horaCita() {
    hora.addEventListener('input', e => {
        const horaCi = e.target.value;
        const horaSe = horaCi.split(':')

        if (horaSe[0] < 10 || horaSe[0] > 18) {
            mostrarAlerta('Horario de 10am a 5pm', true);
            setTimeout(() => {
                hora.value = '';
            }, 3000);

        } else {
            datos.hora = horaCi;

        }
    })
}

function nombreMascotaCita() {
    nombreMascota.addEventListener('input', e => {
        const nombreMas = e.target.value.trim();

        if (nombreMas === '' || nombreMas.length < 2) {
            const alerta = document.querySelector('.alerta');
            if (alerta) {
                alerta.remove();
            }
            mostrarAlerta('Nombre no valido', true);
        } else {
            const alerta = document.querySelector('.alerta');
            if (alerta) {
                alerta.remove();
            }
            datos.nombreMascota = nombreMas;
            mostrarAlerta('Nombre Valido');
        }

    })
}

function tipoMascotaCita() {
    tipoMascota.addEventListener('input', e => {
        const tipoMas = e.target.value;
        if (tipoMas === 'otro') {
            const alerta = document.querySelector('#otrotipo');
            alerta.type = 'text';
            otrotipoMascota();
        } else {
            const alerta = document.querySelector('#otrotipo');
            alerta.type = 'hidden';
            datos.tipoMascota = tipoMas;


        }

    })
}

function otrotipoMascota() {
    OtroTipoMascota.addEventListener('input', e => {
        const OtrotipoMas = e.target.value;
        if (OtrotipoMas === '' || OtrotipoMas.length < 2) {
            const alerta = document.querySelector('.alerta');
            if (alerta) {
                alerta.remove();
            }
            mostrarAlerta('Tipo no valido', true);
        } else {
            const alerta = document.querySelector('.alerta');
            if (alerta) {
                alerta.remove();
            }
            datos.tipoMascota = OtrotipoMas;
            mostrarAlerta('Tipo Valido');
            console.log(datos);
        }

    })

}

function razaMascotaCita() {
    razaMascota.addEventListener('input', e => {
        const razaMas = e.target.value.trim();

        if (razaMas === '' || razaMas.length < 2) {
            const alerta = document.querySelector('.alerta');
            if (alerta) {
                alerta.remove();
            }
            mostrarAlerta('Raza no valida', true);
        } else {
            const alerta = document.querySelector('.alerta');
            if (alerta) {
                alerta.remove();
            }
            datos.razaMascota = razaMas;
            mostrarAlerta('Raza Valido');
        }

    })

}


function mensajeCita() {
    mensaje.addEventListener('input', e => {
        const mensajeCi = e.target.value.trim();

        if (mensajeCi === '' || mensajeCi.length < 2) {
            const alerta = document.querySelector('.alerta');
            if (alerta) {
                alerta.remove();
            }
            mostrarAlerta('Mensaje no valido', true);
        } else {
            const alerta = document.querySelector('.alerta');
            if (alerta) {
                alerta.remove();
            }
            datos.mensaje = mensajeCi;
            mostrarAlerta('Mensaje Valido');
            console.log(datos);
        }

    })

}

function mostrarAlerta(mensaje, error = null) {
    //Si hay una alerta no crear otra
    const alertaPrevia = document.querySelector('.alerta');
    if (alertaPrevia) {
        return;
    }

    const alerta = document.createElement('DIV');
    alerta.textContent = mensaje;
    alerta.classList.add('alerta');
    if (error) {
        alerta.classList.add('error');
    } else {
        alerta.classList.add('correcto')
    }
    main.appendChild(alerta);
    //Desaparezca despues de 3 segundos
    setTimeout(() => {
        alerta.remove();
    }, 5000);
}