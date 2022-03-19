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
			<th>No. Cuota</th>
			<th>Fecha Pago</th>
			<th>Siguiente Pago</th>
			<th>Estado</th>
		</tr>
		<?php
		//consulta
		$estadoCuenta = $conn->query("SELECT * FROM ficha_compra WHERE id_ficha_compra = '1'");
		$contador = 1;
		while ($cuotaresult = $estadoCuenta->fetch_array()) {
		$cuota = $cuotaresult['cuota'];
		echo $cuota;
		}



		// $estadoCuenta = $conn->query("SELECT * FROM control_credito_lote a, ficha_compra b WHERE a.id_compra = 15 and b.id_ficha_compra = a.id_compra");
		$estadoCuenta = $conn->query("SELECT id_compra, fecha_pago, fecha_vencimiento, MIN(id_credito_lote) ID FROM control_credito_lote WHERE estado_cuota = 'sig' GROUP BY id_compra ORDER BY id_compra;");
		$contador = 1;
		while ($solicitud = $estadoCuenta->fetch_array()) {
			$fecha_vencimiento = $solicitud['fecha_vencimiento'];
			$fecha_pago = $solicitud['fecha_pago'];
		?>
			<tr>
				<td><?php echo $contador++; ?></td>
				<td><?php echo $fecha_pago; ?></td>
				<td><?php echo $fecha_vencimiento; ?></td>
				<!-- <td><?php echo $cuota; ?></td> -->
				<td>
					<?php
					$fecha_pago1 = new DateTime($fecha_pago);
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
		}
		?>
</body>