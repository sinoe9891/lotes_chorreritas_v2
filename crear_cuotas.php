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
		$consultaFechaCuota = $conn->query("SELECT a.fecha_primer_cuota, a.plazo_meses, a.total_venta, a.cuota FROM ficha_compra a WHERE a.id_ficha_compra = 35");
		$ajusteProyecto = $consultaFechaCuota->fetch_assoc();

		$fecha_cuota = $ajusteProyecto['fecha_primer_cuota'];
		$plazo_meses = 120;
		$total_venta = $ajusteProyecto['total_venta'];
		$cuota = $ajusteProyecto['cuota'];
		$estado_cuota = 'pen';
		echo $fecha_cuota . 'Fecha traida de base de datos';
		//falta la variable plazo_meses
		for ($i = 1; $i <= $plazo_meses; ++$i) {
			// cambiar estado de la primera cuota por siguiente
			if ($i == 1) {
				$estado_cuota = 'sig';
			}else{
				$estado_cuota = 'pen';
			}
			$fecha_pago = date("d-m-Y", strtotime($fecha_cuota . " +$i month")) . "<br>";
			// insertar fechas en la tabla control_credito_lote con fecha_pago y fecha_vencimiento y no_cuota
			$fecha_pago1 = date("Y-m-d", strtotime($fecha_cuota . " +$i month"));
			$fecha_vencimiento = date("Y-m-d", strtotime($fecha_pago1 . " +1 month"));
			//restar la cuota de $total_venta
			$total_venta = $total_venta - $cuota;
			$no_cuota = $i;
			$insertarFechas = $conn->query("INSERT INTO control_credito_lote (id_compra, fecha_pago, fecha_vencimiento, no_cuota, monto_restante, estado_cuota) VALUES ('35','$fecha_pago1', '$fecha_vencimiento', '$no_cuota', '$total_venta', '$estado_cuota')");
			if ($insertarFechas) {
				echo "Fechas insertadas correctamente";
			} else {
				echo "Error al insertar fechas";
			}
		}
	?>
</body>