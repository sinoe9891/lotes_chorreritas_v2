<?php
include 'includes/conexion.php';
//ID POR MEDIO DE GET\
if (isset($_GET['ID'])) {
	$id = $_GET['ID'];
}

?>
<style>
	table {
		font-family: arial, sans-serif;
		border-collapse: collapse;
		width: 100%;
	}

	td,
	th {
		border: 1px solid #dddddd;
		text-align: left;
		padding: 8px;
	}

	tr:nth-child(even) {
		background-color: #dddddd;
	}
</style>
</head>

<body>

	<h2>Pagos Control</h2>
	<?php
	date_default_timezone_set('America/Tegucigalpa');
	$DateAndTime = date('m-d-Y h:i:s a', time());
	echo "Hoy es: $DateAndTime.";
	?>
	<table>

		<?php
		//consulta
		$estadoCuenta = $conn->query("SELECT * FROM ficha_compra WHERE id_ficha_compra = $id");
		$contador = 1;
		while ($cuotaresult = $estadoCuenta->fetch_array()) {
			$cuota = $cuotaresult['cuota'];
			// echo $cuota;
		}

		$idcompra = $id;
		$estadoCuenta = $conn->query("SELECT c.nombre_completo, a.fecha_cuota, b.cuota, a.cantidad_pagada, b.total_venta, a.monto_restante, b.plazo_meses FROM cobros a, ficha_compra b, ficha_directorio c WHERE b.id_ficha_compra = $idcompra and a.id_contrato = b.id_ficha_compra and b.id_registro = c.id;");
		$contador = 1;
		$numero = $estadoCuenta->num_rows;
		echo $numero;
		if ($estadoCuenta->num_rows > 0) {
		?>
			<tr>
				<th>No.</th>
				<th>Nombre Completo</th>
				<th>Fecha de Pago</th>
				<th>Cuota a pagar</th>
				<th>Cuota Pagada</th>
				<th>Monto Restante</th>
				<!-- <th>Fecha de Vencimiento</th> -->
				<th>Retraso</th>
			</tr>
			<?php
			while ($solicitud = $estadoCuenta->fetch_array()) {
				date_default_timezone_set('America/Tegucigalpa');
				$nombre_completo = $solicitud['nombre_completo'];
				$fecha_pago = $solicitud['fecha_cuota'];
				$fecha_pago = new DateTime($fecha_pago);
				$fecha_pago = $fecha_pago->format('d-m-Y');
				$cuota = $solicitud['cuota'];
				$cantidad_pagada = $solicitud['cantidad_pagada'];
				$total_venta = $solicitud['total_venta'];
				$plazo_meses = $solicitud['plazo_meses'];
				$monto_restante = $solicitud['monto_restante'];
				if ($monto_restante == 0) {
					$cuota = $cantidad_pagada;
				}
				// echo $total_venta;
				// $monto_restante = $total_venta - $cantidad_pagada;

			?>
				<tr>
					<td><?php echo $contador++; ?></td>
					<td><?php echo $nombre_completo; ?></td>
					<td><?php echo $fecha_pago; ?></td>
					<td><?php echo 'L.' . number_format($cuota, 2, '.', ','); ?></td>
					<td><?php echo 'L.' . number_format($cantidad_pagada, 2, '.', ','); ?></td>
					<td><?php echo 'L.' . number_format($monto_restante, 2, '.', ','); ?></td>
					<td>
						<p>Pagado</p>
					<?php

				}
					?>
					</td>
				</tr>
				<tr>
					<?php
					$cantidad_pagada = 0;
					$bandera = false;
					// echo $fecha_pago . "<br>";
					$fecha_pago = date("d-m-Y", strtotime($fecha_pago . " +1 month"));
					// $fecha_pago2 = date("d-m-Y", strtotime($fecha_pago . "+2 month")) . "<br>";
					// echo $fecha_pago2;
					$plazo_meses = $plazo_meses - $numero;
					if ($monto_restante != 0) {
						for ($i = 0; $i < $plazo_meses; ++$i) {

							$fecha_pago2 = date("d-m-Y", strtotime($fecha_pago . " +$i month")) . "<br>";
							// insertar fechas en la tabla control_credito_lote con fecha_pago y fecha_vencimiento y no_cuota
							$fecha_vencimiento = date("Y-m-d", strtotime($fecha_pago . " +$i month"));
							//ultima cuota sea igual al monto_restante
							if ($monto_restante <= $cuota && $monto_restante >= 0) {
								$cuota = $monto_restante;
								$monto_restante = 0;
								$bandera = true;
							}

							//restar la cuota de $total_venta\
							if ($monto_restante > $cuota) {
								$no_cuota = $i + 1;
								$total_venta = $monto_restante - $cuota;
								$monto_restante = $total_venta - $cantidad_pagada;
							}




							# code...

					?>
							<td><?php echo $contador++; ?></td>
							<td><?php echo $nombre_completo; ?></td>
							<td><?php echo $fecha_pago2; ?></td>
							<td><?php echo 'L.' . number_format($cuota, 2, '.', ','); ?></td>
							<td><?php echo 'L.' . number_format($cantidad_pagada, 2, '.', ','); ?></td>
							<td><?php echo 'L.' . number_format($monto_restante, 2, '.', ','); ?></td>
							<td>
								<?php

								// echo '<p>' . $dias . '</p>';
								// if ($dias > 0) {
								// 	echo "<p>Vencido</p>";
								// } elseif ($dias == '0') {
								// 	echo "Vence hoy";
								// } elseif ($dias < '0') {
								// 	echo "Pendiente";
								// }

								?>
							</td>
				</tr>
		<?php
							if ($bandera) {
								// $cuota = $monto_restante;
								break;
							}
						}
					}
				} else {
					$estadoCuenta = $conn->query("SELECT a.nombre_completo, b.fecha_primer_cuota, b.total_venta, b.saldo_actual, b.cuota, b.total_venta, b.plazo_meses, b.prima FROM ficha_directorio a, ficha_compra b WHERE b.id_ficha_compra = $idcompra and b.id_registro = a.id;");
					$contador = 1;
					$numero = $estadoCuenta->num_rows;
					echo $numero;
		?>
		<tr>
			<th>No.</th>
			<th>Nombre</th>
			<th>Fecha de Pago</th>
			<th>Cuota a pagar</th>
			<th>Cuota Pagada</th>
			<th>Monto Restante</th>
			<!-- <th>Fecha de Vencimiento</th> -->
			<th>Retraso</th>
		</tr>
		<?php
					while ($solicitud = $estadoCuenta->fetch_array()) {
						$nombre_completo = $solicitud['nombre_completo'];
						$fecha_primer_cuota = $solicitud['fecha_primer_cuota'];
						$plazo_meses = $solicitud['plazo_meses'];
						$saldo_actual = $solicitud['saldo_actual'];
						$cuota = $solicitud['cuota'];
						$prima = $solicitud['prima'];
						$total_venta = $solicitud['total_venta'];
						$total_venta = ($total_venta - $prima);
						$cantidad_pagada = 0;
						$bandera = false;
						for ($i = 0; $i <= $plazo_meses; ++$i) {

							// cambiar estado de la primera cuota por siguiente
							// if ($i == 0) {
							// 	$estado_cuota = 'sig';
							// 	$fecha_pago1 = date("Y-m-d", strtotime($fecha_primer_cuota));
							// 	$total_venta = $total_venta;
							// } else {
							$estado_cuota = 'pen';
							$fecha_pago1 = date("Y-m-d", strtotime($fecha_primer_cuota . " +$i month"));
							$total_venta = $total_venta - $cuota;
							// }

							// $fecha_pago = date("d-m-Y", strtotime($fecha_cuota . " +$i month")) . "<br>";
							// insertar fechas en la tabla control_credito_lote con fecha_pago y fecha_vencimiento y no_cuota
							$fecha_vencimiento = date("Y-m-d", strtotime($fecha_pago1 . " +1 month"));
							//restar la cuota de $total_venta
							// $total_venta = $total_venta - $cuota;
							$no_cuota = $i + 1;
							if ($total_venta <= $cuota && $total_venta >= 0) {
								$cuota = $total_venta;
								$total_venta = 0;
								$bandera = true;
							}

		?>
				<tr>
					<td><?php echo $contador++; ?></td>
					<td><?php echo $nombre_completo; ?></td>
					<td><?php echo $fecha_pago1; ?></td>
					<td><?php echo 'L.' . number_format($cuota, 2, '.', ','); ?></td>
					<td><?php echo 'L.' . number_format($cantidad_pagada, 2, '.', ','); ?></td>
					<!-- <td><?php echo $saldo_actual; ?></td> -->
					<td><?php echo 'L.' . number_format($total_venta, 2, '.', ','); ?></td>
					<td>
						<?php
							$fecha_pago1 = new DateTime($fecha_pago1);
							echo '<p>' . $fecha_pago1->format('d-m-Y') . '</p>';
							$fechahoy = new DateTime();
							$interval = $fecha_pago1->diff($fechahoy);
							$dias = $interval->format('%r%a');
							echo '<p>' . $dias . '</p>';
							if ($dias > 0) {
								echo "<p>Vencido</p>";
							} elseif ($dias == 0) {
								echo "Vence hoy";
							} elseif ($dias < 0) {
								echo "Pendiente";
							}
						?>
					</td>
				</tr>

	<?php
							if ($bandera) {
								// $cuota = $monto_restante;
								break;
							}
						}
					}
				}
	?>



</body>