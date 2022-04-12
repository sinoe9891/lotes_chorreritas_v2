<?php
$accion = $_POST['accion'];
$estado = $_POST['estado'];
$id = $_POST['id'];
//codigo eliminar solicitud
if ($accion === 'eliminar-bloque') {
	// importar la conexion
	include '../conexion.php';
	try {
		// Realizar la consulta a la base de datos
		$stmt = $conn->prepare("DELETE FROM bloques WHERE id_bloque = ? ");
		$stmt->bind_param('s', $id);
		$stmt->execute();
		if ($stmt->affected_rows > 0) {
			$respuesta = array(
				'respuesta' => 'correcto'
			);
		} else {
			$respuesta = array(
				'respuesta' => 'error'
			);
		}
		$stmt->close();
		$conn->close();
	} catch (Exception $e) {
		// En caso de un error, tomar la exepcion
		$respuesta = array(
			'error' => $e->getMessage()
		);
	}

	echo json_encode($respuesta);
}

if ($accion === 'eliminar-lote') {
	// importar la conexion
	include '../conexion.php';
	try {
		// Realizar la consulta a la base de datos
		$stmt = $conn->prepare("DELETE FROM lotes WHERE id_lote = ? ");
		$stmt->bind_param('s', $id);
		$stmt->execute();
		if ($stmt->affected_rows > 0) {
			$respuesta = array(
				'respuesta' => 'correcto'
			);
		} else {
			$respuesta = array(
				'respuesta' => 'error'
			);
		}
		$stmt->close();
		$conn->close();
	} catch (Exception $e) {
		// En caso de un error, tomar la exepcion
		$respuesta = array(
			'error' => $e->getMessage()
		);
	}

	echo json_encode($respuesta);
}

if ($accion === 'eliminar-venta') {
	// importar la conexion
	include '../conexion.php';
	try {
		// para obtener los numeros de lotes y luego actualizar el id_registro de la tabla lotes por medio de una 
		$consulta = $conn->query("SELECT DISTINCT c.numero FROM ficha_compra a, ficha_compra_lotes b, lotes c WHERE a.id_ficha_compra = $id and a.id_contrato_compra = c.id_contrato");
		if ($consulta->num_rows > 0) {
			while ($row = $consulta->fetch_assoc()) {
				$numero = $row['numero'];
				$stmt = $conn->prepare("UPDATE lotes SET id_registro = '0', estado = 'd', id_contrato = '' WHERE numero = ?");
				$stmt->bind_param('s', $numero);
				$stmt->execute();
			}
			// Realizar la consulta a la base de datos
			$stmt = $conn->prepare("DELETE FROM ficha_compra WHERE id_ficha_compra = ?");
			$stmt->bind_param('s', $id);
			$stmt->execute();

			//eliminar todos los datos de la tabla ficha_compra_lotes por medio de una consulta con el $id
			$stmt1 = $conn->prepare("DELETE FROM ficha_compra_lotes WHERE id_compra = ?");
			$stmt1->bind_param('s', $id);
			$stmt1->execute();
			//eliminar todos los datos de la tabla ficha_compra_lotes por medio de una consulta con el $id
			$stmt1 = $conn->prepare("DELETE FROM control_credito_lote WHERE id_compra = ?");
			$stmt1->bind_param('s', $id);
			$stmt1->execute();
		}
		//Actualizar id_registro, estado, id_contrato de la tabla lotes con la siguiente consulta SELECT DISTINCT c.numero FROM ficha_compra a, ficha_compra_lotes b, lotes c WHERE a.id_ficha_compra = $id and a.id_contrato_compra = c.id_contrato


		if ($stmt->affected_rows > 0 && $consulta->num_rows > 0 && $stmt1->affected_rows > 0) {
			$respuesta = array(
				'respuesta' => 'correcto',
				'id' => $id,
				'numero' => $consulta->num_rows,
				'estado' => $estado

			);
		} else {
			$respuesta = array(
				'respuesta' => 'error',
				'id' => $id,
				'numero' => $consulta->num_rows,
				'estado' => $estado
			);
		}
		$stmt->close();
		$stmt1->close();
		$conn->close();
	} catch (Exception $e) {
		// En caso de un error, tomar la exepcion
		$respuesta = array(
			'error' => $e->getMessage()
		);
	}

	echo json_encode($respuesta);
}


if ($accion === 'eliminar-credito') {
	// importar la conexion
	include '../conexion.php';
	try {
		// Realizar la consulta a la base de datos
		$stmt = $conn->prepare("DELETE FROM control_credito_lote WHERE id_compra = ? ");
		$stmt->bind_param('s', $id);
		$stmt->execute();
		if ($stmt->affected_rows > 0) {
			$respuesta = array(
				'respuesta' => 'correcto'
			);
		} else {
			$respuesta = array(
				'respuesta' => 'error'
			);
		}
		$stmt->close();
		$conn->close();
	} catch (Exception $e) {
		// En caso de un error, tomar la exepcion
		$respuesta = array(
			'error' => $e->getMessage()
		);
	}

	echo json_encode($respuesta);
}





if ($accion === 'eliminar-cuota-pagada') {
	// importar la conexion
	include '../conexion.php';
	try {
		// Realizar la consulta a la base de datos
		$consulta1 = $conn->query("SELECT id_cuota_pagada, cantidad_pagada, id_contrato FROM cobros WHERE id_cobro = $id");
		//while el id_cuota_pagada
		while ($row = $consulta1->fetch_assoc()) {
			$id_cuota_pagada = $row['id_cuota_pagada'];
			$id_contrato = $row['id_contrato'];
			$cantidad_pagada = $row['cantidad_pagada'];
			echo $cantidad_pagada;
			//actualizar todos los datos de la tabla control_credito_lote por medio de una consulta con el $id_cuota_pagada
			//actualizar saldo actual sumando cantidad_pagada
			$consulta2 = $conn->query("UPDATE ficha_compra SET saldo_actual = saldo_actual + $cantidad_pagada WHERE id_ficha_compra = $id_contrato");
			//imprimir $consulta2
			

			//eliminar todos los datos de la tabla cobros por medio de una consulta con el $id
			$stmt = $conn->prepare("DELETE FROM cobros WHERE id_cobro = ?");
			$stmt->bind_param('s', $id);
			$stmt->execute();
		
		}
		if ($consulta1->num_rows > 0) {
			$respuesta = array(
				'respuesta' => 'correcto',
				'id' => $id,
				'numero' => $consulta1->num_rows,
				'estado' => $estado

			);
		} else {
			$respuesta = array(
				'respuesta' => 'error',
				'id' => $id,
				'numero' => $consulta1->num_rows,
				'estado' => $estado
			);
		}
		$stmt->close();
		$conn->close();
	} catch (Exception $e) {
		// En caso de un error, tomar la exepcion
		$respuesta = array(
			'error' => $e->getMessage()
		);
	}
	echo json_encode($respuesta);
}

if ($accion === 'eliminar-usuario') {
	// importar la conexion
	include '../conexion.php';
	try {
		// Realizar la consulta a la base de datos
		$stmt = $conn->prepare("DELETE FROM main_users WHERE id = ? ");
		$stmt->bind_param('s', $id);
		$stmt->execute();
		if ($stmt->affected_rows > 0) {
			$respuesta = array(
				'respuesta' => 'correcto'
			);
		} else {
			$respuesta = array(
				'respuesta' => 'error'
			);
		}
		$stmt->close();
		$conn->close();
	} catch (Exception $e) {
		// En caso de un error, tomar la exepcion
		$respuesta = array(
			'error' => $e->getMessage()
		);
	}

	echo json_encode($respuesta);
}

if ($accion === 'eliminar-cai') {
	// importar la conexion
	include '../conexion.php';
	try {
		// Realizar la consulta a la base de datos
		$stmt = $conn->prepare("DELETE FROM info_cai WHERE id_cai = ? ");
		$stmt->bind_param('s', $id);
		$stmt->execute();

		$stmt1 = $conn->prepare("DELETE FROM facturas WHERE id_cai = ? ");
		$stmt1->bind_param('s', $id);
		$stmt1->execute();
		if ($stmt->affected_rows > 0) {
			$respuesta = array(
				'respuesta' => 'correcto'
			);
		} else {
			$respuesta = array(
				'respuesta' => 'error'
			);
		}
		$stmt->close();
		$conn->close();
	} catch (Exception $e) {
		// En caso de un error, tomar la exepcion
		$respuesta = array(
			'error' => $e->getMessage()
		);
	}

	echo json_encode($respuesta);
}