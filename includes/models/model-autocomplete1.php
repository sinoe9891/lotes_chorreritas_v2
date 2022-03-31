<?php
include '../conexion.php';

if ($_POST['mi_busqueda']!="") {
	$mi_busqueda = $_POST['mi_busqueda'];
	// $resultados = mysqli_query($conexion,"SELECT * FROM $tabla_db1 WHERE numero LIKE '%$mi_busqueda%' LIMIT 5");
	// echo $mi_busqueda;
	$estadoCuenta = $conn->query("SELECT a.fecha_pago, b.id_ficha_compra, a.fecha_pago, a.id_cuota_pagada, b.cuota, a.cantidad_pagada, b.total_venta, a.monto_restante, b.plazo_meses FROM cobros a, ficha_compra b WHERE b.id_ficha_compra = a.id_contrato and b.id_registro = '$mi_busqueda'");
	$contador = 1;
	while ($cuotaresult = $estadoCuenta->fetch_array()) {
		$cuota = $cuotaresult['cuota'];
		$id_cuota_pagada = $cuotaresult['id_cuota_pagada'];
		$fecha_pago = $cuotaresult['fecha_pago'];
		$id_ficha_compra = $cuotaresult['id_ficha_compra'];
		$monto_restante = $cuotaresult['monto_restante'];
		// echo $cuota;

		// echo $fecha_pago;
		// $id_cuota_pagada = $id_cuota_pagada + 1;
	}
	// echo "Danny";
	// echo $mi_busqueda;
	// $resultados = mysqli_query($conn, "SELECT a.fecha_pago, b.id_ficha_compra, a.fecha_pago, a.id_cuota_pagada, b.cuota, a.cantidad_pagada, b.total_venta, a.monto_restante, b.plazo_meses FROM cobros a, ficha_compra b WHERE b.id_ficha_compra = a.id_contrato and b.id_registro = '$mi_busqueda';");

	// while ($consulta = mysqli_fetch_array($resultados)) {
	// $cuota = $consulta['cuota'];
	$id_cuota_pagada = $id_cuota_pagada + 1;
	// echo $id_cuota_pagada. '<br>';
	// echo $fecha_pago. '<br>';
	$fecha_pago = date("Y-m-d", strtotime($fecha_pago . " +1 month"));
	// echo $cuota. '<br>';
	// echo $monto_restante. '<br>';
	echo
	'	<div class="form-group">
				<label for="first-name-column">Fecha de de Pago</label>
				<input type="hidden" id="id_compra" name="id_compra" value="' . $id_ficha_compra . '">
				<input type="hidden" id="id_compra" name="monto_restante" value="' . $monto_restante . '">
				<input type="date" class="form-control" name="fecha_cuota" id="fecha_cuota" value="' . $fecha_pago . '">
			</div>
			<div class="form-group">
				<label for="company-column">No. de Cuota</label>
				<input type="number" class="form-control" name="no_cuota" id="no_cuota" value="' . $id_cuota_pagada . '" placeholder="00001" readonly>
			</div>
			<div class="form-group">
				<label for="company-column">Cuota Mensual (L.)</label>
				<input type="number" class="form-control" name="valor_cuota" id="valor_cuota" step="0.01" value="' . $cuota . '" placeholder="' . $cuota . '">
			</div>
		';
} else {
	// echo 'error';
}
