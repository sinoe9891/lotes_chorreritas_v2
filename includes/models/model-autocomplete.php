<?php
include '../conexion.php';
include '../funciones.php';
if ($_POST['mi_busqueda'] != "") {
	$mi_busqueda = $_POST['mi_busqueda'];
	// $resultados = mysqli_query($conexion,"SELECT * FROM $tabla_db1 WHERE numero LIKE '%$mi_busqueda%' LIMIT 5");
	$estadoCuenta = $conn->query("SELECT c.nombre_completo, a.fecha_pagada, a.numero_cuotas_pagadas, b.id_ficha_compra, a.fecha_cuota, a.id_cuota_pagada, b.cuota, a.cantidad_pagada, b.total_venta, a.monto_restante, b.plazo_meses, a.fecha_vencimiento, b.fecha_primer_cuota, b.id_registro FROM cobros a, ficha_compra b, ficha_directorio c WHERE a.id_contrato = b.id_ficha_compra and a.estado_cobro = 'emitida' AND b.id_registro = c.id AND b.id_ficha_compra LIKE '$mi_busqueda'");

	// $numcuotas = $conn->query("SELECT SUM(a.numero_cuotas_pagadas) as total FROM cobros a, ficha_compra b WHERE b.id_ficha_compra = $mi_busqueda");
	$numcuotas = $conn->query("SELECT SUM(numero_cuotas_pagadas) as total FROM cobros WHERE id_contrato = $mi_busqueda group by id_contrato;");

	$cuot = 0;
	// echo 'entró';
	while ($sumcuotas = $numcuotas->fetch_array()) {
		$numerocuotas = $sumcuotas['total'];
		// echo $numerocuotas;
		$sigcuota = $numerocuotas;
		$numerocuotas += 1;
		// echo $numerocuotas;
	}

	$contador = 1;
	$resultado = '';
	//saber si viene vacio el query $estadoCuenta
	//imprimir $estadoCuenta
	// echo 'Imprime números de filas: '. $estadoCuenta->num_rows . '<br>';
	if ($estadoCuenta->num_rows > 0) {
		while ($cuotaresult = $estadoCuenta->fetch_array()) {
			$nombre_completo = $cuotaresult['nombre_completo'];
			$cuota = $cuotaresult['cuota'];
			$registro = $cuotaresult['id_registro'];
			$id_cuota_pagada = $cuotaresult['id_cuota_pagada'];
			$numero_cuotas_pagadas = $cuotaresult['numero_cuotas_pagadas'];
			$fecha_pago = $cuotaresult['fecha_cuota'];
			$id_ficha_compra = $cuotaresult['id_ficha_compra'];
			$monto_restante = $cuotaresult['monto_restante'];
			$fecha_primera_cuota = $cuotaresult['fecha_primer_cuota'];
			// echo $id_ficha_compra;
			$numero_cuotas_pagadas;
		}
		//condicion si no hay id_cuota_pagada solo imprima cuota
		// echo $numero_cuotas_pagadas . ' Hola';
		$id_cuota_pagada += 1;
		// echo $fecha_pago;

		// echo '<br>'.$fecha_primera_cuota.'<br>';
		// echo '<br>'.$numerocuotas.'<br>';
		// echo '<br>'.$sigcuota.'<br>';
		// echo '<br>'.$numerocuotas.'<br>';
		$fecha_pago = date("Y-m-d", strtotime($fecha_primera_cuota . " +$sigcuota month"));
		$fecha_vencimiento = date("Y-m-d", strtotime($fecha_pago . " +1 month"));
		if ($monto_restante < $cuota) {
			$cuota = $monto_restante;
		}

		$loteClienteQuery = obtenerInfoLotesCliente($id_ficha_compra);
		$sep = '';
		echo '<div class="form-group">
			<label for="company-column">Lotes</label>
			<input type="text" class="form-control" name="lotes" id="lotes" value="';
		while ($row = $loteClienteQuery->fetch_array()) {
			$lote = $row['numero'];
			$bloque = $row['bloque'];
			$lotes = $bloque . '-' . $lote;
			$text = $lotes;
			$lotesa = $sep . $text;
			echo $lotesa;
			$sep = ', ';
		};
		echo '" readonly>
		</div>';

		echo
		'		<div class="form-group">
					<label for="company-column">Nombre Cliente</label>
					<input type="text" class="form-control" name="nombre_completo" id="nombre_completo" value="' . $nombre_completo . '" placeholder="00001" readonly>
				</div>
				<div class="form-group">
					<label for="first-name-column">Fecha de cuota</label>
					<input type="hidden" id="id_compra" name="id_compra" value="' . $id_ficha_compra . '">
					<input type="hidden" id="fecha_cuota" name="fecha_cuota" value="' . $fecha_pago . '">
					<input type="hidden" id="fecha_vencimiento" name="fecha_vencimiento" value="' . $fecha_vencimiento . '">
					<input type="hidden" id="monto_restante" name="monto_restante" value="' . $monto_restante . '">
					<input type="hidden" id="registro" name="registro" value="' . $registro . '">
					<input type="date" class="form-control" name="fecha_pagada" id="fecha_pagada" value="' . $fecha_pago . '">
				</div>
				<div class="form-group">
					<label for="company-column">No. de Cuota</label>
					<input type="hidden" class="form-control" name="no_cuota" id="no_cuota" value="' . $id_cuota_pagada . '" placeholder="00001" readonly>
					<input type="number" class="form-control" name="sumcuota" id="sumcuota" value="' . $numerocuotas . '" placeholder="00001" readonly>
				</div>
				<div class="form-group">
					<label for="company-column">Cuota Mensual (L.' . $cuota . ')</label>
					<input type="hidden" class="form-control" name="cuota" id="cuota" step="0.01" value="' . $cuota . '" placeholder="' . $cuota . '">
					<input type="number" class="form-control" name="valor_cuota" id="valor_cuota" step="0.01" value="' . $resultado . '" placeholder="' . $cuota . '">
				</div>
			';
	} elseif ($estadoCuenta->num_rows == 0) {
		$estadoCuenta = $conn->query("SELECT * FROM ficha_compra a, ficha_directorio b WHERE a.id_ficha_compra = '$mi_busqueda' AND a.id_registro = b.id;");
		$id_cuota_pagada = 1;
		while ($cuotaresult = $estadoCuenta->fetch_array()) {
			$id_ficha_compra = $cuotaresult['id_ficha_compra'];
			$nombre_completo = $cuotaresult['nombre_completo'];
			$fecha_primera_cuota = $cuotaresult['fecha_primer_cuota'];
			$fecha_vencimiento = date("Y-m-d", strtotime($fecha_primera_cuota . " +1 month"));
			$monto_restante = $cuotaresult['saldo_actual'];
			$cuota = $cuotaresult['cuota'];
			$registro = $cuotaresult['id_registro'];
			$id_contrato_compra = $cuotaresult['id_contrato_compra'];
		}
		// echo $fecha_vencimiento;
		echo $id_contrato_compra;
		$loteClienteQuery = obtenerInfoLotesCliente($id_ficha_compra);
		$sep = '';
		echo '<div class="form-group">
			<label for="company-column">Lotes</label>
			<input type="text" class="form-control" name="lotes" id="lotes" value="';
		while ($row = $loteClienteQuery->fetch_array()) {
			$lote = $row['numero'];
			$bloque = $row['bloque'];
			$lotes = $bloque . '-' . $lote;
			$text = $lotes;
			$lotesa = $sep . $text;
			echo $lotesa;
			$sep = ', ';
		};
		echo '" readonly>
		</div>';
		echo
		'	<div class="form-group">
					<label for="company-column">Nombre Cliente</label>
					<input type="text" class="form-control" name="nombre_completo" id="nombre_completo" value="' . $nombre_completo . '" placeholder="00001" readonly>
				</div>
				<div class="form-group">
					<label for="first-name-column">Fecha de cuota</label>
					<input type="hidden" id="id_compra" name="id_compra" value="' . $id_ficha_compra . '">
					<input type="hidden" id="fecha_cuota" name="fecha_cuota" value="' . $fecha_primera_cuota . '">
					<input type="hidden" id="fecha_vencimiento" name="fecha_vencimiento" value="' . $fecha_vencimiento . '">
					<input type="hidden" id="monto_restante" name="monto_restante" value="' . $monto_restante . '">
					<input type="hidden" id="registro" name="registro" value="' . $registro . '">

					<input type="date" class="form-control" name="fecha_pagada" id="fecha_pagada" value="' . $fecha_primera_cuota . '">
				</div>
				<div class="form-group">
					<label for="company-column">No. de Cuota</label>
					<input type="number" class="form-control" name="no_cuota" id="no_cuota" value="' . $id_cuota_pagada . '" placeholder="00001" readonly>
				</div>
				<div class="form-group">
					<label for="company-column">Cuota Mensual (L.' . $cuota . ')</label>
					<input type="hidden" class="form-control" name="cuota" id="cuota" step="0.01" value="' . $cuota . '" placeholder="' . $cuota . '">
					<input type="number" class="form-control" name="valor_cuota" id="valor_cuota" step="0.01" value="' . $resultado . '" placeholder="' . $cuota . '">
				</div>
			';
	} else {
		echo 'error';
	}
}
