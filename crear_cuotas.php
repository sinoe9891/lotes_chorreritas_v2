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
	$consultaFechaCuota = $conn->query("SELECT a.fecha_primer_cuota, b.fecha_vencimiento FROM ficha_compra a, control_credito_lote b WHERE a.id_ficha_compra = 16 AND a.id_ficha_compra = b.id_compra");
	$ajusteProyecto = $consultaFechaCuota->fetch_assoc();
	$fecha_cuota = $ajusteProyecto['fecha_primer_cuota'];
	$fecha_vencimiento = $ajusteProyecto['fecha_vencimiento'];

	$fecha_matri = $fecha_cuota;
	?>
	<table>
		<tr>
			<th>No. Cuota</th>
			<th>Fecha Pago</th>
			<th>Fecha vencimieto</th>
			<th>Estado</th>
		</tr>

		<?php
		//falta la variable plazo_meses
		for ($i = 1; $i <= 10; ++$i) {
			$fecha_pago = date("d-m-Y", strtotime($fecha_matri . " +$i month")) . "<br>";
		?>
			<tr>
				<td><?php echo $i; ?></td>
				<td><?php echo $fecha_pago; ?></td>
				<td><?php echo $fecha_vencimiento; ?></td>
				<td>
					<?php
					if ($fecha_pago > $fecha_vencimiento) {
						echo "Vencido";
					} else {
						echo "Pendiente";
					}
					//condicion si fecha_pago esta por vencer o vencimiento de la cuota
					$fecha_pago1 = new DateTime($fecha_matri);
					echo '<p>' . $fecha_pago1->format('d-m-Y') . '</p>';
					$fechahoy = new DateTime();
					$interval = $fecha_pago1->diff($fechahoy);
					$dias = $interval->format('%R%a');
					echo '<p>' . $dias . '</p>';
					if ($dias <= 0) {
						echo "<p>Vencido</p>";
					} else {
						echo "Pendiente";
					}
					// echo $fechahoy->format('d-m-Y');
					// $interval = $fechahoy->diff($fecha_vencimiento);
					// echo $interval->format('%R%a días');
					?>
				</td>
			</tr>
		<?php
			// insertar fechas en la tabla control_credito_lote con fecha_pago y fecha_vencimiento y no_cuota
			$fecha_pago1 = date("Y-m-d", strtotime($fecha_matri . " +$i month"));
			$fecha_vencimiento = date("Y-m-d", strtotime($fecha_pago1 . " +1 month"));
			$no_cuota = $i;
			$insertarFechas = $conn->query("INSERT INTO control_credito_lote (id_compra, fecha_pago, fecha_vencimiento, no_cuota) VALUES ('15','$fecha_pago1', '$fecha_vencimiento', '$no_cuota')");
			if ($insertarFechas) {
				echo "Fechas insertadas correctamente";
			} else {
				echo "Error al insertar fechas";
			}
		}
		// SELECT fecha FROM fechas WHERE fecha > NOW( )ORDER BY fecha LIMIT 1 
		?>
	</table>

</body>