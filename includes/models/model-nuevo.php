<?php
include '../../includes/funciones.php';
include '../conexion.php';
date_default_timezone_set('America/Tegucigalpa');
$accion = $_POST['accion'];

//Código para crear administradores
if ($accion === 'solicitud') {
	$horaSolicitud = $_POST['horaSolicitud'];
	$fechaSolicitud = $_POST['fechaSolicitud'];
	$name = $_POST['nombres'];
	$fechanac = $_POST['fechanac'];
	$identidad = $_POST['identidad'];
	$nacionalidad = $_POST['nacionalidad'];
	$genero = $_POST['genero'];
	$estado_civil = $_POST['estado_civil'];
	$pais_reside = $_POST['pais_reside'];
	$direccion = $_POST['direccion'];
	$ciudad = $_POST['ciudad'];
	$departamento = $_POST['departamento'];
	$email = $_POST['email'];
	$celular = $_POST['celular'];
	$telefono = $_POST['telefono'];
	$dependientes = $_POST['dependientes'];
	$observaciones = $_POST['observaciones'];

	$profesion = $_POST['profesion'];
	$empresa_labora = $_POST['empresa_labora'];
	$direccion_empleo = $_POST['direccion_empleo'];
	$telefono_empleo = $_POST['telefono_empleo'];
	$cargo = $_POST['cargo'];
	$tiempo_laborando = $_POST['tiempo_laborando'];

	$sueldos = $_POST['sueldos'];
	$remesas = $_POST['remesas'];
	$otros_ingresos = $_POST['otros_ingresos'];
	$prestamos = $_POST['prestamos'];
	$alquiler = $_POST['alquiler'];
	$otros_egresos = $_POST['otros_egresos'];

	$nombre_conyugue = $_POST['nombre_conyugue'];
	$fechnac_conyugue = $_POST['fechnac_conyugue'];
	$identidad_conyugue = $_POST['identidad_conyugue'];
	$celular_conyugue = $_POST['celular_conyugue'];
	$empresa_labora_conyugue = $_POST['empresa_labora_conyugue'];
	$telefono_empleo_conyugue = $_POST['telefono_empleo_conyugue'];
	$cargo_conyugue = $_POST['cargo_conyugue'];
	$tiempo_laborando_conyugue = $_POST['tiempo_laborando_conyugue'];

	$nombre_referencia_1 = $_POST['nombre_referencia_1'];
	$direccion_referencia_1 = $_POST['direccion_referencia_1'];
	$celular_referencia_1 = $_POST['celular_referencia_1'];
	$telefono_referencia_1 = $_POST['telefono_referencia_1'];
	$empresa_labora_referencia_1 = $_POST['empresa_labora_referencia_1'];
	$telefono_empleo_referencia_1 = $_POST['telefono_empleo_referencia_1'];
	$nombre_referencia_2 = $_POST['nombre_referencia_2'];
	$direccion_referencia_2 = $_POST['direccion_referencia_2'];
	$celular_referencia_2 = $_POST['celular_referencia_2'];
	$telefono_referencia_2 = $_POST['telefono_referencia_2'];
	$empresa_labora_referencia_2 = $_POST['empresa_labora_referencia_2'];
	$telefono_empleo_referencia_2 = $_POST['telefono_empleo_referencia_2'];

	$nombre_beneficiario = $_POST['nombre_beneficiario'];
	$genero_beneficiario = $_POST['genero_beneficiario'];
	$identidad_beneficiario = $_POST['identidad_beneficiario'];
	$direccion_beneficiario = $_POST['direccion_beneficiario'];
	$ciudad_beneficiario = $_POST['ciudad_beneficiario'];
	$departamento_beneficiario = $_POST['departamento_beneficiario'];
	$celular_beneficiario = $_POST['celular_beneficiario'];
	$pais_reside_beneficiario = $_POST['pais_reside_beneficiario'];
	//Importar la conexión
	include '../conexion.php';
	try {
		$statement = $conn->prepare("INSERT INTO ficha_directorio (fecha_solicitud, hora_solicitud, nombre_completo, fecha_nacimiento, nacionalidad, identidad, genero, estado_civil, direccion, telefono, celular, dependientes, correo, ciudad, departamento, profesion, lugar_empleo, direccion_empleo, cargo, tiempo_laborando, telefono_empleo, observaciones) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
		$statement->bind_param('ssssssssssssssssssssss', $fechaSolicitud, $horaSolicitud, $name, $fechanac, $nacionalidad, $identidad, $genero, $estado_civil, $direccion, $telefono, $celular, $dependientes, $email, $ciudad, $departamento, $profesion, $empresa_labora, $direccion_empleo, $cargo, $tiempo_laborando, $telefono_empleo, $observaciones);
		$statement->execute();
		$last_id = mysqli_insert_id($conn);

		// Conyugue
		$statement = $conn->prepare("INSERT INTO conyugue (id_registro, identidad_conyugue, fechnac_conyugue, nombre_conyugue, celular_conyugue, empresa_labora_conyugue, telefono_empleo_conyugue, cargo_conyugue, tiempo_laborando_conyugue) VALUES (?,?,?,?,?,?,?,?,?)");
		$statement->bind_param('sssssssss', $last_id, $identidad_conyugue, $fechnac_conyugue, $nombre_conyugue, $celular_conyugue, $empresa_labora_conyugue, $telefono_empleo_conyugue, $cargo_conyugue,  $tiempo_laborando_conyugue);
		$statement->execute();

		//Financiero
		$statement = $conn->prepare("INSERT INTO financiera (id_registro, sueldos, remesas, otros_ingresos, prestamos, alquiler, otros_egresos) VALUES (?,?,?,?,?,?,?)");
		$statement->bind_param('sssssss', $last_id, $sueldos, $remesas, $otros_ingresos, $prestamos, $alquiler, $otros_egresos);
		$statement->execute();

		//Referencias
		$statement = $conn->prepare("INSERT INTO referencias (id_registro, nombre_referencia, direccion_referencia, celular_referencia, telefono_referencia, empresa_labora_referencia, telefono_empleo_referencia) VALUES (?,?,?,?,?,?,?)");
		$statement->bind_param('sssssss', $last_id, $nombre_referencia_1, $direccion_referencia_1, $celular_referencia_1, $telefono_referencia_1, $empresa_labora_referencia_1, $telefono_empleo_referencia_1);
		$statement->execute();

		$statement = $conn->prepare("INSERT INTO referencias (id_registro, nombre_referencia, direccion_referencia, celular_referencia, telefono_referencia, empresa_labora_referencia, telefono_empleo_referencia) VALUES (?,?,?,?,?,?,?)");
		$statement->bind_param('sssssss', $last_id, $nombre_referencia_2, $direccion_referencia_2, $celular_referencia_2, $telefono_referencia_2, $empresa_labora_referencia_2, $telefono_empleo_referencia_2);
		$statement->execute();
		//Beneficiario
		$statement = $conn->prepare("INSERT INTO beneficiario (id_registro, nombre_beneficiario, identidad_beneficiario, genero_beneficiario, direccion_beneficiario, ciudad_beneficiario, departamento_beneficiario, celular_beneficiario, pais_reside_beneficiario) VALUES (?,?,?,?,?,?,?,?,?)");
		$statement->bind_param('sssssssss', $last_id, $nombre_beneficiario, $identidad_beneficiario, $genero_beneficiario, $direccion_beneficiario, $ciudad_beneficiario, $departamento_beneficiario, $celular_beneficiario, $pais_reside_beneficiario);
		$statement->execute();

		if ($statement->affected_rows > 0) {
			$respuesta = array(
				//Esto es lo que se muestra en
				//JSON.parse(xhr.responseText); console.log(respuesta);
				'respuesta' => 'correcto',
				'name' => $name,
				'tipo' => $accion,
				'id_agregado' => $last_id
			);
		} else {
			$respuesta = array(
				'respuesta' => 'error',
			);
		}
		$statement->close();
		$conn->close();
	} catch (Exception $e) {
		//En caso de un error, tomar la exepción
		$respuesta = array(
			//Arreglo asociativo
			'pass' => $e->getMessage(),
			// 'pass' => $hash_password
		);
	}
	echo json_encode($respuesta);
}


if ($accion === 'nuevoBloque') {
	$name = $_POST['nombres'];
	$proyecto = $_POST['proyecto'];
	$accion = $_POST['accion'];

	//Importar la conexión
	include '../conexion.php';
	try {
		//Preparar la consulta de insertar bloque
		// 		id_bloque	
		// bloque	
		// id_proyecto	

		$statement = $conn->prepare("INSERT INTO bloques (bloque, id_proyecto) VALUES (?,?)");
		$statement->bind_param('ss', $name, $proyecto);
		$statement->execute();
		if ($statement->affected_rows > 0) {
			$respuesta = array(

				'respuesta' => 'correcto',
				'name' => $name,
				'tipo' => $accion,
				'id_agregado' => $statement->insert_id
			);
		} else {
			$respuesta = array(
				'respuesta' => 'error',
			);
		}
		$statement->close();
		$conn->close();
	} catch (Exception $e) {
		//En caso de un error, tomar la exepción
		$respuesta = array(
			//Arreglo asociativo
			'pass' => $e->getMessage(),
			// 'pass' => $hash_password
		);
	}
	echo json_encode($respuesta);
}

if ($accion === 'newlote') {
	$numero = $_POST['numero'];
	$id_bloques = $_POST['id_bloques'];
	$areav2 = $_POST['areav2'];
	$estado = $_POST['estado'];
	$colindancias = $_POST['colindancias'];
	$path_lote = $_POST['path_lote'];
	//Importar la conexión
	include '../conexion.php';
	try {
		//Preparar la consulta de insertar bloque
		$statement = $conn->prepare("INSERT INTO lotes (numero, id_bloque, areav2, estado, colindancias, path_lote) VALUES (?,?,?,?,?,?)");
		$statement->bind_param('ssssss', $numero, $id_bloques, $areav2, $estado, $colindancias, $path_lote);
		$enviado = '';
		$consulta = $conn->query("SELECT * FROM lotes");
		while ($row = $consulta->fetch_assoc()) {
			if ($row['numero'] == $numero && $row['id_bloque'] == $id_bloques) {
				$enviado = false;
			} elseif ($row['numero'] != $numero && $row['id_bloque'] != $id_bloques) {
				$enviado = true;
			}
		}
		if ($enviado == true) {
			$statement->execute();
			$respuesta = array(
				'respuesta' => 'correcto',
				'numerolote' => $numero,
				'id_bloques' => $id_bloques,
				'areav2' => $areav2,
				'estado' => $estado,
				'colindancias' => $colindancias,
				'path_lote' => $path_lote,
				'tipo' => $accion,
			);
		} else if ($enviado == false) {
			$respuesta = array(
				'respuesta' => 'duplicado',
				'numerolote' => $numero,
				'id_bloques' => $id_bloques,
				'areav2' => $areav2,
				'estado' => $estado,
				'colindancias' => $colindancias,
				'path_lote' => $path_lote,
				'tipo' => $accion,
			);
		} else {
			$respuesta = array(
				'respuesta' => 'error',
			);
		}

		$statement->close();
		$conn->close();
	} catch (Exception $e) {
		//En caso de un error, tomar la exepción
		$respuesta = array(
			//Arreglo asociativo
			'pass' => $e->getMessage(),
			// 'pass' => $hash_password
		);
	}
	echo json_encode($respuesta);
}


if ($accion === 'newventa') {

	//info general
	$fechaSolicitud = $_POST['fechaSolicitud'];
	$horaSolicitud = $_POST['horaSolicitud'];
	$id_registro = $_POST['id_registro'];
	$fecha_venta = $_POST['fecha_venta'];
	$prima = $_POST['prima'];
	$plazo_meses = $_POST['plazo_meses'];
	$plazo_anios = ($plazo_meses / 12);
	$fecha_primer_cuota = $_POST['fecha_primer_cuota'];
	$tipo_venta = $_POST['tipo_venta'];
	$vendedor = $_POST['vendedor'];
	$dia_pago = $_POST['dia_pago'];
	$cuenta_bancaria = $_POST['cuenta_bancaria'];
	$proyecto = $_POST['proyecto'];
	$estado = 'pa';
	$estado_lote = 'v';

	$resultado = obtenerProy($proyecto);
	$row = $resultado->fetch_assoc();
	$precio_vara2 = $row['precio_vara2'];
	$accion === 'newventa';

	// funcion insertar ficha_compra_lotes
	function insertarFichaCompra($idlote, $cliente, $idcompra)
	{
		include '../conexion.php';
		$stmtcompra = $conn->prepare("INSERT INTO ficha_compra_lotes (id_lote,id_registro,id_compra) VALUES (?,?,?)");
		$stmtcompra->bind_param('sss', $idlote, $cliente, $idcompra);
		$stmtcompra->execute();
		return;
	}
	// funciona actualizar lote
	function actualizarLote($estado, $cliente, $lote)
	{
		include '../conexion.php';
		$stmtLotes = $conn->prepare("UPDATE lotes SET estado = ?, id_registro = ? WHERE id_lote = ?");
		$stmtLotes->bind_param('sss', $estado, $cliente, $lote);
		$stmtLotes->execute();
		return;
	}

	// funciona cuota lote
	function cuotaLote($area, $preciovara, $idcompra, $meses)
	{
		include '../conexion.php';
		$stmtCuota = $conn->prepare("UPDATE ficha_compra SET cuota = ? WHERE id_ficha_compra = ?");
		$total = ($area * $preciovara);
		$cuota = ($total / $meses);
		$stmtCuota->bind_param('ss', $cuota, $idcompra);
		$stmtCuota->execute();
		return;
	}

	//generar un  id_contrato_compra con año, id_registro, mes y last_id
	function generarIdContrato($last_id, $lote, $id_registro, $fechaventa, $prima, $precio_vara2, $id_compra, $plazo)
	{
		include '../conexion.php';
		$ano = date('y', strtotime($fechaventa));
		$mes = date('m', strtotime($fechaventa));
		$id_contrato = 'LO' . $ano . $mes . '-' . $id_registro . '-' . $last_id;

		$stmtIdContrato = $conn->prepare("UPDATE ficha_compra SET id_contrato_compra = ? WHERE id_ficha_compra = ?");
		$stmtIdContrato->bind_param('ss', $id_contrato, $last_id);
		$stmtIdContrato->execute();

		$stmtIdContratoLote = $conn->prepare("UPDATE lotes SET id_contrato = ? WHERE id_lote = ?");
		$stmtIdContratoLote->bind_param('ss', $id_contrato, $lote);
		$stmtIdContratoLote->execute();

		totalCompra($precio_vara2, $prima, $id_compra, $id_contrato, $plazo);

		return;
	}


	// Calacular total de la compra
	function totalCompra($preciovara, $prima, $idcompra, $idcontrato, $plazo)
	{
		include '../conexion.php';
		$resultado = obtenerTotalVarasContrato($idcontrato);
		$row = $resultado->fetch_assoc();
		//suma de varas
		$sumavaras = $row['suma'];
		//gran total = suma de varas * precio vara
		$granTotal = ($sumavaras * $preciovara);

		//Saldo Actaul = gran total - prima
		$saldoActual = ($granTotal - $prima);
		//cuota = saldo actual / plazo
		$cuota = ($saldoActual / $plazo);
		//insertar cuota en ficha_compra
		$stmtTotal = $conn->prepare("UPDATE ficha_compra SET total_venta = ?, saldo_actual = ?, cuota = ? WHERE id_ficha_compra = ?");
		$stmtTotal->bind_param('ssss', $granTotal, $saldoActual, $cuota, $idcompra);
		$stmtTotal->execute();
		return;
	}


	//conexion
	try {
		//Preparar la consulta de insertar bloque
		$statement = $conn->prepare("INSERT INTO ficha_compra (fechaSolicitud, horaSolicitud, id_registro, fecha_venta, prima, plazo_anios, dia_pago, fecha_primer_cuota, plazo_meses, tipo, id_proyecto, estado, vendedor, cuenta_bancaria) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
		$statement->bind_param('ssssssssssssss', $fechaSolicitud, $horaSolicitud, $id_registro, $fecha_venta, $prima, $plazo_anios, $dia_pago, $fecha_primer_cuota, $plazo_meses, $tipo_venta, $proyecto, $estado, $vendedor, $cuenta_bancaria);
		$statement->execute();
		$last_id = mysqli_insert_id($conn);
		//ciclo for con arreglo de lotes de venta con metodo posts
		$lotes = $_POST["lotes"];
		for ($i = 0; $i < sizeof($lotes); $i++) {
			$id_lote = $lotes[$i];
			// echo $id_lote;
			$id_compra = $last_id;
			insertarFichaCompra($id_lote, $id_registro, $id_compra);
			actualizarLote($estado_lote, $id_registro, $id_lote);


			$resultadoPrecio = obtenerPrecioLote($id_lote);
			$row = $resultadoPrecio->fetch_assoc();
			$areav2 = $row['areav2'];

			// cuotaLote($areav2, $precio_vara2, $id_compra, $plazo_meses);

			generarIdContrato($last_id, $id_lote, $id_registro, $fecha_venta, $prima, $precio_vara2, $id_compra, $plazo_meses);

			$estadoquery = true;
		}
		//consulta si esta duplicado
		if ($statement->affected_rows > 0 && $estadoquery) {
			$respuesta = array(
				'respuesta' => 'correcto',
				'fechaSolicitud' => $fechaSolicitud,
				'horaSolicitud' => $horaSolicitud,
				'id_registro' => $id_registro,
				'tipo' => $accion
			);
		} else {
			$respuesta = array(
				'respuesta' => 'error',
			);
		}
		$statement->close();
		$conn->close();
	} catch (Exception $e) {
		//En caso de un error, tomar la exepción
		$respuesta = array(
			//Arreglo asociativo
			'pass' => $e->getMessage(),
			// 'pass' => $hash_password
		);
	}
	echo json_encode($respuesta);
}

if ($accion === 'newCobro') {
	//Variables recibidas por POST
	// $id_cuota_pagada = $_POST['id_cuota_pagada'];
	$id_compra = $_POST['id_compra'];
	$valor_cuota = $_POST['valor_cuota'];
	$fecha_cuota = $_POST['fecha_cuota'];
	$usuario = $_POST['usuario'];
	$fecha_vencimiento = $_POST['fecha_vencimiento'];
	$fecha_pagada = $_POST['fecha_pagada'];
	$fecha_pago = $_POST['fecha_pago'];
	$hora_pago = $_POST['hora_pago'];
	$registro = $_POST['registro'];
	$id_banco = $_POST['id_banco'];
	$tipo_comprobante = $_POST['tipo_comprobante'];
	$no_cuota = $_POST['no_cuota'];
	$nombre_completo = $_POST['nombre_completo'];
	$no_referencia = $_POST['no_referencia'];
	$forma_pago = $_POST['forma_pago'];
	$monto_restante = $_POST['monto_restante'];
	$searchString = " ";
	$replaceString = "";
	$name = date('d-M-Y') . '-' . $id_compra . '-' . $no_cuota . '-' . $nombre_completo;
	//Pasar a Minusculas
	$namefile = strtolower(quitar_acentos(str_replace($searchString, $replaceString, $name)));
	
	$residuocuota = $_POST['residuocuota'];
	$numero_cuotas_pagadas = $_POST['numero_cuotas_pagadas'];
	// $no_cuota = ($no_cuota - 1) + $numero_cuotas_pagadas;
	
	$monto_restante = $monto_restante - $valor_cuota;
	$stmt = $conn->prepare("UPDATE ficha_compra SET saldo_actual = ? WHERE id_ficha_compra = ?");
	$stmt->bind_param('ss', $monto_restante, $id_compra);
	$stmt->execute();
	// echo $stmt->error;

	
	//comprobar si ya estamos en el ultimo registro de la tabla
	$facturas = $conn->query("SELECT no_factura, id_factura FROM facturas WHERE estado_factura = 'disponible' order by id_factura asc limit 1");
	$codigoFactura = $facturas->fetch_assoc();

	if ($codigoFactura > 0) {
		
		try {
			//Preparar la consulta de insertar Cobro
			$statement = $conn->prepare("INSERT INTO cobros (id_cuota_pagada, numero_cuotas_pagadas, id_contrato, cantidad_pagada, monto_restante, fecha_pagada, hora_pagada, fecha_cuota, fecha_vencimiento, id_banco, tipo_comprobante, no_referencia, forma_pago) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
			//Asignar los valores de los parámetros
			$statement->bind_param('sssssssssssss', $no_cuota, $numero_cuotas_pagadas, $id_compra, $valor_cuota, $monto_restante, $fecha_pago, $hora_pago, $fecha_cuota, $fecha_vencimiento, $id_banco, $tipo_comprobante, $no_referencia, $forma_pago);
			$statement->execute();
			$last_id = mysqli_insert_id($conn);





			$carpeta = '../../src/recibos/' . $id_compra . '/';
			$ruta = 'src/recibos/' . $id_compra . '/';

			$no_factura = $codigoFactura['no_factura'];
			$id_factura = $codigoFactura['id_factura'];
			$emitida = 'emitida';
			$stmt = $conn->prepare("UPDATE facturas SET id_cobro = ?, contrato = ?, fecha_pago = ?, hora_pago = ?, monto_pagado = ?, saldo_actual = ?, id_registro = ?, estado_factura = ?, usuario = ?  WHERE id_factura = ?");
			$stmt->bind_param('ssssssssss', $last_id, $id_compra, $fecha_pago, $hora_pago, $valor_cuota, $monto_restante, $registro, $emitida, $usuario, $id_factura);
			$stmt->execute();
	
			$stmt = $conn->prepare("SELECT id_ficha_compra, saldo_actual, total_venta, id_registro FROM ficha_compra WHERE id_ficha_compra = ?");
			$stmt->bind_param('s', $id_compra);
			$stmt->execute();
			$resultado = $stmt->get_result();
			$row = $resultado->fetch_assoc();
			$id_ficha_compra = $row['id_ficha_compra'];
			$saldo_actual = $row['saldo_actual'];
			$total_venta = $row['total_venta'];
			$id_registro = $row['id_registro'];
			$concluido = 'co';
		
			if ($resultado->num_rows > 0) {
				if ($saldo_actual == 0) {
					$stmt = $conn->prepare("UPDATE ficha_compra SET estado = ? WHERE id_ficha_compra = ? AND id_registro = ?");
					$stmt->bind_param('sss', $concluido, $id_compra, $id_registro);
					$stmt->execute();
				}
			}
		
			if (isset($_FILES["archivos"]["name"])) {
				$imagenes = count($_FILES["archivos"]["name"]);
			} else {
				$imagenes = null;
			}
		
			function insertar_documento($id, $ruta)
			{
				include '../conexion.php';
				//actualizar url de la cuota de pago
				$stmt = $conn->prepare("UPDATE cobros SET url_comprobante = ? WHERE id_cobro = ?");
				$stmt->bind_param('ss', $ruta, $id);
				$stmt->execute();
				return;
			}
	
			function crearDireccion($carpeta)
			{
				// Path de documentos
				// Permisos de la carpeta
				if (!is_dir($carpeta)) {
					mkdir($carpeta, 0777, true);
				}
				chmod($carpeta, 0777);
				return;
			}
	
			if ($imagenes != null) {
				//Subir varias imagenes
				for ($i = 0; $i < $imagenes; $i++) {
					$ubicacionTemporal = $_FILES["archivos"]["tmp_name"][$i];
					$nombreArchivo = $_FILES["archivos"]["name"][$i];
					$extension = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
	
					$parts = explode(".", $_FILES['archivos']['name'][$i]);
					$ruta_archivos = $carpeta . $namefile . "_" . $i . "." . end($parts);
					$ruta_db = $ruta . $namefile . "_" . $i . "." . end($parts);
	
					// Mover del temporal al directorio actual
					crearDireccion($carpeta);
					move_uploaded_file($ubicacionTemporal, $ruta_archivos);
	
					insertar_documento($last_id, $ruta_db);
				}
			} else {
				$imagenes = '';
			}
	
			if ($statement->affected_rows > 0 && $codigoFactura > 0) {
				$respuesta = array(
					//Esto es lo que se muestra en
					//JSON.parse(xhr.responseText); console.log(respuesta);
					'respuesta' => 'correcto',
					'name' => $name,
					'tipo' => $accion,
					'nombre' => $namefile,
					'id_agregado' => $last_id,
					'factura' => $no_factura
				);
			} else {
				$respuesta = array(
					'respuesta' => 'error',
					'Errores' => $carpeta,
					'Error' => $imagenes,
					'Error Factura' => $errorFactura,
					// 'id_agregado' => $curriculum,
				);
				echo $statement->error;
			}
			$statement->close();
			$conn->close();
		} catch (Exception $e) {
			//En caso de un error, tomar la exepción
			$respuesta = array(
				//Arreglo asociativo
				'pass' => $e->getMessage(),
				// 'pass' => $hash_password
			);
		}
	} else {
		$no_factura = 0;
		$respuesta = array(
			//Esto es lo que se muestra en
			//JSON.parse(xhr.responseText); console.log(respuesta);
			'respuesta' => 'errorfactura',
			'name' => $name,
			'tipo' => $accion,
			'factura' => $no_factura
		);
	}
	echo json_encode($respuesta);

}




if ($accion === 'nuevoCAI') {
	$codigo_cai = $_POST['codigo_cai'];
	$fecha_emision = $_POST['fecha_emision'];
	$fecha_limite = $_POST['fecha_limite'];
	$cantidad_otorgada = $_POST['cantidad_otorgada'];
	$rango_inicial = $_POST['rango_inicial'];
	$rango_final = $_POST['rango_final'];
	$empresa_cai = $_POST['empresa_cai'];
	//Importar la conexión
	include '../conexion.php';
	try {
		//Preparar la consulta de insertar bloque
		// 		id_bloque	
		// bloque	
		// id_proyecto	

		$statement = $conn->prepare("INSERT INTO info_cai (cai, fecha_emision, fecha_limite, cantidad_otorgada, rango_inicial, rango_final, id_empresa) VALUES (?, ?, ?, ?, ?, ?, ?)");
		$statement->bind_param('sssssss', $codigo_cai, $fecha_emision, $fecha_limite, $cantidad_otorgada, $rango_inicial, $rango_final, $empresa_cai);
		$statement->execute();
		if ($statement->affected_rows > 0) {
			$respuesta = array(
				'respuesta' => 'correcto',
				'tipo' => $accion,
				'id_agregado' => $statement->insert_id
			);
		} else {
			$respuesta = array(
				'respuesta' => 'error',
			);
		}
		$statement->close();
		$conn->close();
	} catch (Exception $e) {
		//En caso de un error, tomar la exepción
		$respuesta = array(
			//Arreglo asociativo
			'pass' => $e->getMessage(),
			// 'pass' => $hash_password
		);
	}
	echo json_encode($respuesta);
}
