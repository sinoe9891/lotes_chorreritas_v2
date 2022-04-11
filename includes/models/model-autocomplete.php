<?php
include '../conexion.php';

if ($_POST['mi_busqueda'] != "") {
	$mi_busqueda = $_POST['mi_busqueda'];
	// $resultados = mysqli_query($conexion,"SELECT * FROM $tabla_db1 WHERE numero LIKE '%$mi_busqueda%' LIMIT 5");
	// echo $mi_busqueda;
	$estadoCuenta = $conn->query("SELECT a.fecha_pagada, b.id_ficha_compra, a.fecha_cuota, a.id_cuota_pagada, b.cuota, a.cantidad_pagada, b.total_venta, a.monto_restante, b.plazo_meses, a.fecha_vencimiento, b.fecha_primer_cuota, b.id_registro FROM cobros a, ficha_compra b WHERE a.id_contrato = b.id_ficha_compra and b.id_ficha_compra LIKE '$mi_busqueda'");
	$contador = 1;
	//saber si viene vacio el query $estadoCuenta
	//imprimir $estadoCuenta
	// echo 'Imprime números de filas: '. $estadoCuenta->num_rows . '<br>';
	if ($estadoCuenta->num_rows > 0) {
		while ($cuotaresult = $estadoCuenta->fetch_array()) {
			$cuota = $cuotaresult['cuota'];
			$registro = $cuotaresult['id_registro'];
			$id_cuota_pagada = $cuotaresult['id_cuota_pagada'];
			$fecha_pago = $cuotaresult['fecha_cuota'];
			$id_ficha_compra = $cuotaresult['id_ficha_compra'];
			$monto_restante = $cuotaresult['monto_restante'];
			$fecha_primera_cuota = $cuotaresult['fecha_primer_cuota'];
			// echo $id_ficha_compra;
		}
		//condicion si no hay id_cuota_pagada solo imprima cuota
		$id_cuota_pagada = $id_cuota_pagada + 1;
		$fecha_pago = date("Y-m-d", strtotime($fecha_pago . " +1 month"));
		$fecha_vencimiento = date("Y-m-d", strtotime($fecha_pago . " +1 month"));
		if ($monto_restante < $cuota) {
			$cuota = $monto_restante;
		} 
		echo
		'	<div class="form-group">
					<label for="first-name-column">Fecha de cuota</label>
					<input type="hidden" id="id_compra" name="id_compra" value="' . $id_ficha_compra . '">
					<input type="hidden" id="fecha_cuota" name="fecha_cuota" value="' . $fecha_pago . '">
					<input type="hidden" id="fecha_vencimiento" name="fecha_vencimiento" value="' . $fecha_vencimiento . '">
					<input type="hidden" id="monto_restante" name="monto_restante" value="' . $monto_restante . '">
					<input type="hidden" id="registro" name="registro" value="' . $registro.'">
					<input type="date" class="form-control" name="fecha_pagada" id="fecha_pagada" value="' . $fecha_pago . '">
				</div>
				<div class="form-group">
					<label for="company-column">No. de Cuota Entró</label>
					<input type="number" class="form-control" name="no_cuota" id="no_cuota" value="' . $id_cuota_pagada . '" placeholder="00001" readonly>
				</div>
				<div class="form-group">
					<label for="company-column">Cuota Mensual (L.)</label>
					<input type="number" class="form-control" name="valor_cuota" id="valor_cuota" step="0.01" value="' . $cuota . '" placeholder="' . $cuota . '">
				</div>
			';
	} elseif ($estadoCuenta->num_rows == 0) {
		$estadoCuenta = $conn->query("SELECT * FROM ficha_compra WHERE id_ficha_compra = '$mi_busqueda'");

		while ($cuotaresult = $estadoCuenta->fetch_array()) {
			$id_ficha_compra = $cuotaresult['id_ficha_compra'];
			$fecha_primera_cuota = $cuotaresult['fecha_primer_cuota'];
			$fecha_vencimiento = date("Y-m-d", strtotime($fecha_primera_cuota . " +1 month"));
			$monto_restante = $cuotaresult['saldo_actual'];
			$cuota = $cuotaresult['cuota'];
			$registro = $cuotaresult['id_registro'];
			$id_contrato_compra = $cuotaresult['id_contrato_compra'];
		}
		// echo $fecha_vencimiento;
		// echo $id_contrato_compra;
		echo
		'	<div class="form-group">
					<label for="first-name-column">Fecha de cuota</label>
					<input type="hidden" id="id_compra" name="id_compra" value="' . $id_ficha_compra . '">
					<input type="hidden" id="fecha_cuota" name="fecha_cuota" value="' . $fecha_primera_cuota . '">
					<input type="hidden" id="fecha_vencimiento" name="fecha_vencimiento" value="' . $fecha_vencimiento . '">
					<input type="hidden" id="monto_restante" name="monto_restante" value="' . $monto_restante . '">
					<input type="hidden" id="registro" name="registro" value="' . $registro.'">
					<input type="date" class="form-control" name="fecha_pagada" id="fecha_pagada" value="' . $fecha_primera_cuota . '">
				</div>
				<div class="form-group">
					<label for="company-column">No. de Cuota</label>
					<input type="number" class="form-control" name="no_cuota" id="no_cuota" value="1" placeholder="00001" readonly>
				</div>
				<div class="form-group">
					<label for="company-column">Cuota Mensual Hola(L.)</label>
					<input type="number" class="form-control" name="valor_cuota" id="valor_cuota" step="0.01" value="' . $cuota . '" placeholder="' . $cuota . '">
				</div>
			';
	} else {
		echo 'error';
	}
}
