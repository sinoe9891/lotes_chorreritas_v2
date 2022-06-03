addEventListener();
// Hola
function addEventListener() {
	// Creación de registro
	let evento = document.querySelector('#formulario');
	if (evento) {
		evento.addEventListener('submit', validarRegistro);
	}
	// Actualizar de Lote
	let editarGraduate = document.querySelector('#editarLote');
	if (editarGraduate) {
		editarGraduate.addEventListener('submit', editarLote);
	}
	let editRegistro = document.querySelector('#editarRegistro');
	if (editRegistro) {
		editRegistro.addEventListener('submit', editarRegistro);
	}
	//Nuevo Registgro
	let fichaSolicitud = document.querySelector('#nuevoRegistro');
	if (fichaSolicitud) {
		fichaSolicitud.addEventListener('submit', nuevoCliente);
	}
	//Nuevo Bloque
	let nuevoBloque = document.querySelector('#nuevoBloque');
	if (nuevoBloque) {
		nuevoBloque.addEventListener('submit', newbloque);
	}
	//Nuevo Lote
	let nuevoLote = document.querySelector('#nuevoLote');
	if (nuevoLote) {
		nuevoLote.addEventListener('submit', newlote);
	}
	//Nuevo venta
	let nuevaventa = document.querySelector('#nuevaventa');
	if (nuevaventa) {
		nuevaventa.addEventListener('submit', newventa);
	}
	//Nuevo CAI
	let nuevaFact = document.querySelector('#nuevoCAI');
	if (nuevaFact) {
		nuevaFact.addEventListener('submit', newCAI);
	}
	//Nuevo cobro
	let nuevoCobro = document.querySelector('#nuevoCobro');
	if (nuevoCobro) {
		nuevoCobro.addEventListener('submit', newCobro);
	}
	//Nuevo cobro
	let nuevoUser = document.querySelector('#nuevoUsuario');
	if (nuevoUser) {
		nuevoUser.addEventListener('submit', nuevoUsuario);
	}
	//Nuevo venta
	let editarventa = document.querySelector('#editarventa');
	if (editarventa) {
		editarventa.addEventListener('submit', editventa);
	}
	let editarFact = document.querySelector('#editarCAI');
	if (editarFact) {
		editarFact.addEventListener('submit', editCAI);
	}
	let editarBloque = document.querySelector('#editarRegistroBloque');
	if (editarBloque) {
		editarBloque.addEventListener('submit', editarRegistroBloque);
	}
	let editarLote = document.querySelector('#editarRegistroLote');
	if (editarLote) {
		editarLote.addEventListener('submit', editarRegistroLote);
	}
	let editarUser = document.querySelector('#editarUsuario');
	if (editarUser) {
		editarUser.addEventListener('submit', editarUsuario);
	}
	//Asignar Lote
	let asignar = document.querySelector('#asignar_lote');
	if (asignar) {
		asignar.addEventListener('submit', asignarLote);
	}





	//Detectar Click de eliminar
	let eliminarImg = document.querySelector('.img-formulario');
	if (eliminarImg) {
		eliminarImg.addEventListener('click', eliminarFoto);
	}
	// Solicitud de Graduado
	let solicitud = document.querySelector('#formulario-solicitud');
	if (solicitud) {
		solicitud.addEventListener('submit', validarSolicitud);
	}
	// Solicitud de Graduando
	let solicitudGraduandos = document.querySelector('#form-graduandos');
	if (solicitudGraduandos) {
		solicitudGraduandos.addEventListener('submit', validarActualizacionGraduando);
	}
	// Aprobar Solicitud de GRADUANDO
	let aprobacionGraduando = document.querySelector('#form-aprobacion-graduando');
	if (aprobacionGraduando) {
		aprobacionGraduando.addEventListener('submit', aprobarSolicitudGraduando);
	}
	// Aprobar Solicitud de Graduado
	let aprobacion = document.querySelector('#formulario-aprobacion');
	if (aprobacion) {
		aprobacion.addEventListener('submit', aprobarSolicitud);
	}

}

minimizar();
function minimizar() {
	if (window.innerWidth < 400) {
		// alert('Hello' + window.innerWidth);
		document.getElementById('sidebar').classList.remove('active');
	}
}
window.onload = function () { almacenaValoresIniciales(); };
// Función almacenar la información de los formularios
function almacenaValoresIniciales() {
	var y;
	//cargo todos los formularios que haya en la página en un array
	var formularios = document.getElementsByTagName("form");
	//recorro todos los campos de todos los formularios y almaceno en dato de usuario valorinicial el     valor inicial del campo
	for (var x = 0; x < formularios.length; x++) {
		for (var i = 0; i < formularios[x].elements.length; i++) {

			formularios[x].elements[i].dataset.valorinicial = formularios[x].elements[i].value;

		}
	}
}
//Funcion FORMATO ID
function formatID(identidad) {

	const regExp = new RegExp(/[0-9]{4,4}-[0-9]{4,4}-[0-9]{5,5}/) // --- sin comillas
	const resultado = regExp.test(identidad);
	return resultado
	// console.log(resultado);
}

function formatCAI(codigo_cai) {

	const regExp = new RegExp(/[0-9]{3,3}-[0-9]{3,3}-[0-9]{2,2}-[0-9]{8,8}/) // --- sin comillas
	const resultado = regExp.test(codigo_cai);
	return resultado
	// console.log(resultado);
}

//Funcion para ver en que pagina estoy
function filename() {
	var rutaAbsoluta = self.location.href;
	var posicionUltimaBarra = rutaAbsoluta.lastIndexOf("/");
	var rutaRelativa = rutaAbsoluta.substring(posicionUltimaBarra + "/".length, rutaAbsoluta.length);
	return rutaRelativa;
}
//-------------------Solicitud de Graduado para actualziación-------------------
function nuevoCliente(e) {
	e.preventDefault();

	let horaSolicitud = document.querySelector('#horaSolicitud').value,
		fechaSolicitud = document.querySelector('#fechaSolicitud').value,
		nombres = document.querySelector('#nombre_completo').value,
		tipo = document.querySelector('#tipo').value,
		fechanac = document.querySelector('#fechanac').value,
		identidad = document.querySelector('#identidad').value,
		nacionalidad = document.querySelector('#nacionalidad').value,
		genero = document.querySelector('#genero').value,
		estado_civil = document.querySelector('#estado_civil').value,
		pais_reside = document.querySelector('#pais_reside').value,
		direccion = document.querySelector('#direccion').value,
		ciudad = document.querySelector('#ciudad').value,
		departamento = document.querySelector('#departamento').value,
		email = document.querySelector('#correo').value,
		celular = document.querySelector('#celular').value,
		telefono = document.querySelector('#telefono').value,
		dependientes = document.querySelector('#dependientes').value,
		profesion = document.querySelector('#profesion').value,
		observaciones = document.querySelector('#observaciones').value,
		empresa_labora = document.querySelector('#empresa_labora').value,
		direccion_empleo = document.querySelector('#direccion_empleo').value,
		telefono_empleo = document.querySelector('#telefono_empleo').value,
		cargo = document.querySelector('#cargo').value,
		tiempo_laborando = document.querySelector('#tiempo_laborando').value,
		sueldos = document.querySelector('#sueldos').value,
		remesas = document.querySelector('#remesas').value,
		otros_ingresos = document.querySelector('#otros_ingresos').value,
		prestamos = document.querySelector('#prestamos').value,
		alquiler = document.querySelector('#alquiler').value,
		otros_egresos = document.querySelector('#otros_egresos').value,
		nombre_conyugue = document.querySelector('#nombre_conyugue').value,
		fechnac_conyugue = document.querySelector('#fechnac_conyugue').value,
		identidad_conyugue = document.querySelector('#identidad_conyugue').value,
		celular_conyugue = document.querySelector('#celular_conyugue').value,
		empresa_labora_conyugue = document.querySelector('#empresa_labora_conyugue').value,
		telefono_empleo_conyugue = document.querySelector('#telefono_empleo_conyugue').value,
		cargo_conyugue = document.querySelector('#cargo_conyugue').value,
		tiempo_laborando_conyugue = document.querySelector('#tiempo_laborando_conyugue').value,
		nombre_referencia_1 = document.querySelector('#nombre_referencia_1').value,
		direccion_referencia_1 = document.querySelector('#direccion_referencia_1').value,
		celular_referencia_1 = document.querySelector('#celular_referencia_1').value,
		telefono_referencia_1 = document.querySelector('#telefono_referencia_1').value,
		empresa_labora_referencia_1 = document.querySelector('#empresa_labora_referencia_1').value,
		telefono_empleo_referencia_1 = document.querySelector('#telefono_empleo_referencia_1').value,
		nombre_referencia_2 = document.querySelector('#nombre_referencia_2').value,
		direccion_referencia_2 = document.querySelector('#direccion_referencia_2').value,
		celular_referencia_2 = document.querySelector('#celular_referencia_2').value,
		telefono_referencia_2 = document.querySelector('#telefono_referencia_2').value,
		empresa_labora_referencia_2 = document.querySelector('#empresa_labora_referencia_2').value,
		telefono_empleo_referencia_2 = document.querySelector('#telefono_empleo_referencia_2').value,

		nombre_beneficiario = document.querySelector('#nombre_beneficiario').value,
		genero_beneficiario = document.querySelector('#genero_beneficiario').value,
		identidad_beneficiario = document.querySelector('#identidad_beneficiario').value,
		direccion_beneficiario = document.querySelector('#direccion_beneficiario').value,
		ciudad_beneficiario = document.querySelector('#ciudad_beneficiario').value,
		departamento_beneficiario = document.querySelector('#departamento_beneficiario').value,
		celular_beneficiario = document.querySelector('#celular_beneficiario').value,
		pais_reside_beneficiario = document.querySelector('#pais_reside_beneficiario').value;

	let verficarid = formatID(identidad);
	let verficaridbeneficiario = formatID(identidad_beneficiario);

	if (nombres === '' || fechanac === '' || identidad === '' || nacionalidad === '' || genero === '' || estado_civil === '' || pais_reside === '' || direccion === '' || ciudad === '' || departamento === '' || dependientes === '' || profesion === '' || nombre_beneficiario === '' || genero_beneficiario === '' || identidad_beneficiario === '' || direccion_beneficiario === '' || ciudad_beneficiario === '' || departamento_beneficiario === '' || celular_beneficiario === '' || pais_reside_beneficiario === '') {
		//validación Falló
		Swal.fire({
			icon: 'error',
			title: 'Oops...',
			text: 'Debe de llenar los campos obligatorios de forma completa de las secciones 1, 2 y 5',
		});
	} else {
		if (verficarid && verficaridbeneficiario) {
			//Campos son correctos - Ejecutamos AJAX
			//Crear  FormData - Datos que se envían al servidor
			console.log('enviar');
			let datos = new FormData();
			datos.append('horaSolicitud', horaSolicitud);
			datos.append('fechaSolicitud', fechaSolicitud);
			datos.append('nombres', nombres);
			datos.append('fechanac', fechanac);
			datos.append('identidad', identidad);
			datos.append('nacionalidad', nacionalidad);
			datos.append('genero', genero);
			datos.append('estado_civil', estado_civil);
			datos.append('pais_reside', pais_reside);
			datos.append('direccion', direccion);
			datos.append('ciudad', ciudad);
			datos.append('departamento', departamento);
			datos.append('email', email);
			datos.append('celular', celular);
			datos.append('telefono', telefono);
			datos.append('dependientes', dependientes);
			datos.append('observaciones', observaciones);
			datos.append('profesion', profesion);
			datos.append('empresa_labora', empresa_labora);
			datos.append('direccion_empleo', direccion_empleo);
			datos.append('telefono_empleo', telefono_empleo);
			datos.append('cargo', cargo);
			datos.append('tiempo_laborando', tiempo_laborando);
			datos.append('sueldos', sueldos);
			datos.append('remesas', remesas);
			datos.append('otros_ingresos', otros_ingresos);
			datos.append('prestamos', prestamos);
			datos.append('alquiler', alquiler);
			datos.append('otros_egresos', otros_egresos);
			datos.append('nombre_conyugue', nombre_conyugue);
			datos.append('fechnac_conyugue', fechnac_conyugue);
			datos.append('identidad_conyugue', identidad_conyugue);
			datos.append('celular_conyugue', celular_conyugue);
			datos.append('empresa_labora_conyugue', empresa_labora_conyugue);
			datos.append('telefono_empleo_conyugue', telefono_empleo_conyugue);
			datos.append('cargo_conyugue', cargo_conyugue);
			datos.append('tiempo_laborando_conyugue', tiempo_laborando_conyugue);
			datos.append('nombre_referencia_1', nombre_referencia_1);
			datos.append('direccion_referencia_1', direccion_referencia_1);
			datos.append('celular_referencia_1', celular_referencia_1);
			datos.append('telefono_referencia_1', telefono_referencia_1);
			datos.append('empresa_labora_referencia_1', empresa_labora_referencia_1);
			datos.append('telefono_empleo_referencia_1', telefono_empleo_referencia_1);
			datos.append('nombre_referencia_2', nombre_referencia_2);
			datos.append('direccion_referencia_2', direccion_referencia_2);
			datos.append('celular_referencia_2', celular_referencia_2);
			datos.append('telefono_referencia_2', telefono_referencia_2);
			datos.append('empresa_labora_referencia_2', empresa_labora_referencia_2);
			datos.append('telefono_empleo_referencia_2', telefono_empleo_referencia_2);
			datos.append('nombre_beneficiario', nombre_beneficiario);
			datos.append('genero_beneficiario', genero_beneficiario);
			datos.append('identidad_beneficiario', identidad_beneficiario);
			datos.append('direccion_beneficiario', direccion_beneficiario);
			datos.append('ciudad_beneficiario', ciudad_beneficiario);
			datos.append('departamento_beneficiario', departamento_beneficiario);
			datos.append('celular_beneficiario', celular_beneficiario);
			datos.append('pais_reside_beneficiario', pais_reside_beneficiario);
			datos.append('accion', tipo);
			//Crear  el llamado a Ajax
			let xhr = new XMLHttpRequest();
			//Abrir la Conexión
			xhr.open('POST', 'includes/models/model-nuevo.php', true);

			//Retorno de Datos
			xhr.onload = function () {
				if (this.status === 200) {
					//esta es la respuesta la que tenemos en el model
					// let respuesta = xhr.responseText;
					let respuesta = JSON.parse(xhr.responseText);
					let urlactual = filename()
					console.log(respuesta);
					if (respuesta.respuesta === 'correcto') {
						//si es un nuevo usuario 
						if (respuesta.tipo == 'solicitud' && urlactual == 'new-client.php') {
							Swal.fire({
								icon: 'success',
								title: '¡Solicitud realizada!',
								text: 'Se verificarán los datos y se aprobará la actualización',
								position: 'center',
								showConfirmButton: true

							}).then(function () {
								window.location = "clientes.php";
							});;
						} else if (respuesta.tipo == 'solicitud' && urlactual == 'precontrato.php') {
							Swal.fire({
								icon: 'success',
								title: '¡Precontrato Enviado!',
								text: 'Se verificarán los datos y se contactarán con usted',
								position: 'center',
								showConfirmButton: true
							}).then(function () {
								window.location.reload();
							});;
						}
					} else {
						Swal.fire({
							icon: 'error',
							title: 'Oops...',
							text: 'Hubo un error en la solicitud'
						})
					}
				}
			}
			// Enviar la petición
			xhr.send(datos);
		} else {
			Swal.fire({
				icon: 'error',
				title: 'Oops...',
				text: 'ID Invalido Cliente y Beneficiario (13 digitos más guiones) '
			});
		}

	}
}

function newbloque(e) {
	e.preventDefault();

	let nombres = document.querySelector('#nombre').value,
		proyecto = document.querySelector('#proyecto').value,
		tipo = document.querySelector('#tipo').value;


	if (nombres === '') {
		//validación Falló
		Swal.fire({
			icon: 'error',
			title: 'Oops...',
			text: 'Debe de llenar los campos',
		});
	} else {
		//Campos son correctos - Ejecutamos AJAX
		//Crear  FormData - Datos que se envían al servidor
		console.log('enviar');
		let datos = new FormData();
		datos.append('nombres', nombres);
		datos.append('proyecto', proyecto);
		datos.append('accion', tipo);
		//Crear  el llamado a Ajax
		let xhr = new XMLHttpRequest();
		//Abrir la Conexión
		xhr.open('POST', 'includes/models/model-nuevo.php', true);

		//Retorno de Datos
		xhr.onload = function () {
			if (this.status === 200) {
				//esta es la respuesta la que tenemos en el model
				// let respuesta = xhr.responseText;
				let respuesta = JSON.parse(xhr.responseText);
				console.log(respuesta);
				if (respuesta.respuesta === 'correcto') {
					//si es un nuevo usuario 
					if (respuesta.tipo == 'nuevoBloque') {
						Swal.fire({
							icon: 'success',
							title: '¡Solicitud realizada!',
							text: 'Se ha creado el bloque con éxito',
							position: 'center',
							showConfirmButton: true

						}).then(function () {
							window.location = "bloques.php";
						});;
					}
				} else {
					Swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: 'Hubo un error en la solicitud'
					})
				}
			}
		}
		// Enviar la petición
		xhr.send(datos);
	}

}

function newlote(e) {
	e.preventDefault();
	let numero = document.querySelector('#numero').value,
		id_bloques = document.querySelector('#id_bloques').value,
		areav2 = document.querySelector('#areav2').value,
		estado = document.querySelector('#estado').value,
		colindancias = document.querySelector('#colindancias').value,
		path_lote = document.querySelector('#path_lote').value,
		combo = document.getElementById("id_bloques"),
		selected = combo.options[combo.selectedIndex].text,
		tipo = document.querySelector('#tipo').value;

	if (numero === '') {
		//validación Falló
		Swal.fire({
			icon: 'error',
			title: 'Oops...',
			text: 'Debe de llenar los campos',
		});
	} else {
		//Campos son correctos - Ejecutamos AJAX
		//Crear  FormData - Datos que se envían al servidor
		console.log('enviar');
		let datos = new FormData();
		datos.append('numero', numero);
		datos.append('id_bloques', id_bloques);
		datos.append('areav2', areav2);
		datos.append('estado', estado);
		datos.append('colindancias', colindancias);
		datos.append('path_lote', path_lote);
		datos.append('accion', tipo);
		//Crear  el llamado a Ajax
		let xhr = new XMLHttpRequest();
		//Abrir la Conexión
		xhr.open('POST', 'includes/models/model-nuevo.php', true);

		//Retorno de Datos
		xhr.onload = function () {
			if (this.status === 200) {
				//esta es la respuesta la que tenemos en el model
				// let respuesta = xhr.responseText;
				let respuesta = JSON.parse(xhr.responseText);
				console.log(respuesta);
				if (respuesta.respuesta === 'correcto') {
					//si es un nuevo usuario 
					if (respuesta.tipo == 'newlote') {
						Swal.fire({
							icon: 'success',
							title: '¡Solicitud realizada!',
							text: 'Se ha creado el bloque con éxito',
							position: 'center',
							showConfirmButton: true

						}).then(function () {
							window.location = "lotes.php";
						});;
					}
				} else if (respuesta.respuesta == 'duplicado') {
					Swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: 'El número de lote ¡ya existe!, por favor verifique'
					})
				} else {
					Swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: 'Hubo un error en la solicitud'
					})
				}
			}
		}
		// Enviar la petición
		xhr.send(datos);
	}

}

function newventa(e) {
	e.preventDefault();
	let fechaSolicitud = document.querySelector('#fechaSolicitud').value,
		horaSolicitud = document.querySelector('#horaSolicitud').value,
		id_registro = document.querySelector('#nombre_completo').value,
		fecha_venta = document.querySelector('#fecha_venta').value,
		tipo_venta = document.querySelector('#tipo_venta').value,
		prima = document.querySelector('#prima').value,
		plazo_meses = document.querySelector('#plazo_meses').value,
		vendedor = document.querySelector('#vendedor').value,
		cuenta_bancaria = document.querySelector('#cuenta_bancaria').value,
		fecha_primer_cuota = document.querySelector('#fecha_primer_cuota').value,
		dia_pago = document.querySelector('#dia_pago').value,
		proyecto = document.querySelector('#proyecto').value,
		tipo = document.querySelector('#tipo').value,
		bloque = document.querySelectorAll('.tabla-bloque');

	if (bloque.length == 0) {
		Swal.fire({
			icon: 'error',
			title: 'Oops...',
			text: 'Debe de seleccionar al menos un bloque',
		});
	}
	if (fechaSolicitud === '' || horaSolicitud === '' || nombre_completo === '' || fecha_venta === '' || prima === '' || plazo_meses === '' || vendedor === '' || cuenta_bancaria === '' || fecha_primer_cuota === '') {
		//validación Falló
		Swal.fire({
			icon: 'error',
			title: 'Oops...',
			text: 'Debe de llenar todos los campos',
		});
	} else {
		//Campos son correctos - Ejecutamos AJAX
		//Crear  FormData - Datos que se envían al servidor
		console.log('enviar');
		let datos = new FormData();
		datos.append('fechaSolicitud', fechaSolicitud);
		datos.append('horaSolicitud', horaSolicitud);
		datos.append('id_registro', id_registro);
		datos.append('fecha_venta', fecha_venta);
		datos.append('tipo_venta', tipo_venta);
		datos.append('prima', prima);
		datos.append('tipo_venta', tipo_venta);
		datos.append('plazo_meses', plazo_meses);
		datos.append('vendedor', vendedor);
		datos.append('cuenta_bancaria', cuenta_bancaria);
		datos.append('fecha_primer_cuota', fecha_primer_cuota);
		datos.append('dia_pago', dia_pago);
		datos.append('proyecto', proyecto);
		datos.append('cuenta_bancaria', cuenta_bancaria);
		for (let i = 0; i < bloque.length; i++) {
			hola = bloque[i].id;
			datos.append('lotes[]', hola);
			console.log(hola);
		}
		// datos.append('lotes', bloque);
		datos.append('accion', tipo);
		//Crear  el llamado a Ajax
		let xhr = new XMLHttpRequest();
		//Abrir la Conexión
		xhr.open('POST', 'includes/models/model-nuevo.php', true);
		console.log('enviar1');
		//Retorno de Datos
		xhr.onload = function () {
			if (this.status === 200) {
				console.log('Recibe respuesta');
				//esta es la respuesta la que tenemos en el model
				// let respuesta = xhr.responseText;
				let respuesta = JSON.parse(xhr.responseText);
				console.log(respuesta);
				if (respuesta.respuesta === 'correcto') {
					//si es un nuevo usuario 
					if (respuesta.tipo == 'newventa') {
						Swal.fire({
							icon: 'success',
							title: '¡Asignación realizada!',
							text: 'Ahora cambia el estado del lote',
							position: 'center',
							showConfirmButton: true

						}).then(function () {
							// urllote = '?ID=' + lote + '&bloque=' + bloque;
							window.location = "ventas.php";
						});;
					}
				} else {
					Swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: 'Hubo un error en la solicitud'
					})
				}
			}
		}
		// Enviar la petición
		xhr.send(datos);
	}

}
function newCAI(e) {
	e.preventDefault();
	let codigo_cai = document.querySelector('#codigo_cai').value,
		fecha_emision = document.querySelector('#fecha_emision').value,
		fecha_limite = document.querySelector('#fecha_limite').value,
		cantidad_otorgada = document.querySelector('#cantidad_otorgada').value,
		rango_inicial = document.querySelector('#rango_inicial').value,
		rango_final = document.querySelector('#rango_final').value,
		empresa_cai = document.querySelector('#empresa_cai').value,
		tipo = document.querySelector('#tipo').value;

	let verificarCAIini = formatCAI(rango_inicial);
	let verificarCAIfin = formatCAI(rango_final);
	if (codigo_cai === '' || fecha_emision === '' || fecha_limite === '' || cantidad_otorgada === '' || rango_inicial === '' || rango_final === '' || empresa_cai === '') {
		//validación Falló
		Swal.fire({
			icon: 'error',
			title: 'Oops...',
			text: 'Debe de llenar todos los campos',
		});
	} else if (codigo_cai != '' || fecha_emision != '' || fecha_limite != '' || cantidad_otorgada != '' || rango_inicial != '' || rango_final != '' || empresa_cai != '') {
		if (verificarCAIini && verificarCAIfin) {
			//Campos son correctos - Ejecutamos AJAX
			//Crear  FormData - Datos que se envían al servidor
			console.log('enviar');
			let datos = new FormData();
			datos.append('codigo_cai', codigo_cai);
			datos.append('fecha_emision', fecha_emision);
			datos.append('fecha_limite', fecha_limite);
			datos.append('cantidad_otorgada', cantidad_otorgada);
			datos.append('rango_inicial', rango_inicial);
			datos.append('rango_final', rango_final);
			datos.append('empresa_cai', empresa_cai);
			datos.append('accion', tipo);
			//Crear  el llamado a Ajax
			let xhr = new XMLHttpRequest();
			//Abrir la Conexión
			xhr.open('POST', 'includes/models/model-nuevo.php', true);
			console.log('enviar1');
			//Retorno de Datos
			xhr.onload = function () {
				if (this.status === 200) {
					console.log('Recibe respuesta');
					//esta es la respuesta la que tenemos en el model
					// let respuesta = xhr.responseText;
					let respuesta = JSON.parse(xhr.responseText);
					console.log(respuesta);
					if (respuesta.respuesta === 'correcto') {
						//si es un nuevo usuario 
						if (respuesta.tipo == 'nuevoCAI') {
							Swal.fire({
								icon: 'success',
								title: '¡Asignación realizada!',
								text: 'Ahora cambia el estado del lote',
								position: 'center',
								showConfirmButton: true

							}).then(function () {
								// urllote = '?ID=' + lote + '&bloque=' + bloque;
								window.location = "facturacion.php";
							});;
						}
					} else {
						Swal.fire({
							icon: 'error',
							title: 'Oops...',
							text: 'Hubo un error en la solicitud'
						})
					}
				}
			}
			// Enviar la petición
			xhr.send(datos);
		} else {
			Swal.fire({
				icon: 'error',
				title: 'Oops...',
				text: 'Correlativo Incial o Final Invalido'
			});
		}
	}

}

function newCobro(e) {
	e.preventDefault();
	let tipo = document.querySelector('#tipo').value,
		id_compra = document.querySelector('#id_compra').value,
		usuario = document.querySelector('#usuario').value,
		cuota = document.querySelector('#cuota').value,
		valor_cuota = document.querySelector('#valor_cuota').value,
		fecha_cuota = document.querySelector('#fecha_cuota').value,
		fecha_pagada = document.querySelector('#fecha_pagada').value,
		fecha_pago = document.querySelector('#fecha_pago').value,
		hora_pago = document.querySelector('#hora_pago').value,
		registro = document.querySelector('#registro').value,
		fecha_vencimiento = document.querySelector('#fecha_vencimiento').value,

		id_banco = document.querySelector('#id_banco').value,
		tipo_comprobante = document.querySelector('#tipo_comprobante').value,
		no_cuota = document.querySelector('#no_cuota').value,
		nombre_completo = document.querySelector('#nombre_completo').value,
		no_referencia = document.querySelector('#no_referencia').value,
		forma_pago = document.querySelector('#forma_pago').value,
		monto_restante = document.querySelector('#monto_restante').value,
		fotos = document.querySelector('#seleccionArchivos').files;

	// if(valor_cuota > cuota){
		console.log('entró');
		console.log(valor_cuota);
		residuocuota = valor_cuota % cuota;
		residuocuota = residuocuota.toFixed(2)
		console.log(residuocuota);
		numero_cuotas_pagadas = (valor_cuota-residuocuota)/cuota;
		numero_cuotas_pagadas = numero_cuotas_pagadas.toFixed(0);
		console.log(numero_cuotas_pagadas);
	// }else if(valor_cuota == cuota){
	// 	console.log('entró 2');
	// 	residuocuota = 0;
	// 	numero_cuotas_pagadas = 1;
		
	// }
	// console.log(fotos);
	let barraestado = document.cobroForm.children[0].children[2],
		span = barraestado.children[0], tamano = 0;
	barraestado.classList.remove('barra_verde', 'barra_roja');
	let enviar = false;

	if (fotos.length > 0) {
		for (var i = 0; i < fotos.length; i++) {
			const fsize = fotos.item(i).size;
			let file = parseFloat(((fsize / 1024) / 1024).toFixed(2));
			tamano = tamano + file;
			if (tamano > 10) {
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: 'Archivos demasidos grandes, deben de ser menores 10MB'
				});
				enviar = false;
				break;
			} else if (tamano <= 10) {
				enviar = true;
			}
		}
		console.log(tamano.toFixed(2) + 'MB');
	}

	if (valor_cuota === '' || fecha_cuota === '' || id_banco === '' || tipo_comprobante === '' || no_cuota === '' || nombre_completo === '' ||  forma_pago === '') {
		//validación Falló
		Swal.fire({
			icon: 'error',
			title: 'Oops...',
			text: 'Debe de llenar todos los campos',
		});
	}else if(valor_cuota < cuota){
		Swal.fire({
			icon: 'error',
			title: 'Oops...',
			text: 'El Valor de Cuota no es el correcto'
		});
	} else {
		//Campos son correctos - Ejecutamos AJAX
		//Crear  FormData - Datos que se envían al servidor
		// console.log('enviar');
		let datos = new FormData();
		datos.append('id_compra', id_compra);
		datos.append('usuario', usuario);
		datos.append('valor_cuota', valor_cuota);
		datos.append('residuocuota', residuocuota);
		datos.append('numero_cuotas_pagadas', numero_cuotas_pagadas);
		datos.append('fecha_cuota', fecha_cuota);
		datos.append('fecha_vencimiento', fecha_vencimiento);
		datos.append('fecha_pagada', fecha_pagada);
		datos.append('fecha_pago', fecha_pago);
		datos.append('hora_pago', hora_pago);
		datos.append('registro', registro);
		datos.append('id_banco', id_banco);
		datos.append('tipo_comprobante', tipo_comprobante);
		datos.append('no_cuota', no_cuota);
		datos.append('nombre_completo', nombre_completo);
		datos.append('no_referencia', no_referencia);
		datos.append('forma_pago', forma_pago);
		datos.append('monto_restante', monto_restante);
		for (const archivo of fotos) {
			datos.append('archivos[]', archivo);
		}
		console.log(fotos);
		// datos.append('lotes', bloque);
		datos.append('accion', tipo);
		//Crear  el llamado a Ajax
		let xhr = new XMLHttpRequest();
		//Abrir la Conexión
		xhr.open('POST', 'includes/models/model-nuevo.php', true);
		console.log('enviar1');
		//Retorno de Datos
		xhr.onload = function () {
			if (this.status === 200) {
				console.log('Recibe respuesta');
				//esta es la respuesta la que tenemos en el model
				// let respuesta = xhr.responseText;
				let respuesta = JSON.parse(xhr.responseText);
				console.log(respuesta);
				if (respuesta.respuesta === 'correcto') {
					//si es un nuevo usuario 
					if (respuesta.tipo == 'newCobro') {
						Swal.fire({
							icon: 'success',
							title: '¡Asignación realizada!',
							text: 'Ahora cambia el estado del lote',
							position: 'center',
							showConfirmButton: true

						}).then(function () {
							// urllote = '?ID=' + lote + '&bloque=' + bloque;
							window.location = "cobros.php";
						});;
					}
				}else if(respuesta.respuesta === 'errorfactura'){
					Swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: 'No hay Facturas Disponibles'
					})
				} else {
					Swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: 'Hubo un error en la solicitud'
					})
				}
			}
		}
		// Enviar la petición
		xhr.send(datos);
	}

}

function editCAI(e) {
	e.preventDefault();
	let codigo_cai = document.querySelector('#codigo_cai').value,
		fecha_emision = document.querySelector('#fecha_emision').value,
		fecha_limite = document.querySelector('#fecha_limite').value,
		cantidad_otorgada = document.querySelector('#cantidad_otorgada').value,
		rango_inicial = document.querySelector('#rango_inicial').value,
		rango_final = document.querySelector('#rango_final').value,
		empresa_cai = document.querySelector('#empresa_cai').value,
		estado = document.querySelector('#estado').value,
		id_cai = document.querySelector('#id_cai').value,
		tipo = document.querySelector('#tipo').value;

	let verificarCAIini = formatCAI(rango_inicial);
	let verificarCAIfin = formatCAI(rango_final);

	if (codigo_cai === '' || fecha_emision === '' || fecha_limite === '' || cantidad_otorgada === '' || rango_inicial === '' || rango_final === '' || empresa_cai === '') {
		//validación Falló
		Swal.fire({
			icon: 'error',
			title: 'Oops...',
			text: 'Debe de llenar todos los campos',
		});
	} else if (codigo_cai != '' || fecha_emision != '' || fecha_limite != '' || cantidad_otorgada != '' || rango_inicial != '' || rango_final != '' || empresa_cai != '') {
		if (verificarCAIini && verificarCAIfin) {
			//Campos son correctos - Ejecutamos AJAX
			//Crear  FormData - Datos que se envían al servidor
			console.log('enviar');
			let datos = new FormData();
			datos.append('codigo_cai', codigo_cai);
			datos.append('fecha_emision', fecha_emision);
			datos.append('fecha_limite', fecha_limite);
			datos.append('cantidad_otorgada', cantidad_otorgada);
			datos.append('rango_inicial', rango_inicial);
			datos.append('rango_final', rango_final);
			datos.append('empresa_cai', empresa_cai);
			datos.append('estado', estado);
			datos.append('id_cai', id_cai);
			datos.append('accion', tipo);
			//Crear  el llamado a Ajax
			let xhr = new XMLHttpRequest();
			//Abrir la Conexión
			xhr.open('POST', 'includes/models/model-editar-registro.php', true);
			console.log('enviar1');
			//Retorno de Datos
			xhr.onload = function () {
				if (this.status === 200) {
					console.log('Recibe respuesta');
					//esta es la respuesta la que tenemos en el model
					// let respuesta = xhr.responseText;
					let respuesta = JSON.parse(xhr.responseText);
					console.log(respuesta);
					if (respuesta.respuesta === 'correcto') {
						//si es un nuevo usuario 
						if (respuesta.tipo == 'editarCAI') {
							Swal.fire({
								icon: 'success',
								title: '¡Actualización!',
								text: 'Se ha realizado el cambio',
								position: 'center',
								showConfirmButton: true

							}).then(function () {
								// urllote = '?ID=' + lote + '&bloque=' + bloque;
								window.location = "facturacion.php";
							});;
						}
					} else {
						Swal.fire({
							icon: 'error',
							title: 'Oops...',
							text: 'Hubo un error en la solicitud'
						})
					}
				}
			}
			// Enviar la petición
			xhr.send(datos);
		}
	}
}
function editventa(e) {
	e.preventDefault();
	let fechaSolicitud = document.querySelector('#fechaSolicitud').value,
		horaSolicitud = document.querySelector('#horaSolicitud').value,
		id_registro = document.querySelector('#id_registro').value,
		id_ficha_compra = document.querySelector('#id_ficha_compra').value,
		id_contrato = document.querySelector('#id_contrato').value,
		fecha_venta = document.querySelector('#fecha_venta').value,
		tipo_venta = document.querySelector('#tipo_venta').value,
		prima = document.querySelector('#prima').value,
		plazo_meses = document.querySelector('#plazo_meses').value,
		vendedor = document.querySelector('#vendedor').value,
		cuenta_bancaria = document.querySelector('#cuenta_bancaria').value,
		fecha_primer_cuota = document.querySelector('#fecha_primer_cuota').value,
		dia_pago = document.querySelector('#dia_pago').value,
		proyecto = document.querySelector('#proyecto').value,
		estado = document.querySelector('#estado').value,
		tipo = document.querySelector('#tipo').value,
		bloque = document.querySelectorAll('.tabla-bloque');

	
	
	if (bloque.length == 0) {
		Swal.fire({
			icon: 'error',
			title: 'Oops...',
			text: 'Debe de seleccionar un bloque'
		})
	} else if (fechaSolicitud === '' || fecha_venta === '' || prima === '' || vendedor === '' || cuenta_bancaria === '' || fecha_primer_cuota === '') {
		//validación Falló
		Swal.fire({
			icon: 'error',
			title: 'Oops...',
			text: 'Debe de llenar todos los campos',
		});
	} else {
		//Campos son correctos - Ejecutamos AJAX
		//Crear  FormData - Datos que se envían al servidor
		console.log('enviar');
		let datos = new FormData();
		datos.append('fechaSolicitud', fechaSolicitud);
		datos.append('horaSolicitud', horaSolicitud);
		datos.append('id_registro', id_registro);
		datos.append('id_ficha_compra', id_ficha_compra);
		datos.append('id_contrato', id_contrato);
		datos.append('fecha_venta', fecha_venta);
		datos.append('tipo_venta', tipo_venta);
		datos.append('prima', prima);
		datos.append('tipo_venta', tipo_venta);
		datos.append('plazo_meses', plazo_meses);
		datos.append('vendedor', vendedor);
		datos.append('cuenta_bancaria', cuenta_bancaria);
		datos.append('fecha_primer_cuota', fecha_primer_cuota);
		datos.append('dia_pago', dia_pago);
		datos.append('estado', estado);
		datos.append('proyecto', proyecto);
		datos.append('cuenta_bancaria', cuenta_bancaria);
		for (let i = 0; i < bloque.length; i++) {
			hola = bloque[i].id;
			datos.append('lotes[]', hola);
			console.log(hola);
		}
		// datos.append('lotes', bloque);
		datos.append('accion', tipo);
		//Crear  el llamado a Ajax
		let xhr = new XMLHttpRequest();
		//Abrir la Conexión
		xhr.open('POST', 'includes/models/model-editar-registro.php', true);
		console.log('enviar1');
		//Retorno de Datos
		xhr.onload = function () {
			if (this.status === 200) {
				console.log('Recibe respuesta');
				//esta es la respuesta la que tenemos en el model
				// let respuesta = xhr.responseText;
				let respuesta = JSON.parse(xhr.responseText);
				console.log(respuesta);
				if (respuesta.respuesta === 'correcto') {
					//si es un nuevo usuario 
					if (respuesta.tipo == 'editarventa') {
						Swal.fire({
							icon: 'success',
							title: '¡Actualización!',
							text: 'Se ha realizado el cambio',
							position: 'center',
							showConfirmButton: true

						}).then(function () {
							// urllote = '?ID=' + lote + '&bloque=' + bloque;
							window.location = "ventas.php";
						});;
					}
				} else {
					Swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: 'Hubo un error en la solicitud'
					})
				}
			}
		}
		// Enviar la petición
		xhr.send(datos);
	}
}





function asignarLote(e) {
	e.preventDefault();
	if (document.getElementById('lote')) {
		let tipo = document.querySelector('#tipo').value,
			id_user = document.querySelector('#ID').value,
			bloque = document.querySelector('#bloque').value,
			lote = document.querySelector('#lote').value;
		console.log(tipo, id_user, bloque, lote);

		if (lote === '') {
			//validación Falló
			Swal.fire({
				icon: 'error',
				title: 'Oops...',
				text: 'Debe de llenar todos los campos'
			});
		} else {
			//Campos son correctos - Ejecutamos AJAX
			//Crear  FormData - Datos que se envían al servidor
			console.log('enviar');
			let datos = new FormData();
			datos.append('id_user', id_user);
			datos.append('bloque', bloque);
			datos.append('lote', lote);
			datos.append('asignar', tipo);
			//Crear  el llamado a Ajax
			let xhr = new XMLHttpRequest();
			//Abrir la Conexión
			xhr.open('POST', 'includes/models/model-asignar.php', true);

			//Retorno de Datos
			xhr.onload = function () {
				if (this.status === 200) {
					//esta es la respuesta la que tenemos en el model
					// let respuesta = xhr.responseText;
					let respuesta = JSON.parse(xhr.responseText);
					console.log(respuesta);
					if (respuesta.respuesta === 'correcto') {
						//si es un nuevo usuario 
						if (respuesta.tipo == 'asignar') {
							Swal.fire({
								icon: 'success',
								title: '¡Asignación realizada!',
								text: 'Ahora cambia el estado del lote',
								position: 'center',
								showConfirmButton: true

							}).then(function () {
								// urllote = '?ID=' + lote + '&bloque=' + bloque;
								// window.location = "edicion-lote.php" + urllote;
							});;
						}
					} else {
						Swal.fire({
							icon: 'error',
							title: 'Oops...',
							text: 'Hubo un error en la solicitud'
						})
					}
				}
			}
			// Enviar la petición
			xhr.send(datos);
		}

	} else {
		let id_user = document.querySelector('#ID').value,
			bloque = document.querySelector('#bloque').value;
		console.log(id_user, bloque);
		url = '?ID=' + id_user + '&bloque=' + bloque;
		window.location = "asignar-lote.php" + url;
	}

}


//-------------------Editar Lote-------------------
function editarLote(e) {
	e.preventDefault();

	let user_id = document.querySelector('#user_id').value,
		bloque = document.querySelector('#bloque').value,
		areav2 = document.querySelector('#areav2').value,
		estado = document.querySelector('#estado').value,
		path = document.querySelector('#path').value,

		// password = document.querySelector('#password').value,
		tipo = document.querySelector('#tipo').value;
	//Validar que el campo tenga algo escrito
	if (areav2 === '' || bloque === '' || estado === '' || path === '') {
		//validación Falló
		Swal.fire({
			icon: 'error',
			title: 'Oops...',
			text: 'Debe de llenar al menos un campo'
		});
	} else {
		//Campos son correctos - Ejecutamos AJAX

		//Crear  FormData - Datos que se envían al servidor
		let datos = new FormData();
		datos.append('id_register', id_register);
		datos.append('user_id', user_id);
		datos.append('bloque', bloque);
		datos.append('areav2', areav2);
		datos.append('estado', estado);
		datos.append('path', path);
		datos.append('accion', tipo);

		//Crear  el llamado a Ajax
		let xhr = new XMLHttpRequest();
		//Abrir la Conexión
		xhr.open('POST', 'includes/models/model-editar.php', true);

		//Retorno de Datos
		xhr.onload = function () {
			if (this.status === 200) {

				//esta es la respuesta la que tenemos en el model
				// let respuesta = xhr.responseText;
				let respuesta = JSON.parse(xhr.responseText);
				console.log(respuesta);
				if (respuesta.respuesta === 'correcto') {
					//si es un nuevo usuario 
					if (respuesta.tipo == 'solicitud') {
						Swal.fire({
							icon: 'success',
							title: '¡Lote Actualizado!',
							text: 'Esta solicitud se ha realizado con éxito',
							position: 'center',
							showConfirmButton: true
						}).then(function () {
							url = '?ID=' + user_id + '&bloque=' + bloque;
							window.location = "editar-lote.php" + url;
						});
					}
				} else {
					Swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: 'Hubo un error en la solicitud'
					})
				}
			}
		}
		// Enviar la petición
		xhr.send(datos);
	}

}

//Agregar un nuevo elemento de la
var lineCount = 0;
addAddressLine = function () {
	var contenido = document.querySelector('#bloque').value;
	var combo = document.getElementById("bloque");
	var selected = combo.options[combo.selectedIndex].text;
	// combo.remove(combo.selectedIndex) //Solo se agrego esta linea para eliminar del select
	let cuentaactual = document.querySelectorAll('.tabla-bloque').length;
	lineCount = cuentaactual;
	//agregar contenido
	var i = document.createElement('input');
	i.setAttribute("type", "text");
	i.setAttribute("id", contenido);
	i.setAttribute("name", contenido);
	i.setAttribute("value", selected);
	i.setAttribute("readonly", "readonly");

	//Regresar item al select/ Parte 2 del favor
	var btn = document.createElement('div');
	// btn.setAttribute("type", "button");
	btn.setAttribute("class", "btn btn-light-secondary me-1 mb-1");
	btn.setAttribute("id", "X");
	btn.setAttribute("name", "X");
	btn.setAttribute("value", "X");
	btn.setAttribute("readonly", "readonly");
	btn.innerHTML = "Eliminar";
	btn.id = selected;

	// Eliminar elemento
	btn.onclick = function () {
		var x = document.getElementById("bloque");
		var option = document.createElement("option");
		option.text = selected;
		x.add(option);

		document.getElementById(contenido).remove();
		document.getElementById(selected).remove();
		return;
	};

	// document.body.appendChild(btn);
	//insertar celda y elimnar filas
	var table = document.getElementById("tabla");
	var row = table.insertRow(lineCount);

	lineCount++;
	var row = table.insertRow(-1).innerHTML = '<td class="text-bold-500 tabla-bloque" name="fila[]" id="' + contenido + '" value="' + contenido + '">' + lineCount + '</td><td class="text-bold-500">' + selected + '</td><td class="text-bold-500"><button class="btn btn-danger" onclick="deleteRow(this)">Quitar</button></td>';
	document.getElementById("bloque").value = "";


	//eliminar fila
	return;

}

function deleteRow(r) {
	var table = document.getElementById("tabla");
	var rowCount = table.rows.length;
	//console.log(rowCount);

	if (rowCount <= 0)
		alert('No se puede eliminar el encabezado');
	else
		table.deleteRow(rowCount - 1);
}

//document.querySelectorAll('.tabla-bloque')[0].id[0]
//funcion para enviar filas de un array por medio de ajax para guardar en la base de datos
function guardar_lote() {
	//Obtener los datos del formulario
	let bloque = document.querySelectorAll('.tabla-bloque');
	let bloque_array = [];
	//enviar por ajax
	for (let i = 0; i < bloque.length; i++) {
		bloque_array.push(bloque[i].id);
	}
	//console.log(bloque_array);
	let datos = new FormData();
	datos.append('bloque', bloque_array);
	datos.append('user_id', user_id);
	datos.append('areav2', areav2);
	datos.append('path', path);
	datos.append('accion', 'guardar');

}

function editarRegistro(e) {
	e.preventDefault();

	let nombres = document.querySelector('#nombre').value,
		tipo = document.querySelector('#tipo').value,
		id_user = document.querySelector('#user_id').value,
		fechanac = document.querySelector('#fecha_nacimiento').value,
		identidad = document.querySelector('#identidad').value,
		nacionalidad = document.querySelector('#nacionalidad').value,
		genero = document.querySelector('#genero').value,
		estado_civil = document.querySelector('#estado_civil').value,
		direccion = document.querySelector('#direccion').value,
		ciudad = document.querySelector('#ciudad').value,
		departamento = document.querySelector('#departamento').value,
		email = document.querySelector('#correo').value,
		celular = document.querySelector('#celular').value,
		telefono = document.querySelector('#telefono').value,
		dependientes = document.querySelector('#dependientes').value,
		profesion = document.querySelector('#profesion').value,
		observaciones = document.querySelector('#observaciones').value,
		empresa_labora = document.querySelector('#lugar_empleo').value,
		direccion_empleo = document.querySelector('#direccion_empleo').value,
		telefono_empleo = document.querySelector('#telefono_empleo').value,
		cargo = document.querySelector('#cargo').value,
		tiempo_laborando = document.querySelector('#tiempo_laborando').value,
		pais_reside = document.querySelector('#pais_reside').value,

		sueldos = document.querySelector('#sueldos').value,
		remesas = document.querySelector('#remesas').value,
		otros_ingresos = document.querySelector('#otros_ingresos').value,
		prestamos = document.querySelector('#prestamos').value,
		alquiler = document.querySelector('#alquiler').value,
		otros_egresos = document.querySelector('#otros_egresos').value,

		nombre_conyugue = document.querySelector('#nombre_conyugue').value,
		fechnac_conyugue = document.querySelector('#fechanac_conyugue').value,
		identidad_conyugue = document.querySelector('#identidad_conyugue').value,
		celular_conyugue = document.querySelector('#celular_conyugue').value,
		empresa_labora_conyugue = document.querySelector('#empresa_labora_conyugue').value,
		telefono_empleo_conyugue = document.querySelector('#telefono_empleo_conyugue').value,
		cargo_conyugue = document.querySelector('#cargo_conyugue').value,
		tiempo_laborando_conyugue = document.querySelector('#tiempo_laborando_conyugue').value,

		id_referencia_1 = document.querySelector('#id_referencia_1').value,
		nombre_referencia_1 = document.querySelector('#nombre_referencia_1').value,
		direccion_referencia_1 = document.querySelector('#direccion_referencia_1').value,
		celular_referencia_1 = document.querySelector('#celular_referencia_1').value,
		telefono_referencia_1 = document.querySelector('#telefono_referencia_1').value,
		empresa_labora_referencia_1 = document.querySelector('#empresa_labora_referencia_1').value,
		telefono_empleo_referencia_1 = document.querySelector('#telefono_empleo_referencia_1').value,

		id_referencia_2 = document.querySelector('#id_referencia_2').value,
		nombre_referencia_2 = document.querySelector('#nombre_referencia_2').value,
		direccion_referencia_2 = document.querySelector('#direccion_referencia_2').value,
		celular_referencia_2 = document.querySelector('#celular_referencia_2').value,
		telefono_referencia_2 = document.querySelector('#telefono_referencia_2').value,
		empresa_labora_referencia_2 = document.querySelector('#empresa_labora_referencia_2').value,
		telefono_empleo_referencia_2 = document.querySelector('#telefono_empleo_referencia_2').value,

		nombre_beneficiario = document.querySelector('#nombre_beneficiario').value,
		genero_beneficiario = document.querySelector('#genero_beneficiario').value,
		identidad_beneficiario = document.querySelector('#identidad_beneficiario').value,
		pais_reside_beneficiario = document.querySelector('#pais_reside_beneficiario').value,
		direccion_beneficiario = document.querySelector('#direccion_beneficiario').value,
		ciudad_beneficiario = document.querySelector('#ciudad_beneficiario').value,
		departamento_beneficiario = document.querySelector('#departamento_beneficiario').value,
		celular_beneficiario = document.querySelector('#celular_beneficiario').value;


	let verficarid = formatID(identidad);
	let verficaridconyugue = formatID(identidad_conyugue);
	let verficaridbeneficiario = formatID(identidad_beneficiario);
	var formularios = document.getElementsByTagName("form");
	//recorro todos los campos de todos los formularios y comparo el dato de usuario valorinicial con el valor que actualmente contiene el campo, si ha cambiado activo el mensaje de aviso de abandono de la página.
	for (var x = 0; x < formularios.length; x++) {
		for (i = 0; i < formularios[x].elements.length; i++) {
			// compruebo si han cambiado el resto de campos
			// console.log(identidad.length);
			if (identidad_beneficiario.value !== '' && identidad.value !== '' && identidad.length == 15) {
				if (verficarid && verficaridbeneficiario) {
					if (formularios[x].elements[i].value !== formularios[x].elements[i].dataset.valorinicial) {

						let datos = new FormData();
						datos.append('id_user', id_user);
						datos.append('nombres', nombres);
						datos.append('fechanac', fechanac);
						datos.append('identidad', identidad);
						datos.append('nacionalidad', nacionalidad);
						datos.append('genero', genero);
						datos.append('estado_civil', estado_civil);
						datos.append('direccion', direccion);
						datos.append('ciudad', ciudad);
						datos.append('departamento', departamento);
						datos.append('email', email);
						datos.append('celular', celular);
						datos.append('telefono', telefono);
						datos.append('dependientes', dependientes);
						datos.append('profesion', profesion);
						datos.append('observaciones', observaciones);
						datos.append('empresa_labora', empresa_labora);
						datos.append('direccion_empleo', direccion_empleo);
						datos.append('telefono_empleo', telefono_empleo);
						datos.append('cargo', cargo);
						datos.append('tiempo_laborando', tiempo_laborando);
						datos.append('pais_reside', pais_reside);
						datos.append('sueldos', sueldos);
						datos.append('remesas', remesas);
						datos.append('otros_ingresos', otros_ingresos);
						datos.append('prestamos', prestamos);
						datos.append('alquiler', alquiler);
						datos.append('otros_egresos', otros_egresos);
						datos.append('nombre_conyugue', nombre_conyugue);
						datos.append('fechnac_conyugue', fechnac_conyugue);
						datos.append('identidad_conyugue', identidad_conyugue);
						datos.append('celular_conyugue', celular_conyugue);
						datos.append('empresa_labora_conyugue', empresa_labora_conyugue);
						datos.append('telefono_empleo_conyugue', telefono_empleo_conyugue);
						datos.append('cargo_conyugue', cargo_conyugue);
						datos.append('tiempo_laborando_conyugue', tiempo_laborando_conyugue);
						datos.append('id_referencia_1', id_referencia_1);
						datos.append('nombre_referencia_1', nombre_referencia_1);
						datos.append('direccion_referencia_1', direccion_referencia_1);
						datos.append('celular_referencia_1', celular_referencia_1);
						datos.append('telefono_referencia_1', telefono_referencia_1);
						datos.append('empresa_labora_referencia_1', empresa_labora_referencia_1);
						datos.append('telefono_empleo_referencia_1', telefono_empleo_referencia_1);
						datos.append('id_referencia_2', id_referencia_2);
						datos.append('nombre_referencia_2', nombre_referencia_2);
						datos.append('direccion_referencia_2', direccion_referencia_2);
						datos.append('celular_referencia_2', celular_referencia_2);
						datos.append('telefono_referencia_2', telefono_referencia_2);
						datos.append('empresa_labora_referencia_2', empresa_labora_referencia_2);
						datos.append('telefono_empleo_referencia_2', telefono_empleo_referencia_2);
						datos.append('nombre_beneficiario', nombre_beneficiario);
						datos.append('genero_beneficiario', genero_beneficiario);
						datos.append('identidad_beneficiario', identidad_beneficiario);
						datos.append('pais_reside_beneficiario', pais_reside_beneficiario);
						datos.append('direccion_beneficiario', direccion_beneficiario);
						datos.append('ciudad_beneficiario', ciudad_beneficiario);
						datos.append('departamento_beneficiario', departamento_beneficiario);
						datos.append('celular_beneficiario', celular_beneficiario);
						datos.append('accion', tipo);

						//Crear  el llamado a Ajax
						let xhr = new XMLHttpRequest();
						//Abrir la Conexión
						xhr.open('POST', 'includes/models/model-editar-registro.php', true);

						//Retorno de Datos
						xhr.onload = function () {
							if (this.status === 200) {

								//esta es la respuesta la que tenemos en el model
								// let respuesta = xhr.responseText;
								let respuesta = JSON.parse(xhr.responseText);
								console.log(respuesta);
								if (respuesta.respuesta === 'correcto') {
									//si es un nuevo usuario 
									if (respuesta.tipo == 'solicitud') {
										Swal.fire({
											icon: 'success',
											title: '¡Registro Actualizado!',
											text: 'Esta solicitud se ha realizado con éxito',
											position: 'center',
											showConfirmButton: true
										}).then(function () {
											url = '?nombres=' + nombres + '&identidad=' + identidad;
											window.location = "clientes.php" + url;
										});
									}
								} else {
									Swal.fire({
										icon: 'error',
										title: 'Oops...',
										text: 'Hubo un error en la solicitud'
									})
								}
							}
						}
						// Enviar la petición
						xhr.send(datos);

					} else {
						Swal.fire({
							icon: 'error',
							title: 'Oops...',
							text: 'No realizó ningún cambio'
						});
					}
				} else {
					Swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: 'ID Invalido Cliente y Beneficiario (13 digitos más guiones) '
					});
				}
			} else {
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: 'ID Invalido - Cliente y Beneficiario (13 digitos más guiones)'
				});
			}

		}
	}
}
function editarRegistroBloque(e) {
	e.preventDefault();

	let bloque = document.querySelector('#nombre').value,
		tipo = document.querySelector('#tipo').value,
		id_bloque = document.querySelector('#id_bloque').value,
		proyecto = document.querySelector('#proyecto').value,
		id_proyectob = document.querySelector('#id_proyectob').value;

	let datos = new FormData();
	datos.append('id_bloque', id_bloque);
	datos.append('bloque', bloque);
	datos.append('proyecto', proyecto);
	datos.append('id_proyectob', id_proyectob);
	datos.append('accion', tipo);
	//Validar que el campo tenga algo escrito
	if (nombre === '') {
		//validación Falló
		Swal.fire({
			icon: 'error',
			title: 'Oops...',
			text: 'Debe de llenar al menos un campo'
		});
	} else {
		//Crear  el llamado a Ajax
		let xhr = new XMLHttpRequest();
		//Abrir la Conexión
		xhr.open('POST', 'includes/models/model-editar-registro.php', true);

		//Retorno de Datos
		xhr.onload = function () {
			if (this.status === 200) {

				//esta es la respuesta la que tenemos en el model
				// let respuesta = xhr.responseText;
				let respuesta = JSON.parse(xhr.responseText);
				// console.log(respuesta);
				if (respuesta.respuesta === 'correcto') {
					//si es un nuevo usuario 
					if (respuesta.tipo == 'editbloque') {
						Swal.fire({
							icon: 'success',
							title: 'Bloque Actualizado!',
							text: 'Esta solicitud se ha realizado con éxito',
							position: 'center',
							showConfirmButton: true
						}).then(function () {
							window.location = "bloques.php";
						});
					}
				} else {
					Swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: 'Hubo un error en la solicitud'
					})
				}
			}
		}
		// Enviar la petición
		xhr.send(datos);
	}
}

function editarRegistroLote(e) {
	e.preventDefault();
	console.log('llego');
	let user_id = document.querySelector('#user_id').value,
		numero = document.querySelector('#numero').value,
		id_bloque = document.querySelector('#bloque').value,
		areav2 = document.querySelector('#areav2').value,
		colindancias = document.querySelector('#colindancias').value,
		path_lote = document.querySelector('#path_lote').value,
		tipo = document.querySelector('#tipo').value,
		estado = document.querySelector('#estado').value;

	let datos = new FormData();
	datos.append('numero', numero);
	datos.append('id_bloque', id_bloque);
	datos.append('areav2', areav2);
	datos.append('colindancias', colindancias);
	datos.append('path_lote', path_lote);
	datos.append('estado', estado);
	datos.append('user_id', user_id);
	datos.append('accion', tipo);

	//Validar que el campo tenga algo escrito
	if (numero === '') {
		//validación Falló
		Swal.fire({
			icon: 'error',
			title: 'Oops...',
			text: 'Debe de llenar al menos un campo'
		});
	} else {
		//Crear  el llamado a Ajax
		let xhr = new XMLHttpRequest();
		//Abrir la Conexión
		xhr.open('POST', 'includes/models/model-editar-registro.php', true);

		//Retorno de Datos
		xhr.onload = function () {
			if (this.status === 200) {

				//esta es la respuesta la que tenemos en el model
				// let respuesta = xhr.responseText;
				let respuesta = JSON.parse(xhr.responseText);
				console.log(respuesta);
				if (respuesta.respuesta === 'correcto') {
					//si es un nuevo usuario 
					if (respuesta.tipo == 'editlote') {
						Swal.fire({
							icon: 'success',
							title: 'Bloque Actualizado!',
							text: 'Esta solicitud se ha realizado con éxito',
							position: 'center',
							showConfirmButton: true
						}).then(function () {
							window.location = "lotes.php";
						});
					}
				} else {
					Swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: 'Hubo un error en la solicitud'
					})
				}
			}
		}
		// Enviar la petición
		xhr.send(datos);
	}
}
function editarUsuario(e) {
	e.preventDefault();
	console.log('llego');
	let user_id = document.querySelector('#user_id').value,
		nombre = document.querySelector('#nombre').value,
		nickname = document.querySelector('#nickname').value,
		apellidos = document.querySelector('#apellidos').value,
		email = document.querySelector('#email').value,
		role = document.querySelector('#role').value,
		tipo = document.querySelector('#tipo').value,
		estado = document.querySelector('#estado').value;

	let datos = new FormData();

	datos.append('user_id', user_id);
	datos.append('nombre', nombre);
	datos.append('apellidos', apellidos);
	datos.append('nickname', nickname);
	datos.append('email', email);
	datos.append('role', role);
	datos.append('estado', estado);
	datos.append('accion', tipo);

	//Validar que el campo tenga algo escrito
	if (nombre === '' || apellidos === '' || estado === '' || nickname === '' || email === '' || role === '') {
		//validación Falló
		Swal.fire({
			icon: 'error',
			title: 'Oops...',
			text: 'Debe de llenar todos los campos'
		});
	} else {
		//Crear  el llamado a Ajax
		let xhr = new XMLHttpRequest();
		//Abrir la Conexión
		xhr.open('POST', 'includes/models/model-editar-registro.php', true);

		//Retorno de Datos
		xhr.onload = function () {
			if (this.status === 200) {

				//esta es la respuesta la que tenemos en el model
				// let respuesta = xhr.responseText;
				let respuesta = JSON.parse(xhr.responseText);
				console.log(respuesta);
				if (respuesta.respuesta === 'correcto') {
					//si es un nuevo usuario 
					if (respuesta.tipo == 'editUsuario') {
						Swal.fire({
							icon: 'success',
							title: 'Usuario Actualizado!',
							text: 'Esta solicitud se ha realizado con éxito',
							position: 'center',
							showConfirmButton: true
						}).then(function () {
							window.location = "usuarios.php";
						});
					}
				} else {
					Swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: 'Hubo un error en la solicitud'
					})
				}
			}
		}
		// Enviar la petición
		xhr.send(datos);
	}
}


function nuevoUsuario(e) {
	e.preventDefault();

	let name = document.querySelector('#nombre').value,
		apellido = document.querySelector('#apellido').value,
		password = document.querySelector('#password').value,
		email = document.querySelector('#email').value,
		role = document.querySelector('#role').value,
		tipo = document.querySelector('#tipo').value,
		estado = document.querySelector('#estado').value;

	//Crear  FormData - Datos que se envían al servidor
	let datos = new FormData();
	datos.append('nombre', name);
	datos.append('apellido', apellido);
	datos.append('password', password);
	datos.append('correo', email);
	datos.append('role', role);
	datos.append('estado', estado);
	datos.append('accion', tipo);

	//Validar que el campo tenga algo escrito
	if (name === '' || apellido === '' || password === '' || estado === '' ||  email === '' || role === '') {
		//validación Falló
		Swal.fire({
			icon: 'error',
			title: 'Oops...',
			text: 'Debe de llenar todos los campos'
		});
	} else {
		//Campos son correctos - Ejecutamos AJAX

		//Crear  el llamado a Ajax
		let xhr = new XMLHttpRequest();
		//Abrir la Conexión
		xhr.open('POST', 'includes/models/model-admin.php', true);

		//Retorno de Datos
		xhr.onload = function () {
			if (this.status === 200) {
				//esta es la respuesta la que tenemos en el model
				// let respuesta = xhr.responseText;
				let respuesta = JSON.parse(xhr.responseText);
				console.log(respuesta);
				if (respuesta.respuesta === 'correcto') {
					//si es un nuevo usuario 
					if (respuesta.tipo == 'newUsuario') {
						Swal.fire({
							icon: 'success',
							title: '¡Solicitud realizada!',
							text: 'Se ha creado el usuario con éxito',
							position: 'center',
							showConfirmButton: true

						}).then(function () {
							window.location = "usuarios.php";
						});;
					}
				} else {
					Swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: 'Hubo un error en la solicitud'
					})
				}
			}
		}
		// Enviar la petición
		xhr.send(datos);
	}

}


















//-------------------Aprobar Solicitud-------------------
function aprobarSolicitud(e) {
	e.preventDefault();

	let user_id = document.querySelector('#user_id').value,
		horaSolicitud = document.querySelector('#horaSolicitud').value,
		fechaSolicitud = document.querySelector('#fechaSolicitud').value,
		estado = document.querySelector('#estado').value,
		id_temp = document.querySelector('#id_temp').value,
		nombres = document.querySelector('#nombre').value,
		firstname = document.querySelector('#firstname').value,
		secondname = document.querySelector('#secondname').value,
		apellidos = document.querySelector('#apellidos').value,
		primerapellido = document.querySelector('#primerapellido').value,
		segundoapellido = document.querySelector('#segundoapellido').value,
		clase = document.querySelector('#clase').value,
		codigo = document.querySelector('#codigo').value,
		nickname = document.querySelector('#apodo').value,
		nationality = document.querySelector('#nacionalidad').value,
		sex = document.querySelector('#genero').value,
		//Información Personal
		dateHB = document.querySelector('#fecha_nacimiento').value,
		country = document.querySelector('#pais').value,
		city = document.querySelector('#ciudad').value,
		address = document.querySelector('#direccion').value,
		correo = document.querySelector('#correo').value,
		correo1 = document.querySelector('#correo1').value,
		correo2 = document.querySelector('#correo2').value,
		mobile = document.querySelector('#celular').value,
		phone = document.querySelector('#telefono').value,
		empresaLabora = document.querySelector('#empresaLabora').value,
		rubroEmpresaLabora = document.querySelector('#rubroEmpresaLabora').value,
		areasInteres = document.getElementById('areasInteres').value,
		url_linkedin = document.querySelector('#url_linkedin').value,
		orientacion = document.querySelector('#orientacion').value,
		programa = document.querySelector('#programa').value,
		//Información Académica
		empresaPasantia = document.querySelector('#empresaPasantia').value,
		direccionEmpresaPasantia = document.querySelector('#direccionEmpresaPasantia').value,
		rubroEmpresaPasantia = document.querySelector('#rubroEmpresaPasantia').value,
		experienciaPasantia = document.querySelector('#experienciaPasantia').value,
		areaInvestigacionPasantia = document.querySelector('#areaInvestigacionPasantia').value,
		asesorTesis = document.querySelector('#asesorTesis').value,
		tituloTesis = document.querySelector('#tituloTesis').value,
		urlTesis = document.querySelector('#urlTesis').value,
		financiado = document.querySelector('#financiado').value,
		fondos_zamorano = document.querySelector('#fondos_zamorano').value,
		fondos_propios = document.querySelector('#fondos_propios').value,
		fondos_entidades = document.querySelector('#fondos_entidades').value,
		otras_entidades = document.querySelector('#otras_entidades').value,

		linkedin = document.querySelector('#linkedin').value,
		fallecido = document.querySelector('#fallecido').value,
		fechaFallecido = document.querySelector('#fechaFallecido').value,
		fechaNotaDuelo = document.querySelector('#fechaNotaDuelo').value,
		estatus = document.querySelector('#estatus').value,
		pa = document.querySelector('#pa').value,
		anioIA = document.querySelector('#anioIA').value,
		dia_graduacion = document.querySelector('#dia_graduacion').value,
		mes_graduacion = document.querySelector('#mes_graduacion').value,
		codigoIA = document.querySelector('#codigoIA').value,

		// password = document.querySelector('#password').value,
		tipo = document.querySelector('#tipo').value;
	// console.log(fallecido);
	// console.log(Date.parse(fechaFallecido));
	estado = 1;
	if (url_linkedin == '') {
		linkedin = 0;
	} else {
		linkedin = 1;
	}
	let otrasEnti, fondosz, fondosp;
	if (fondos_entidades === '') {
		otrasEnti = 0;
		// document.getElementById('otras_entidades').required = false;
	} else {
		otrasEnti = 1;
		// document.getElementById('otras_entidades').required = true;
	}

	if (fondos_zamorano === '0') {
		fondos_zamorano = '0';
	} else {
		fondos_zamorano = '1';
	}

	if (fondos_propios === '0') {
		fondos_propios = '0';
	} else {
		fondos_propios = '1';
	}

	//Validar que el campo tenga algo escrito
	if (nombres === '' || apellidos === '' || clase === '' || nationality === '') {
		//validación Falló
		Swal.fire({
			icon: 'error',
			title: 'Oops...',
			text: 'Debe de llenar al menos un campo'
		});
	} else {
		//Campos son correctos - Ejecutamos AJAX

		//Crear  FormData - Datos que se envían al servidor
		let datos = new FormData();
		datos.append('user_id', user_id);
		datos.append('id_temp', id_temp);
		datos.append('estado', estado);
		datos.append('fechaSolicitud', fechaSolicitud);
		datos.append('horaSolicitud', horaSolicitud);
		datos.append('nombres', nombres);
		datos.append('firstname', firstname);
		datos.append('secondname', secondname);
		datos.append('apellidos', apellidos);
		datos.append('primerapellido', primerapellido);
		datos.append('segundoapellido', segundoapellido);
		datos.append('clase', clase);
		datos.append('codigo', codigo);
		datos.append('nickname', nickname);
		datos.append('nationality', nationality);
		datos.append('sex', sex);
		//Información Personal
		datos.append('dateHB', dateHB);
		datos.append('country', country);
		datos.append('city', city);
		datos.append('address', address);
		datos.append('correo', correo);
		datos.append('correo1', correo1);
		datos.append('correo2', correo2);
		datos.append('mobile', mobile);
		datos.append('phone', phone);
		datos.append('empresaLabora', empresaLabora);
		datos.append('rubroEmpresaLabora', rubroEmpresaLabora);
		datos.append('areasInteres', areasInteres);
		datos.append('url_linkedin', url_linkedin);
		//Información Académica
		datos.append('programa', programa);
		datos.append('orientation', orientacion);
		datos.append('empresaPasantia', empresaPasantia);
		datos.append('direccionEmpresaPasantia', direccionEmpresaPasantia);
		datos.append('rubroEmpresaPasantia', rubroEmpresaPasantia);
		datos.append('experienciaPasantia', experienciaPasantia);
		datos.append('areaInvestigacionPasantia', areaInvestigacionPasantia);
		datos.append('asesorTesis', asesorTesis);
		datos.append('tituloTesis', tituloTesis);
		datos.append('urlTesis', urlTesis);
		datos.append('financiado', financiado);
		datos.append('fondos_zamorano', fondos_zamorano);
		datos.append('fondos_propios', fondos_propios);
		datos.append('fondos_entidades', fondos_entidades);
		datos.append('otras_entidades', otras_entidades);

		datos.append('linkedin', linkedin);
		datos.append('fallecido', fallecido);
		datos.append('fechaFallecido', fechaFallecido);
		datos.append('fechaNotaDuelo', fechaNotaDuelo);
		datos.append('estatus', estatus);
		datos.append('pa', pa);
		datos.append('anioIA', anioIA);
		datos.append('dia_graduacion', dia_graduacion);
		datos.append('mes_graduacion', mes_graduacion);
		datos.append('codigoIA', codigoIA);

		datos.append('accion', tipo);

		//Crear  el llamado a Ajax
		let xhr = new XMLHttpRequest();
		//Abrir la Conexión
		xhr.open('POST', 'includes/models/model-aprobar-solicitud.php', true);

		//Retorno de Datos
		xhr.onload = function () {
			if (this.status === 200) {
				//esta es la respuesta la que tenemos en el model
				// let respuesta = xhr.responseText;
				let respuesta = JSON.parse(xhr.responseText);
				// console.log(respuesta);
				if (respuesta.respuesta === 'correcto') {
					//si es un nuevo usuario 
					if (respuesta.tipo == 'solicitud') {
						Swal.fire({
							icon: 'success',
							title: '¡Solicitud realizada!',
							text: 'Esta solicitud se ha realizado con éxito',
							position: 'center',
							showConfirmButton: true
						}).then(function () {
							const fecha = new Date();
							// const hoy = fecha.getDate();
							const mesActual = fecha.getMonth() + 1;
							// url = '?nombres=' + nombres + '&apellidos=' + apellidos + '&clase=' + clase + '&codigo=' + codigo + '&nacionalidad=' + nationality + '&genero=' + sex;
							// window.location = "buscador-graduado.php" + url;
							window.location = "solicitudes.php?mesSolicitud=" + mesActual;
							window.location = "solicitudes.php";
						});
					}
				} else {
					Swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: 'Hubo un error en la solicitud'
					})
				}
			}
		}
		// Enviar la petición
		xhr.send(datos);
	}

}
//-------------------Aprobar Solicitud-------------------
function aprobarSolicitudGraduando(e) {
	e.preventDefault();

	let user_id = document.querySelector('#user_id').value,
		horaSolicitud = document.querySelector('#horaSolicitud').value,
		fechaSolicitud = document.querySelector('#fechaSolicitud').value,
		estado = document.querySelector('#estado').value,
		id_temp = document.querySelector('#id_temp').value,
		nombres = document.querySelector('#nombre').value,
		firstname = document.querySelector('#firstname').value,
		secondname = document.querySelector('#secondname').value,
		apellidos = document.querySelector('#apellidos').value,
		primerapellido = document.querySelector('#primerapellido').value,
		segundoapellido = document.querySelector('#segundoapellido').value,
		clase = document.querySelector('#clase').value,
		codigo = document.querySelector('#codigo').value,
		nickname = document.querySelector('#apodo').value,
		nationality = document.querySelector('#nacionalidad').value,
		sex = document.querySelector('#genero').value,
		//Información Personal
		dateHB = document.querySelector('#fecha_nacimiento').value,
		country = document.querySelector('#pais').value,
		city = document.querySelector('#ciudad').value,
		address = document.querySelector('#direccion').value,
		correo = document.querySelector('#correo').value,
		correo1 = document.querySelector('#correo1').value,
		correo2 = document.querySelector('#correo2').value,
		mobile = document.querySelector('#celular').value,
		phone = document.querySelector('#telefono').value,
		empresaLabora = document.querySelector('#empresaLabora').value,
		rubroEmpresaLabora = document.querySelector('#rubroEmpresaLabora').value,
		areasInteres = document.getElementById('areasInteres').value,
		url_linkedin = document.querySelector('#url_linkedin').value,
		orientacion = document.querySelector('#orientacion').value,
		programa = document.querySelector('#programa').value,
		//Información Académica
		empresaPasantia = document.querySelector('#empresaPasantia').value,
		direccionEmpresaPasantia = document.querySelector('#direccionEmpresaPasantia').value,
		rubroEmpresaPasantia = document.querySelector('#rubroEmpresaPasantia').value,
		experienciaPasantia = document.querySelector('#experienciaPasantia').value,
		areaInvestigacionPasantia = document.querySelector('#areaInvestigacionPasantia').value,
		asesorTesis = document.querySelector('#asesorTesis').value,
		tituloTesis = document.querySelector('#tituloTesis').value,
		urlTesis = document.querySelector('#urlTesis').value,
		financiado = document.querySelector('#financiado').value,
		fondos_zamorano = document.querySelector('#fondos_zamorano').value,
		fondos_propios = document.querySelector('#fondos_propios').value,
		fondos_entidades = document.querySelector('#fondos_entidades').value,
		otras_entidades = document.querySelector('#otras_entidades').value,

		linkedin = document.querySelector('#linkedin').value,
		fallecido = document.querySelector('#fallecido').value,
		fechaFallecido = document.querySelector('#fechaFallecido').value,
		fechaNotaDuelo = document.querySelector('#fechaNotaDuelo').value,
		estatus = document.querySelector('#estatus').value,
		pa = document.querySelector('#pa').value,
		anioIA = document.querySelector('#anioIA').value,
		dia_graduacion = document.querySelector('#dia_graduacion').value,
		mes_graduacion = document.querySelector('#mes_graduacion').value,
		codigoIA = document.querySelector('#codigoIA').value,

		// password = document.querySelector('#password').value,
		tipo = document.querySelector('#tipo').value;
	// console.log(fallecido);
	// console.log(Date.parse(fechaFallecido));
	estado = 1;
	if (url_linkedin == '') {
		linkedin = 0;
	} else {
		linkedin = 1;
	}
	let otrasEnti, fondosz, fondosp;
	if (fondos_entidades === '') {
		otrasEnti = 0;
		// document.getElementById('otras_entidades').required = false;
	} else {
		otrasEnti = 1;
		// document.getElementById('otras_entidades').required = true;
	}

	if (fondos_zamorano === '0') {
		fondos_zamorano = '0';
	} else {
		fondos_zamorano = '1';
	}

	if (fondos_propios === '0') {
		fondos_propios = '0';
	} else {
		fondos_propios = '1';
	}

	//Validar que el campo tenga algo escrito
	if (nombres === '' || apellidos === '' || clase === '' || nationality === '') {
		//validación Falló
		Swal.fire({
			icon: 'error',
			title: 'Oops...',
			text: 'Debe de llenar al menos un campo'
		});
	} else {
		//Campos son correctos - Ejecutamos AJAX

		//Crear  FormData - Datos que se envían al servidor
		let datos = new FormData();
		datos.append('user_id', user_id);
		datos.append('id_temp', id_temp);
		datos.append('estado', estado);
		datos.append('fechaSolicitud', fechaSolicitud);
		datos.append('horaSolicitud', horaSolicitud);
		datos.append('nombres', nombres);
		datos.append('firstname', firstname);
		datos.append('secondname', secondname);
		datos.append('apellidos', apellidos);
		datos.append('primerapellido', primerapellido);
		datos.append('segundoapellido', segundoapellido);
		datos.append('clase', clase);
		datos.append('codigo', codigo);
		datos.append('nickname', nickname);
		datos.append('nationality', nationality);
		datos.append('sex', sex);
		//Información Personal
		datos.append('dateHB', dateHB);
		datos.append('country', country);
		datos.append('city', city);
		datos.append('address', address);
		datos.append('correo', correo);
		datos.append('correo1', correo1);
		datos.append('correo2', correo2);
		datos.append('mobile', mobile);
		datos.append('phone', phone);
		datos.append('empresaLabora', empresaLabora);
		datos.append('rubroEmpresaLabora', rubroEmpresaLabora);
		datos.append('areasInteres', areasInteres);
		datos.append('url_linkedin', url_linkedin);
		//Información Académica
		datos.append('programa', programa);
		datos.append('orientation', orientacion);
		datos.append('empresaPasantia', empresaPasantia);
		datos.append('direccionEmpresaPasantia', direccionEmpresaPasantia);
		datos.append('rubroEmpresaPasantia', rubroEmpresaPasantia);
		datos.append('experienciaPasantia', experienciaPasantia);
		datos.append('areaInvestigacionPasantia', areaInvestigacionPasantia);
		datos.append('asesorTesis', asesorTesis);
		datos.append('tituloTesis', tituloTesis);
		datos.append('urlTesis', urlTesis);
		datos.append('financiado', financiado);
		datos.append('fondos_zamorano', fondos_zamorano);
		datos.append('fondos_propios', fondos_propios);
		datos.append('fondos_entidades', fondos_entidades);
		datos.append('otras_entidades', otras_entidades);

		datos.append('linkedin', linkedin);
		datos.append('fallecido', fallecido);
		datos.append('fechaFallecido', fechaFallecido);
		datos.append('fechaNotaDuelo', fechaNotaDuelo);
		datos.append('estatus', estatus);
		datos.append('pa', pa);
		datos.append('anioIA', anioIA);
		datos.append('dia_graduacion', dia_graduacion);
		datos.append('mes_graduacion', mes_graduacion);
		datos.append('codigoIA', codigoIA);

		datos.append('accion', tipo);

		//Crear  el llamado a Ajax
		let xhr = new XMLHttpRequest();
		//Abrir la Conexión
		xhr.open('POST', 'includes/models/model-aprobar-solicitud-graduando.php', true);

		//Retorno de Datos
		xhr.onload = function () {
			if (this.status === 200) {
				//esta es la respuesta la que tenemos en el model
				// let respuesta = xhr.responseText;
				let respuesta = JSON.parse(xhr.responseText);
				// console.log(respuesta);
				if (respuesta.respuesta === 'correcto') {
					//si es un nuevo usuario 
					if (respuesta.tipo == 'solicitud') {
						Swal.fire({
							icon: 'success',
							title: '¡Solicitud realizada!',
							text: 'Esta solicitud se ha realizado con éxito',
							position: 'center',
							showConfirmButton: true
						}).then(function () {
							const fecha = new Date();
							// const hoy = fecha.getDate();
							const mesActual = fecha.getMonth() + 1;
							// url = '?nombres=' + nombres + '&apellidos=' + apellidos + '&clase=' + clase + '&codigo=' + codigo + '&nacionalidad=' + nationality + '&genero=' + sex;
							// window.location = "buscador-graduado.php" + url;
							window.location = "graduandos-solicitudes.php?mesSolicitud=" + mesActual;
						});
					}
				} else {
					Swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: 'Hubo un error en la solicitud'
					})
				}
			}
		}
		// Enviar la petición
		xhr.send(datos);
	}

}

// Mantiene abierto el input entidades
if (document.getElementById('fondos_entidades')) {

	var checkBox = document.getElementById('fondos_entidades').value;
	let text = document.getElementById('endidades');
	if (checkBox == 1) {
		text.style.display = 'initial';
		checkBox = document.getElementById('fondos_entidades').checked = true;
		checkBox = document.getElementById('fondos_entidades').value = 1;
		checkBox = document.getElementById('otras_entidades').required = true;
	} else {
		text.style.display = 'none';
		checkBox = document.getElementById('fondos_entidades').checked = false;
		checkBox = document.getElementById('fondos_entidades').value = 0;
	}
}


//Cambiar valor de check al dar click y poder enviar
function chequeado(id_checkbox) {
	let id = document.getElementById(id_checkbox).checked;
	if (id == true) {
		document.getElementById(id_checkbox).value = 1;
	} else {
		document.getElementById(id_checkbox).value = 0;
	}
}

function entidades() {
	let checkBox = document.getElementById('fondos_entidades').checked;
	let text = document.getElementById('endidades');
	if (checkBox == true) {
		text.style.display = 'initial';
		checkBox = document.getElementById('fondos_entidades').value = 1;
		checkBox = document.getElementById('fondos_entidades').checked = true;
		checkBox = document.getElementById('otras_entidades').required = true;

	} else {
		text.style.display = 'none';
		checkBox = document.getElementById('fondos_entidades').value = 0;
		checkBox = document.getElementById('fondos_entidades').checked = false;
		checkBox = document.getElementById('otras_entidades').required = false;
		checkBox = document.getElementById('otras_entidades').value = '';

	}
}
//acciones de solicitudes cambia estado o elimina
function eliminarFoto(e) {
	// e.preventDefault();

	// console.log('click de acciones listado');
	// console.log(e.target);
	//Delegation
	// if (e.target.classList.contains('fa-check-circle')) {
	// 	if (e.target.classList.contains('completo')) {
	// 		e.target.classList.remove('completo');
	// 		cambiarEstadoSolicitud(e.target, 0);
	// 	} else {
	// 		e.target.classList.add('completo');
	// 		cambiarEstadoSolicitud(e.target, 1);
	// 	}
	// }
	// condicion de eliminar con alert
	if (e.target.classList.contains('fa-trash')) {
		Swal.fire({
			title: 'Borrar fotografía',
			text: "Esta acción no se puede deshacer",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Si, borrar!',
			cancelButtonText: 'Cancelar'
		}).then((result) => {
			if (result.value) {
				let solicitudEliminar = e.target.parentElement;
				eliminarSolicitudDB(solicitudEliminar, null);
				Swal.fire(
					'Eliminado!',
					'La fotografía fue eliminada!.',
					'success'
				).then(okay => {
					if (okay) {
						window.location.reload();
					}
				});
			}
		})
	}
}

function eliminarSolicitudDB(solicitudEliminar, estado) {
	let id_foto = document.getElementById('id_foto').value;
	//Crear llamado a AJAX
	let xhr = new XMLHttpRequest();

	//información FormData
	let datos = new FormData();
	datos.append('id_foto', id_foto);
	datos.append('accion', 'eliminarFoto');
	datos.append('estado', estado);

	// Open la conexión
	xhr.open('POST', 'includes/models/eliminar-img.php', true)

	//on load
	xhr.onload = function () {
		if (this.status === 200) {
			// console.log(JSON.parse(xhr.responseText));
		}
	}
	//Enviar la petición
	xhr.send(datos);
}


var today = new Date();
var dd = today.getDate();
var mm = today.getMonth() + 1; //January is 0!
var yyyy = today.getFullYear();
if (dd < 10) {
	dd = '0' + dd
}
if (mm < 10) {
	mm = '0' + mm
}
today = yyyy + '-' + mm + '-' + dd;

function opcionFallecido() {
	let optionFallecido = document.querySelector('#fallecido').value;
	let text = document.getElementById('fallecidoInput');
	let fechaNotaDuelo = document.getElementById('fechaNotaDuelo');
	// console.log(optionFallecido);
	if (optionFallecido == 1) {
		text.style.display = 'flex';
		fechaNotaDuelo.style.display = '';
		document.getElementById('fechaFallecido').required = true;
	} else if (optionFallecido == 0) {
		document.getElementById('fechaFallecido').value = '';
		document.getElementById('fechaNotaDuelo').value = today;
		document.getElementById('fechaFallecido').required = false;
		text.style.display = 'none';
		fechaNotaDuelo.style.display = 'none';
	}
}
// console.log(today);
if (document.getElementById("fechaFallecido") && document.getElementById("fechaNotaDuelo")) {
	document.getElementById("fechaFallecido").setAttribute("max", today);
	document.getElementById("fechaNotaDuelo").setAttribute("max", today);
}


if (document.querySelector('#fallecido')) {
	// Mantiene abierto el input Fallecido
	let optionFallecido1 = document.querySelector('#fallecido').value;
	let divFecha = document.getElementById('fallecidoInput');
	if (divFecha) {
		// console.log(optionFallecido1);
		if (optionFallecido1 == 1) {
			divFecha.style.display = '';
			document.getElementById('fechaFallecido').required = true;
			// console.log(divFecha);
		} else if (optionFallecido1 == 0) {
			document.getElementById('fechaFallecido').required = false;
			divFecha.style.display = 'none';
		}
	}
}

// function to calculate hours in days
function calculatehoursindays() {
	let hours = document.getElementById('horas').value;
	let days = document.getElementById('dias').value;
	let hoursinDays = hours / days;
	document.getElementById('horasDias').value = hoursinDays;

}


//Reloj
function cargarReloj() {

	// Haciendo uso del objeto Date() obtenemos la hora, minuto y segundo 
	var fechahora = new Date();
	var hora = fechahora.getUTCHours();
	var minuto = fechahora.getUTCMinutes();
	var segundo = fechahora.getUTCSeconds();

	// Variable meridiano con el valor 'AM' 
	var meridiano = "PM";


	// Si la hora es igual a 0, declaramos la hora con el valor 12 
	if (hora == 0) {
		hora = 12;
	}

	// Si la hora es mayor a 12, restamos la hora - 12 y mostramos la variable meridiano con el valor 'PM' 
	if (hora < 12) {

		hora = hora - 12;
		// Variable meridiano con el valor 'PM' 
		meridiano = "AM";

	}

	// Formateamos los ceros '0' del reloj 
	hora = (hora < 10) ? "0" + hora : hora;
	minuto = (minuto < 10) ? "0" + minuto : minuto;
	segundo = (segundo < 10) ? "0" + segundo : segundo;

	// Enviamos la hora a la vista HTML 
	var tiempo = hora + ":" + minuto + ":" + segundo + " " + meridiano;
	document.getElementById("relojnumerico").innerText = tiempo;
	document.getElementById("relojnumerico").textContent = tiempo;

	// Cargamos el reloj a los 500 milisegundos 
	setTimeout(cargarReloj, 500);

}

// Ejecutamos la función 'CargarReloj' 
cargarReloj();


var archivo = document.querySelector("#seleccionArchivos");
archivo.addEventListener("change", function (event) {
	console.log('Hola');
	var imagen = archivo.files[0];
	if (imagen) {
		console.log(imagen);
		var lector = new FileReader();
		console.log(lector);
		// lector.readAsText(imagen);
		let esto = lector.readAsDataURL(imagen);
		console.log(esto);
		console.log(lector.result);
		// document.getElementById("imagenPrevisualizacion").src = lector.result;
		lector.addEventListener("load", function () {
			document.getElementById("imagenPrevisualizacion").value = lector.result;
			document.getElementById("imagenPrevisualizacion").src = lector.result;
		});
	}
}
);