<?php
include 'includes/conexion.php';
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
		<tr>
			<th>No.</th>
			<th>Fecha de Pago</th>
			<th>Cuota a pagar</th>
			<th>Cuota Pagada</th>
			<th>Saldo Pendiente</th>
			<!-- <th>Fecha de Vencimiento</th> -->
			<th>Retraso</th>
		</tr>
		<?php
		//consulta
		$estadoCuenta = $conn->query("SELECT * FROM ficha_compra WHERE id_ficha_compra = '1'");
		$contador = 1;
		while ($cuotaresult = $estadoCuenta->fetch_array()) {
			$cuota = $cuotaresult['cuota'];
			// echo $cuota;
		}


		$idcompra = 1;
		// $estadoCuenta = $conn->query("SELECT * FROM control_credito_lote a, ficha_compra b WHERE a.id_compra = 15 and b.id_ficha_compra = a.id_compra");
		// $estadoCuenta = $conn->query("SELECT c.nombre_completo, a.id_compra, a.fecha_pago, b.cuota, b.saldo_actual, b.total_venta, MIN(id_credito_lote) ID FROM control_credito_lote a, ficha_compra b, ficha_directorio c WHERE a.estado_cuota = 'sig' and b.id_registro = c.id GROUP BY a.id_compra ORDER BY a.id_compra;");
		$estadoCuenta = $conn->query("SELECT a.fecha_cuota, b.cuota, a.cantidad_pagada, b.total_venta, a.monto_restante, b.plazo_meses FROM cobros a, ficha_compra b WHERE b.id_ficha_compra = $idcompra;");
		$contador = 1;
		$numero = $estadoCuenta->num_rows;
		echo $numero;
		if ($estadoCuenta->num_rows > 0) {
			while ($solicitud = $estadoCuenta->fetch_array()) {
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
						for ($i = 1; $i <= $plazo_meses; ++$i) {

							$fecha_pago2 = date("d-m-Y", strtotime($fecha_pago . " +$i month")) . "<br>";
							// // insertar fechas en la tabla control_credito_lote con fecha_pago y fecha_vencimiento y no_cuota
							$fecha_vencimiento = date("Y-m-d", strtotime($fecha_pago . " +$i month"));
							//restar la cuota de $total_venta\
							if ($monto_restante > $cuota) {
								$total_venta = $monto_restante - $cuota;
								$no_cuota = $i + 1;
								$monto_restante = $total_venta - $cantidad_pagada;
							}

							//ultima cuota sea igual al monto_restante
							if ($monto_restante < $cuota && $monto_restante >= 0) {
								$cuota = $monto_restante;
								$monto_restante = 0;
								$bandera = true;
							}

							# code...

					?>
							<td><?php echo $contador++; ?></td>
							<td><?php echo $fecha_pago2; ?></td>
							<td><?php echo 'L.' . number_format($cuota, 2, '.', ','); ?></td>
							<td><?php echo 'L.' . number_format($cantidad_pagada, 2, '.', ','); ?></td>
							<td><?php echo 'L.' . number_format($monto_restante, 2, '.', ','); ?></td>
							<td>
								<?php
								$fecha_vencimiento = new DateTime($fecha_vencimiento);
								// echo '<p>' . $fecha_vencimiento->format('d-m-Y') . '</p>';
								$fechahoy = new DateTime();
								$interval = $fecha_vencimiento->diff($fechahoy);
								$dias = $interval->format('%r%a');
								// echo '<p>' . $dias . '</p>';
								if ($dias > 0) {
									echo "<p>Vencido</p>";
								} elseif ($dias == '0') {
									echo "Vence hoy";
								} elseif ($dias < '0') {
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
				} else {
					$estadoCuenta = $conn->query("SELECT b.fecha_primer_cuota, b.total_venta, b.saldo_actual, b.cuota, b.total_venta, b.plazo_meses FROM ficha_compra b WHERE b.id_ficha_compra = $idcompra;");
					$contador = 1;
					$numero = $estadoCuenta->num_rows;
					echo $numero;
					while ($solicitud = $estadoCuenta->fetch_array()) {
						$fecha_pago = $solicitud['fecha_primer_cuota'];
						$fecha_pago = new DateTime($fecha_pago);
						$fecha_pago = $fecha_pago->format('d-m-Y');
						$cuota = $solicitud['cuota'];
						$saldo_actual = $solicitud['saldo_actual'];
						$total_venta = $solicitud['total_venta'];
						$plazo_meses = $solicitud['plazo_meses'];
						$cuota_pagada = $total_venta - $saldo_actual;
						// echo $total_venta;
						// $monto_restante = $total_venta - $saldo_actual;
		
				?>
						<tr>
							<td><?php echo $contador++; ?></td>
							<td><?php echo $fecha_pago; ?></td>
							<td><?php echo 'L.' . number_format($cuota, 2, '.', ','); ?></td>
							<td><?php echo 'L.' . number_format($cuota_pagada, 2, '.', ','); ?></td>
							<td><?php echo 'L.' . number_format($saldo_actual, 2, '.', ','); ?></td>
							<td>
								<p>Pagado</p>
							<?php
		
						}
							?>
							</td>
						</tr>
						<tr>
							<?php
							$saldo_actual = 0;
							$bandera = false;
							// echo $fecha_pago . "<br>";
							$fecha_pago = date("d-m-Y", strtotime($fecha_pago . " +1 month"));
							// $fecha_pago2 = date("d-m-Y", strtotime($fecha_pago . "+2 month")) . "<br>";
							// echo $fecha_pago2;
							$plazo_meses = $plazo_meses - $numero;
							if ($monto_restante != 0) {
								for ($i = 1; $i <= $plazo_meses; ++$i) {
		
									$fecha_pago2 = date("d-m-Y", strtotime($fecha_pago . " +$i month")) . "<br>";
									// // insertar fechas en la tabla control_credito_lote con fecha_pago y fecha_vencimiento y no_cuota
									$fecha_vencimiento = date("Y-m-d", strtotime($fecha_pago . " +$i month"));
									//restar la cuota de $total_venta\
									if ($monto_restante > $cuota) {
										$total_venta = $monto_restante - $cuota;
										$no_cuota = $i + 1;
										$monto_restante = $total_venta - $saldo_actual;
									}
		
									//ultima cuota sea igual al monto_restante
									if ($monto_restante < $cuota && $monto_restante >= 0) {
										$cuota = $monto_restante;
										$monto_restante = 0;
										$bandera = true;
									}
		
									# code...
		
							?>
									<td><?php echo $contador++; ?></td>
									<td><?php echo $fecha_pago2; ?></td>
									<td><?php echo 'L.' . number_format($cuota, 2, '.', ','); ?></td>
									<td><?php echo 'L.' . number_format($saldo_actual, 2, '.', ','); ?></td>
									<td><?php echo 'L.' . number_format($monto_restante, 2, '.', ','); ?></td>
									<td>
										<?php
										$fecha_vencimiento = new DateTime($fecha_vencimiento);
										// echo '<p>' . $fecha_vencimiento->format('d-m-Y') . '</p>';
										$fechahoy = new DateTime();
										$interval = $fecha_vencimiento->diff($fechahoy);
										$dias = $interval->format('%r%a');
										// echo '<p>' . $dias . '</p>';
										if ($dias > 0) {
											echo "<p>Vencido</p>";
										} elseif ($dias == '0') {
											echo "Vence hoy";
										} elseif ($dias < '0') {
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