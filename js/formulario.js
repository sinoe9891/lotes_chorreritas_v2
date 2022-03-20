addEventListener();

//Ruta de Iconos
const rutaParcial = 'images/icons/',
    rutaAbsoluta = new URL(rutaParcial, document.baseURI).href;

function addEventListener() {
    document.querySelector('#formulario').addEventListener('submit', validarRegistro);
}

function validarRegistro(e) {
    e.preventDefault();
    let nombre = document.querySelector('#nombre').value,
        correo = document.querySelector('#correo').value,
        password = document.querySelector('#password').value,
        tipo = document.querySelector('#tipo').value;
    //Validar que el campo tenga algo escrito
    if (correo === '' || password === '') {
        //validación Falló
        Swal.fire({
			icon: 'error',
			title: 'Oops...',
            text: 'Ambos campos son obligatorios!'
        });
    } else {
        //Campos son correctos - Ejecutamos AJAX

        //Crear  FormData - Datos que se envían al servidor
        let datos = new FormData();
        datos.append('nombre', nombre);
        datos.append('correo', correo);
        datos.append('password', password);
        datos.append('accion', tipo);

        //Crear  el llamado a Ajax
        let xhr = new XMLHttpRequest();
        //Abrir la Conexión
        xhr.open('POST', 'includes/models/model-admin.php', true);

        //Retorno de Datos
        xhr.onload = function() {
                if (this.status === 200) {
                    //esta es la respuesta la que tenemos en el model
                    // let respuesta = xhr.responseText;
                    let respuesta = JSON.parse(xhr.responseText);
                    console.log(respuesta);
                    if (respuesta.respuesta === 'correcto') {
                        //si es un nuevo usuario 
						if (respuesta.tipo === 'login') {
							//redireccionar a la pagina principal
							window.location.href = 'index.php';
						} else if (respuesta.tipo == 'crear') {
                            Swal.fire({
								icon: 'success',
                                title: 'Usuario Creado',
                                text: 'El usuario se creó correctamente',
								showConfirmButton: false,
  								timer: 1500,
								position: 'center',
  
                            });
                        }
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Usuario o contraseña incorrecta'
                        })
                    }
                }
            }
            // Enviar la petición
        xhr.send(datos);
    }
}


function changeImage() {
	let passwordInput = document.getElementById('password');
    let icono = document.getElementById('candado').src;
    let abierto = rutaAbsoluta + 'candadoOpen.svg';
    let cerrado = rutaAbsoluta + 'candado.svg';

    if (icono === abierto) {
        document.getElementById('candado').src = cerrado;
        passwordInput.type = 'password';
    } else {
        document.getElementById('candado').src = abierto;
        passwordInput.type = 'text';
    }
}
