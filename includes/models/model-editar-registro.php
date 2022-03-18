<?php
include '../funciones.php';
date_default_timezone_set('America/Tegucigalpa');
$accion = $_POST['accion'];

//Código para crear administradores
if ($accion === 'solicitud') {
	$id_user = $_POST['id_user'];
	$nombres = $_POST['nombres'];
	$fechanac = $_POST['fechanac'];
	$nacionalidad = $_POST['nacionalidad'];
	$identidad = $_POST['identidad'];
	$genero = $_POST['genero'];
	$estado_civil = $_POST['estado_civil'];
	$direccion = $_POST['direccion'];
	$ciudad = $_POST['ciudad'];
	$departamento = $_POST['departamento'];
	$telefono = $_POST['telefono'];
	$celular = $_POST['celular'];
	$dependientes = $_POST['dependientes'];
	$email = $_POST['email'];
	$profesion = $_POST['profesion'];
	$observaciones = $_POST['observaciones'];

	$empresa_labora = $_POST['empresa_labora'];
	$direccion_empleo = $_POST['direccion_empleo'];
	$cargo = $_POST['cargo'];
	$tiempo_laborando = $_POST['tiempo_laborando'];
	$telefono_empleo = $_POST['telefono_empleo'];
	$pais_reside = $_POST['pais_reside'];

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

	$id_referencia_1 = $_POST['id_referencia_1'];
	$nombre_referencia_1 = $_POST['nombre_referencia_1'];
	$direccion_referencia_1 = $_POST['direccion_referencia_1'];
	$celular_referencia_1 = $_POST['celular_referencia_1'];
	$telefono_referencia_1 = $_POST['telefono_referencia_1'];
	$empresa_labora_referencia_1 = $_POST['empresa_labora_referencia_1'];
	$telefono_empleo_referencia_1 = $_POST['telefono_empleo_referencia_1'];

	$id_referencia_2 = $_POST['id_referencia_2'];
	$nombre_referencia_2 = $_POST['nombre_referencia_2'];
	$direccion_referencia_2 = $_POST['direccion_referencia_2'];
	$celular_referencia_2 = $_POST['celular_referencia_2'];
	$telefono_referencia_2 = $_POST['telefono_referencia_2'];
	$empresa_labora_referencia_2 = $_POST['empresa_labora_referencia_2'];
	$telefono_empleo_referencia_2 = $_POST['telefono_empleo_referencia_2'];

	$nombre_beneficiario = $_POST['nombre_beneficiario'];
	$genero_beneficiario = $_POST['genero_beneficiario'];
	$identidad_beneficiario = $_POST['identidad_beneficiario'];
	$pais_reside_beneficiario = $_POST['pais_reside_beneficiario'];
	$direccion_beneficiario = $_POST['direccion_beneficiario'];
	$ciudad_beneficiario = $_POST['ciudad_beneficiario'];
	$departamento_beneficiario = $_POST['departamento_beneficiario'];
	$celular_beneficiario = $_POST['celular_beneficiario'];
	//Importar la conexión
	include '../conexion.php';
	try {
		$stmt = $conn->prepare("UPDATE ficha_directorio a, conyugue b, beneficiario c, financiera d, referencias e SET a.nombre_completo= ?, a.fecha_nacimiento= ?, a.nacionalidad= ?, a.identidad= ?, a.genero= ?, a.estado_civil= ?, a.direccion= ?, a.ciudad= ?, a.departamento= ?, a.telefono= ?, a.celular= ?, a.dependientes= ?, a.correo= ?, a.profesion= ?, a.observaciones=?, a.lugar_empleo= ?, a.direccion_empleo= ?, a.cargo= ?, a.tiempo_laborando= ?, a.telefono_empleo = ?, a.pais_reside = ?, b.nombre_conyugue= ?, b.identidad_conyugue= ?, b.fechnac_conyugue= ?, b.celular_conyugue= ?, b.empresa_labora_conyugue= ?, b.telefono_empleo_conyugue= ?, b.cargo_conyugue= ?, b.tiempo_laborando_conyugue= ?, c.nombre_beneficiario = ?, c.identidad_beneficiario = ?, c.genero_beneficiario = ?, c.pais_reside_beneficiario= ? ,c.direccion_beneficiario = ?, c.ciudad_beneficiario = ?, c.departamento_beneficiario = ?, c.celular_beneficiario= ?, d.sueldos=?, d.remesas=?, d.otros_ingresos=?, d.prestamos=?, d.alquiler=?, d.otros_egresos=?, e.nombre_referencia = ?, e.direccion_referencia = ?, e.celular_referencia = ?, e.telefono_referencia= ?, e.empresa_labora_referencia=?, e.telefono_empleo_referencia=?  WHERE a.id = ? and b.id_registro = ? and c.id_registro = ? and d.id_registro = ? and e.id_referencia = ? and e.id_registro = ?");
		$stmt->bind_param('sssssssssssssssssssssssssssssssssssssssssssssssssssssss', $nombres, $fechanac, $nacionalidad, $identidad, $genero, $estado_civil, $direccion, $ciudad, $departamento, $telefono, $celular, $dependientes, $email, $profesion, $observaciones, $empresa_labora, $direccion_empleo, $cargo, $tiempo_laborando, $telefono_empleo, $pais_reside, $nombre_conyugue, $identidad_conyugue, $fechnac_conyugue,  $celular_conyugue, $empresa_labora_conyugue, $telefono_empleo_conyugue, $cargo_conyugue, $tiempo_laborando_conyugue, $nombre_beneficiario, $identidad_beneficiario, $genero_beneficiario, $pais_reside_beneficiario, $direccion_beneficiario, $ciudad_beneficiario, $departamento_beneficiario, $celular_beneficiario, $sueldos, $remesas, $otros_ingresos, $prestamos, $alquiler, $otros_egresos, $nombre_referencia_1, $direccion_referencia_1, $celular_referencia_1, $telefono_referencia_1, $empresa_labora_referencia_1, $telefono_empleo_referencia_1, $id_user, $id_user, $id_user, $id_user, $id_referencia_1, $id_user);
		$stmt->execute();

		$stmt1 = $conn->prepare("UPDATE referencias SET nombre_referencia = ?, direccion_referencia = ?, celular_referencia = ?, telefono_referencia= ?, empresa_labora_referencia=?, telefono_empleo_referencia=? WHERE id_referencia = ? and id_registro = ?");
		$stmt1->bind_param('ssssssss', $nombre_referencia_2, $direccion_referencia_2, $celular_referencia_2, $telefono_referencia_2, $empresa_labora_referencia_2, $telefono_empleo_referencia_2, $id_referencia_2, $id_user);
		$stmt1->execute();

		if ($stmt->affected_rows > 0 || $stmt1->affected_rows > 0 || $stmt1->affected_rows == 0 || $stmt->affected_rows == 0) {
			$respuesta = array(
				//Esto es lo que se muestra en
				//JSON.parse(xhr.responseText); console.log(respuesta);
				'respuesta' => 'correcto',
				// 'id_insertado' => $stmt->insert_id,
				'user_id' => $id_user,
				'nombre_completo' => $nombres,
				'telefono' => $telefono,
				'id_referencia_1' => $id_referencia_1,
				'nombre_referencia' => $nombre_referencia_1,
				'estado_civil' => $estado_civil,
				'pais_reside' => $pais_reside,
				'genero' => $genero,
				'tipo' => $accion
			);
		} else {
			$respuesta = array(
				'respuesta' => 'error',
				'user_id' => $id_user,
				'nombre_completo' => $nombres,
				'id_referencia_1' => $id_referencia_1,
				'nombre_referencia_1' => $nombre_referencia_1,
				'profesion' => $profesion,
				'estado_civil' => $estado_civil,
				'genero' => $genero,
				'tipo' => $accion
			);
		}
		$stmt->close();
		// $stmt_counter->close();
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

//Código para crear administradores
if ($accion === 'editbloque') {
	date_default_timezone_set('America/Tegucigalpa');
	$id_bloque = $_POST['id_bloque'];
	$bloque = $_POST['bloque'];
	$id_proyectob = $_POST['id_proyectob'];
	$id_proyecto = $_POST['proyecto'];
	$accion = $_POST['accion'];
	//Importar la conexión
	include '../conexion.php';
	try {
		$stmt = $conn->prepare("UPDATE bloques SET bloque= ?, id_proyecto= ?  WHERE id_bloque = ? and id_proyecto = ?");
		$stmt->bind_param('ssss', $bloque, $id_proyecto, $id_bloque, $id_proyectob);
		$stmt->execute();
		if ($stmt->affected_rows > 0) {
			$respuesta = array(
				'respuesta' => 'correcto',
				'id_insertado' => $stmt->insert_id,
				'bloque' => $bloque,
				'id_proyecto' => $id_proyecto,
				'id_proyectob' => $id_proyectob,
				'tipo' => $accion
			);
		} else {
			$respuesta = array(
				'respuesta' => 'error',
				'id_insertado' => $stmt->insert_id,
				'bloque' => $bloque,
				'id_proyecto' => $id_proyecto,
				'id_proyectob' => $id_proyectob,
				'tipo' => $accion
			);
		}

		$stmt->close();
		// $stmt_counter->close();
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

if ($accion === 'editlote') {
	date_default_timezone_set('America/Tegucigalpa');
	$numero = $_POST['numero'];
	$id_bloque = $_POST['id_bloque'];
	$areav2 = $_POST['areav2'];
	$colindancias = $_POST['colindancias'];
	$path_lote = $_POST['path_lote'];
	$estado = $_POST['estado'];
	$user_id = $_POST['user_id'];
	$accion = $_POST['accion'];
	//Importar la conexión
	include '../conexion.php';
	try {
		$stmt = $conn->prepare("UPDATE lotes SET numero= ?, id_bloque= ?, areav2= ?, colindancias= ?, path_lote= ?, estado= ? WHERE id_lote = ?");
		$stmt->bind_param('sssssss', $numero, $id_bloque, $areav2, $colindancias, $path_lote, $estado, $user_id);
		$stmt->execute();
		if ($stmt->affected_rows > 0) {
			$respuesta = array(
				'respuesta' => 'correcto',
				'id_insertado' => $stmt->insert_id,
				'numero' => $numero,
				'id_bloque' => $id_bloque,
				'areav2' => $areav2,
				'colindancias' => $colindancias,
				'path_lote' => $path_lote,
				'estado' => $estado,
				'user_id' => $user_id,
				'tipo' => $accion
			);
		} else {
			$respuesta = array(
				'respuesta' => 'error',
				'id_insertado' => $stmt->insert_id,
				'numero' => $numero,
				'id_bloque' => $id_bloque,
				'areav2' => $areav2,
				'colindancias' => $colindancias,
				'path_lote' => $path_lote,
				'estado' => $estado,
				'user_id' => $user_id,
				'tipo' => $accion
			);
		}
		$stmt->close();
		// $stmt_counter->close();
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


if ($accion === 'editarventa') {

	//info general
	$fechaSolicitud = $_POST['fechaSolicitud'];
	$horaSolicitud = $_POST['horaSolicitud'];
	$id_registro = $_POST['id_registro'];
	$id_ficha_compra = $_POST['id_ficha_compra'];
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
	$estado =  $_POST['estado'];
	$estado_lote = 'v';

	//info de proyecto
	$resultado = obtenerProy($proyecto);
	$row = $resultado->fetch_assoc();
	$precio_vara2 = $row['precio_vara2'];
	$accion === 'editarventa';

	//condicion si el $lotes = $_POST["lotes"] viene vacio
	// if (empty($_POST["lotes"])) {
	// 	$lotes = array();
	// } else {
	// 	$lotes = $_POST["lotes"];
	// }

	// // funcion insertar ficha_compra_lotes
	function insertarFichaCompra($idlote, $cliente, $idcompra)
	{
		include '../conexion.php';
		$stmtcompra = $conn->prepare("INSERT INTO ficha_compra_lotes (id_lote,id_registro,id_compra) VALUES (?,?,?)");
		$stmtcompra->bind_param('sss', $idlote, $cliente, $idcompra);
		$stmtcompra->execute();
		return;
	}
	// // funciona actualizar lote
	// function actualizarLote($estado, $cliente, $lote)
	// {
	// 	include '../conexion.php';
	// 	$stmtLotes = $conn->prepare("UPDATE lotes SET estado = ?, id_registro = ? WHERE id_lote = ?");
	// 	$stmtLotes->bind_param('sss', $estado, $cliente, $lote);
	// 	$stmtLotes->execute();
	// 	return;
	// }
	// // funciona cuota lote
	// function cuotaLote($area, $preciovara, $idcompra, $meses)
	// {
	// 	include '../conexion.php';
	// 	$stmtCuota = $conn->prepare("UPDATE ficha_compra SET cuota = ? WHERE id = ?");
	// 	$total = ($area * $preciovara);
	// 	$cuota = ($total / $meses);
	// 	$stmtCuota->bind_param('ss', $cuota, $idcompra);
	// 	$stmtCuota->execute();
	// 	return;
	// }
	//conexion
	include '../conexion.php';
	try {
		//Preparar la consulta de insertar bloque
		$statement = $conn->prepare("UPDATE ficha_compra SET fechaSolicitud = ?, horaSolicitud = ?, id_registro = ?, fecha_venta = ?, prima = ?, plazo_anios = ?, dia_pago = ?, fecha_primer_cuota = ?, plazo_meses = ?, tipo = ?, id_proyecto = ?, estado = ?, vendedor = ?, cuenta_bancaria = ? WHERE id_ficha_compra = ?");
		$statement->bind_param('sssssssssssssss', $fechaSolicitud, $horaSolicitud, $id_registro, $fecha_venta, $prima, $plazo_anios, $dia_pago, $fecha_primer_cuota, $plazo_meses, $tipo_venta, $proyecto, $estado, $vendedor, $cuenta_bancaria, $id_ficha_compra);
		$statement->execute();


		$resultadoInfoCompraLotes = obtenerInfoLoteComprado($id_ficha_compra);
		while ($row = $resultadoInfoCompraLotes->fetch_assoc()) {
			
			$id_compra_lotes = $row['id_compra_lote'];
			$id_compra = $row['id_compra'];
			$id_loteactual = $row['id_lote'];
			if ($resultadoInfoCompraLotes->num_rows > 0) {
				//eliminar registros de id_compra del lote
				$stmt = $conn->prepare("DELETE FROM ficha_compra_lotes WHERE id_compra_lote = ?");
				$stmt->bind_param('s', $id_compra_lotes);
				$stmt->execute();
				//actualizar estado lote de compra
				$estado_lote = 'd';
				$stmt = $conn->prepare("UPDATE lotes SET estado = ?, id_registro = ? WHERE id_lote = ?");
				$stmt->bind_param('sss', $estado_lote, $id_registro, $id_loteactual);
				$stmt->execute();
			}
		}
		$lotes = $_POST["lotes"];
		if (sizeof($lotes) > 0) {
			for ($i = 0; $i < sizeof($lotes); $i++) {
				$id_lote = $lotes[$i];
				// insertar lote de ficha compra
				insertarFichaCompra($id_lote, $id_registro, $id_ficha_compra);
				//cambiar estado de lote de ficha compra
				$estado_lote = 'v';
				$stmt = $conn->prepare("UPDATE lotes SET estado = ? WHERE id_lote = ?");
				$stmt->bind_param('ss', $estado_lote, $id_lote);
				$stmt->execute();
				// echo "entro";
			}
			$estadoquery = true;
		}else{
			$estadoquery = false;
		}
		// echo $id_compra;
		// $id_compra = $last_id;

		// 	insertarFichaCompra($id_lote, $id_registro, $id_compra);
		// 	actualizarLote($estado_lote, $id_registro, $id_lote);

		// 	$resultadoPrecio = obtenerPrecioLote($id_lote);
		// 	$row = $resultadoPrecio->fetch_assoc();
		// 	$areav2 = $row['areav2'];
		// 	cuotaLote($areav2, $precio_vara2, $id_compra, $plazo_meses);

		// 	$estadoquery = true;

		//consulta si esta duplicado
		// if ($statement->affected_rows > 0 && $estadoquery) {
		if ($statement->affected_rows > 0) {
			$respuesta = array(
				'respuesta' => 'correcto',
				'fechaSolicitud' => $fechaSolicitud,
				'estado' => $estado,
				'id_ficha_compra' => $id_ficha_compra,
				'tipo_venta' => $tipo_venta,
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
