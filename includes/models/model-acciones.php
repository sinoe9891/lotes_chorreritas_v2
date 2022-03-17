<?php
$accion = $_POST['accion'];
$estado = $_POST['estado'];
$id_solicitud = $_POST['id'];

//codigo eliminar solicitud
if ($accion === 'eliminar-cliente') {
	// importar la conexion
	include '../conexion.php';
	try {
		// Realizar la consulta a la base de datos
		$stmt = $conn->prepare("DELETE FROM ficha_directorio WHERE id = ? ");
		$stmt->bind_param('s', $id_solicitud);
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


//Actualizar Estado
if ($accion === 'actualizar') {
	// importar la conexion
	include '../conexion.php';

	try {
		// Realizar la consulta a la base de datos
		$stmt = $conn->prepare("UPDATE ficha_directorio set estado_registro = ? WHERE id = ? ");
		$stmt->bind_param('ss', $estado, $id_solicitud);
		$stmt->execute();
		if ($stmt->affected_rows > 0) {
			$respuesta = array(
				'respuesta' => 'correcto',
				'id' => $id_solicitud,
				'estado' => $estado
			);
		} else {
			$respuesta = array(
				'respuesta' => 'error',
				'id' => $id_solicitud,
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
