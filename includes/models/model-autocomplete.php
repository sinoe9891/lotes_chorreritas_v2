<?php
include '../conexion.php';

if (isset($_POST['mi_busqueda'])) {
	$mi_busqueda = $_POST['mi_busqueda'];
	// $resultados = mysqli_query($conexion,"SELECT * FROM $tabla_db1 WHERE numero LIKE '%$mi_busqueda%' LIMIT 5");
	// echo $mi_busqueda;
	$resultados = mysqli_query($conn, "SELECT DISTINCT b.id_credito_lote, b.id_compra, b.fecha_pago, b.no_cuota, a.cuota FROM ficha_compra a, control_credito_lote b, ficha_directorio c WHERE a.id_ficha_compra = b.id_compra and b.estado_cuota = 'sig' and a.id_registro = '$mi_busqueda';");
	while ($consulta = mysqli_fetch_array($resultados)) {
		echo
		'	<div class="form-group">
					<label for="first-name-column">Fecha de de Pago</label>
					<input type="hidden" id="id_compra" name="id_compra" value="' . $consulta['id_compra'] . '">
					<input type="hidden" id="id_cuota_pagada" name="id_cuota_pagada" value="' . $consulta['id_credito_lote'] . '">
					<input type="date" class="form-control" name="fecha_cuota" id="fecha_cuota" value="' . $consulta['fecha_pago'] . '">
				</div>
				<div class="form-group">
					<label for="company-column">No. de Comprobante</label>
					<input type="number" class="form-control" name="no_cuota" id="no_cuota" value="' . $consulta['no_cuota'] . '" placeholder="00001" readonly>
				</div>
				<div class="form-group">
					<label for="company-column">Cuota Mensual (L.)</label>
					<input type="number" class="form-control" name="valor_cuota" id="valor_cuota" value="' . $consulta['cuota'] . '" placeholder="00.00" readonly>
				</div>
			';
	}
} else {
	echo 'error';
}
