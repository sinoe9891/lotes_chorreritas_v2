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
		$stmt = $conn->prepare("UPDATE ficha_directorio a, conyugue b, beneficiario c, financiera d, referencias e SET a.nombre_completo= ?, a.fecha_nacimiento= ?, a.nacionalidad= ?, 
a.identidad= ?, a.genero= ?, a.estado_civil= ?, a.direccion= ?, a.ciudad= ?, a.departamento= ?, a.telefono= ?, a.celular= ?, a.dependientes= ?, a.correo= ?, a.profesion= ?, a.observaciones=?, 
a.lugar_empleo= ?, a.direccion_empleo= ?, a.cargo= ?, a.tiempo_laborando= ?, a.telefono_empleo = ?, a.pais_reside = ?, b.nombre_conyugue= ?, b.identidad_conyugue= ?, b.fechnac_conyugue= ?, 
b.celular_conyugue= ?, b.empresa_labora_conyugue= ?, b.telefono_empleo_conyugue= ?, b.cargo_conyugue= ?, b.tiempo_laborando_conyugue= ?, c.nombre_beneficiario = ?, c.identidad_beneficiario = ?, 
c.genero_beneficiario = ?, c.pais_reside_beneficiario= ? ,c.direccion_beneficiario = ?, c.ciudad_beneficiario = ?, c.departamento_beneficiario = ?, c.celular_beneficiario= ?, d.sueldos=?, 
d.remesas=?, d.otros_ingresos=?, d.prestamos=?, d.alquiler=?, d.otros_egresos=?, e.nombre_referencia = ?, e.direccion_referencia = ?, e.celular_referencia = ?, e.telefono_referencia= ?, 
e.empresa_labora_referencia=?, e.telefono_empleo_referencia=?  WHERE a.id = ? and b.id_registro = ? and c.id_registro = ? and d.id_registro = ? and e.id_referencia = ? and e.id_registro = ?");
		$stmt->bind_param(
			'sssssssssssssssssssssssssssssssssssssssssssssssssssssss',
			$nombres,
			$fechanac,
			$nacionalidad,
			$identidad,
			$genero,
			$estado_civil,
			$direccion,
			$ciudad,
			$departamento,
			$telefono,
			$celular,
			$dependientes,
			$email,
			$profesion,
			$observaciones,
			$empresa_labora,
			$direccion_empleo,
			$cargo,
			$tiempo_laborando,
			$telefono_empleo,
			$pais_reside,
			$nombre_conyugue,
			$identidad_conyugue,
			$fechnac_conyugue,
			$celular_conyugue,
			$empresa_labora_conyugue,
			$telefono_empleo_conyugue,
			$cargo_conyugue,
			$tiempo_laborando_conyugue,
			$nombre_beneficiario,
			$identidad_beneficiario,
			$genero_beneficiario,
			$pais_reside_beneficiario,
			$direccion_beneficiario,
			$ciudad_beneficiario,
			$departamento_beneficiario,
			$celular_beneficiario,
			$sueldos,
			$remesas,
			$otros_ingresos,
			$prestamos,
			$alquiler,
			$otros_egresos,
			$nombre_referencia_1,
			$direccion_referencia_1,
			$celular_referencia_1,
			$telefono_referencia_1,
			$empresa_labora_referencia_1,
			$telefono_empleo_referencia_1,
			$id_user,
			$id_user,
			$id_user,
			$id_user,
			$id_referencia_1,
			$id_user
		);
		$stmt->execute();

		$stmt1 = $conn->prepare("UPDATE referencias SET nombre_referencia = ?, direccion_referencia = ?, celular_referencia = ?, telefono_referencia= ?, empresa_labora_referencia=?, 
telefono_empleo_referencia=? WHERE id_referencia = ? and id_registro = ?");
		$stmt1->bind_param(
			'ssssssss',
			$nombre_referencia_2,
			$direccion_referencia_2,
			$celular_referencia_2,
			$telefono_referencia_2,
			$empresa_labora_referencia_2,
			$telefono_empleo_referencia_2,
			$id_referencia_2,
			$id_user
		);
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
	$id_contrato = $_POST['id_contrato'];
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

	//al cambiar el estado a En Curso o en 


	// funcion insertar ficha_compra_lotes
	function insertarFichaCompra($idlote, $cliente, $idcompra)
	{
		include '../conexion.php';
		$stmtcompra = $conn->prepare("INSERT INTO ficha_compra_lotes (id_lote,id_registro,id_compra) VALUES (?,?,?)");
		$stmtcompra->bind_param('sss', $idlote, $cliente, $idcompra);
		$stmtcompra->execute();
		return;
	}

	// funciona cuota lote
	function cuotaLote($preciovara, $idcompra, $meses, $idcontrato, $prim)
	{
		include '../conexion.php';
		$resultado = obtenerTotalVarasContrato($idcontrato);
		while ($row = $resultado->fetch_assoc()) {
			$sumavaras = $row['suma'];
		}

		$granTotal = ($sumavaras * $preciovara);
		$saldoActual = ($granTotal - $prim);
		$cuota = ($saldoActual / $meses);
		//insertar cuota en ficha_compra
		$stmtTotal = $conn->prepare("UPDATE ficha_compra SET total_venta = ?, saldo_actual = ?, cuota = ? WHERE id_ficha_compra = ?");
		$stmtTotal->bind_param('ssss', $granTotal, $saldoActual, $cuota, $idcompra);
		$stmtTotal->execute();
		return;
	}
	//conexion
	include '../conexion.php';
	try {
		//Preparar la consulta de insertar bloque
		$statement = $conn->prepare("UPDATE ficha_compra SET fechaSolicitud = ?, horaSolicitud = ?, id_registro = ?, fecha_venta = ?, prima = ?, plazo_anios = ?, dia_pago = ?, 
fecha_primer_cuota = ?, plazo_meses = ?, tipo = ?, id_proyecto = ?, estado = ?, vendedor = ?, cuenta_bancaria = ? WHERE id_ficha_compra = ?");
		$statement->bind_param(
			'sssssssssssssss',
			$fechaSolicitud,
			$horaSolicitud,
			$id_registro,
			$fecha_venta,
			$prima,
			$plazo_anios,
			$dia_pago,
			$fecha_primer_cuota,
			$plazo_meses,
			$tipo_venta,
			$proyecto,
			$estado,
			$vendedor,
			$cuenta_bancaria,
			$id_ficha_compra
		);
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
				//actualizar campo cuota de estado de ficha_compra
				$cuota_clean = 0;
				$stmt = $conn->prepare("UPDATE ficha_compra SET cuota = ? WHERE id_ficha_compra = ?");
				$stmt->bind_param('ss', $cuota_clean, $id_ficha_compra);
				$stmt->execute();
				//actualizar id_registro lotes
				$estado_registro_lote = 0;
				$contrato = '';
				$stmtLote = $conn->prepare("UPDATE lotes SET id_registro = ?, id_contrato = ? WHERE id_lote = ?");
				$stmtLote->bind_param('sss', $estado_registro_lote, $contrato, $id_loteactual);
				$stmtLote->execute();
				//contrato
			}
		}

		$lotes = $_POST["lotes"];
		if (sizeof($lotes) > 0) {
			for ($i = 0; $i < sizeof($lotes); $i++) {
				$id_lote = $lotes[$i];
				// insertar lote de ficha compra
				insertarFichaCompra($id_lote, $id_registro, $id_ficha_compra);
				// actualizar precio lote de compra
				$resultadoPrecio = obtenerPrecioLote($id_lote);
				$row = $resultadoPrecio->fetch_assoc();
				$areav2 = $row['areav2'];
				// cuotaLote($precio_vara2, $id_ficha_compra, $plazo_meses, $id_contrato, $prima);
				//cambiar estado de lote de ficha compra
				$estado_lote = 'v';
				$stmt = $conn->prepare("UPDATE lotes SET estado = ?, id_registro = ?, id_contrato = ? WHERE id_lote = ?");
				$stmt->bind_param('ssss', $estado_lote, $id_registro, $id_contrato, $id_lote);
				$stmt->execute();
				// echo "entro";
			}
			cuotaLote($precio_vara2, $id_ficha_compra, $plazo_meses, $id_contrato, $prima);
			$estadoquery = true;
		} else {
			$estadoquery = false;
		}
		//consulta si esta duplicado
		if ($statement->affected_rows > 0 && $estadoquery) {
			// if ($statement->affected_rows > 0) {
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


if ($accion === 'editarCAI') {

	$codigo_cai =  $_POST['codigo_cai'];
	$fecha_emision = $_POST['fecha_emision'];
	$fecha_limite = $_POST['fecha_limite'];
	$cantidad_otorgada = $_POST['cantidad_otorgada'];
	$rango_inicial = $_POST['rango_inicial'];
	$rango_final = $_POST['rango_final'];
	$empresa_cai = $_POST['empresa_cai'];
	$id_cai = $_POST['id_cai'];
	$estado = $_POST['estado'];



	include '../conexion.php';
	if ($estado == 'act') {
		function genrarFacturas($cantidad_otorgada, $rango_inicial, $rango_final, $id_cai)
		{
			include '../conexion.php';
			$str = str_replace("-", "", $rango_inicial);
			$str1 = str_replace("-", "", $rango_final);

			for ($i = 0; $i < $cantidad_otorgada; ++$i) {
				$len = 16;
				// echo $rango_inicial . '<br>';
				$str = str_replace("-", "", $rango_inicial);
				$str = $str + $i;

				$new_str = str_pad($str, $len, "0", STR_PAD_LEFT);
				$uno = substr($new_str, 0, 3);
				$dos = substr($new_str, 3, 3);
				$tres = substr($new_str, 6, 2);
				$cuatro = substr($new_str, 8, 8);
				$numero = $uno . '-' . $dos . '-' . $tres . '-' . $cuatro;
				// echo $numero . '<br>';
				$string1 = strval($numero);
				// echo $string1 . '<br>';
				$estado_factura = 'disponible';
				$stmtcompra = $conn->prepare("INSERT INTO facturas (id_cai, no_factura, estado_factura) VALUES (?, ?, ?)");
				$stmtcompra->bind_param("sss", $id_cai, $string1, $estado_factura);
				$stmtcompra->execute();
			}
			return;
		}
		try {
			$stmt = $conn->prepare("UPDATE info_cai SET cai = ?, fecha_emision = ?, fecha_limite = ?, cantidad_otorgada = ?, rango_inicial = ?, rango_final = ?, id_empresa = ?, 
estado_cai = ? WHERE id_cai = ?");
			$stmt->bind_param("ssssssssi", $codigo_cai, $fecha_emision, $fecha_limite, $cantidad_otorgada, $rango_inicial, $rango_final, $empresa_cai, $estado, $id_cai);
			$stmt->execute();
			genrarFacturas($cantidad_otorgada, $rango_inicial, $rango_final, $id_cai);
			if ($stmt->affected_rows > 0) {
				$respuesta = array(
					'respuesta' => 'correcto',
					'tipo' => $accion
				);
			} else {
				$respuesta = array(
					'respuesta' => 'error',
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
	if ($estado == 'ina') {
		// $estado = $_POST['ina'];
		try {
			$stmt = $conn->prepare("UPDATE info_cai SET cai = ?, fecha_emision = ?, fecha_limite = ?, cantidad_otorgada = ?, rango_inicial = ?, rango_final = ?, id_empresa = ?, 
estado_cai = ? WHERE id_cai = ?");
			$stmt->bind_param("ssssssssi", $codigo_cai, $fecha_emision, $fecha_limite, $cantidad_otorgada, $rango_inicial, $rango_final, $empresa_cai, $estado, $id_cai);
			$stmt->execute();
			if ($stmt->affected_rows > 0) {
				$respuesta = array(
					'respuesta' => 'correcto',
					'tipo' => $accion
				);
			} else {
				$respuesta = array(
					'respuesta' => 'error',
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
}

if ($accion === 'editUsuario') {
	date_default_timezone_set('America/Tegucigalpa');
	$user_id = $_POST['user_id'];
	$nombre = $_POST['nombre'];
	$apellidos = $_POST['apellidos'];
	$nickname = $_POST['nickname'];
	$email = $_POST['email'];
	$role = $_POST['role'];
	$estado = $_POST['estado'];
	$accion = $_POST['accion'];
	$nickname = trim($nickname);
	$email = trim($email);
	$nombre = trim($nombre);
	$apellidos = trim($apellidos);
	//Importar la conexión
	include '../conexion.php';
	try {
		$stmt = $conn->prepare("UPDATE main_users SET usuario_name = ?, apellidos = ?, nickname = ?, email_user = ?,  role_user = ?, estado_user = ? WHERE id = ?");
		$stmt->bind_param('sssssss', $nombre, $apellidos, $nickname, $email, $role, $estado, $user_id);
		$stmt->execute();
		if ($stmt->affected_rows > 0) {
			$respuesta = array(
				'respuesta' => 'correcto',
				'id_insertado' => $stmt->insert_id,
				'nombre' => $nombre,
				'nickname' => $nickname,
				'email' => $email,
				'role' => $role,
				'estado' => $estado,
				'user_id' => $user_id,
				'tipo' => $accion
			);
		} else {
			$respuesta = array(
				'respuesta' => 'error',
				'id_insertado' => $stmt->insert_id,
				'nombre' => $nombre,
				'nickname' => $nickname,
				'email' => $email,
				'role ' => $role,
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